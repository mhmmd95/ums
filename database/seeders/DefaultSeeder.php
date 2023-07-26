<?php

declare (strict_types = 1);

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Enums\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

final class DefaultSeeder extends Seeder
{
    public function run(): void
    {
        //admin
        DB::table('roles')->insert([
            'id' => Role::ADMIN->value,
            'title' => 'admin',
            'description' => 'a full-control over the system role'
        ]);

        //editor
        DB::table('roles')->insert([
            'id' => Role::EDITOR->value,
            'title' => 'editor',
            'description' => 'a role to edit and update existed users accounts'
        ]);

        //user
        DB::table('roles')->insert([
            'id' => Role::USER->value,
            'title' => 'user',
            'description' => 'the default role, responsible only on its account'
        ]);

        //admin user
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'role_id' => Role::ADMIN->value,
            'password' => Hash::make('12345'),
        ]);
    }
}
