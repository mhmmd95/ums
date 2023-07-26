<?php

declare (strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

final class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    /**
     * Relationships
     */
    public function permissions(): HasMany {
        return $this->hasMany(Permission::class);
    }
}
