<?php

declare (strict_types = 1);

namespace App\Models;


use Illuminate\Auth\Passwords\CanResetPassword as CanResetPasswordTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\Role;

class User extends Authenticatable implements CanResetPassword, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPasswordTrait;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'role_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeClients(Builder $query): void
    {
        $query->when(auth()->user()->role_id === Role::ADMIN->value, function($query) {
        }, function($query) {
            $query->where('role_id', Role::USER->value);
        });
    }

    /**
     * Relationships
     */
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }
}
