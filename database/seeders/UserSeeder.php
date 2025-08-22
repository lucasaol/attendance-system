<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'sistema@ticto.com'],
            [
                'name' => 'Sistema',
                'document' => '12345678909',
                'password' => Hash::make('password'),
                'role' => 'adm',
                'position' => 'Sistema',
                'date_of_birth' => now(),
            ]
        );

        User::factory()->count(2)->create([
            'role' => 'adm'
        ])->each(function ($user) {
            User::factory()->count(3)->create([
                'role' => 'employee',
                'creator_id' => $user->id,
            ]);
        });

    }
}
