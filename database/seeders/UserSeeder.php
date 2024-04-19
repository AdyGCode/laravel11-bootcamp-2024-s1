<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $defaultAdmin = [
            'id' => 1,
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'email_verified_at' => now()->subYears(5),
            'password' => Hash::make('Password1'),
        ];


        $seedUsers = [
            [
                'id' => 1000,
                'name' => 'Adrian Gould',
                'email' => 'adrian.gould@nmtafe.wa.edu.au',
                'email_verified_at' => now()->subYears(5),
                'password' => Hash::make('Password1'),
            ],

            [
                'id' => null, 'name' => "Bea O'Problem", 'email' => 'Bea.OProblem@example.com',
                'email_verified_at' => null, 'password' => Hash::make('3454325326654665gfdgt'), 'created_at' =>
                now(),
            ],

            [
                'id' => null, 'name' => 'Oscar Nomination', 'email' => 'Oscar.Nomination@example.com',
                'email_verified_at' => null, 'password' => Hash::make('hguishgr78enytigruighvihgru'), 'created_at' =>
                now(),
            ],

            [
                'id' => null, 'name' => 'Ken Dahl', 'email' => 'Ken.Dahl@example.com', 'email_verified_at' => null,
                'password' => Hash::make('Password1'), 'created_at' => now(),
            ],

            [
                'id' => null, 'name' => 'Barbie Dahl', 'email' => 'Barbie.Dahl@example.com',
                'email_verified_at' => null, 'password' => Hash::make('tyruisytui4ytuiv7tv7tv744'), 'created_at' =>
                now(),
            ],

                        [
                'id' => null, 'name' => 'Tim Burr', 'email' => 'Tim.Burr@example.com', 'email_verified_at' => null,
                'password' => Hash::make('yarv4una7y74ayt74avynt7a4y7ty4v'), 'created_at' => now(),
            ],
            [
                'id' => null, 'name' => 'Dwight House', 'email' => 'Dwight.House@example.com',
                'email_verified_at' => null, 'password' => Hash::make('yv78br84vtcr84cgf4gf'), 'created_at' => now(),
            ],


            [
                'id' => null, 'name' => 'Isadora Bull', 'email' => 'Isadora.Bull@example.com',
                'email_verified_at' => null, 'password' => Hash::make('vymn478btr8vrit4w'), 'created_at' => now(),
            ],

            [
                'id' => null, 'name' => "Annie O'Problem", 'email' => 'Annie.OProblem@example.com',
                'email_verified_at' => null, 'password' => Hash::make('vyn4uizoyt478vt478'), 'created_at' => now(),
            ],

        ];


        $admin = User::create($defaultAdmin);

        foreach ($seedUsers as $seedUser) {
            $user = User::create($seedUser);
        }

    }
}
