<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;


class ContactWithUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
              $users = [
            [
                'name' => 'Alice Example',
                'email' => 'alice@example.com',
            ],
            [
                'name' => 'Bob Example',
                'email' => 'bob@example.com',
            ],
            [
                'name' => 'Charlie Example',
                'email' => 'charlie@example.com',
            ],
        ];

        foreach ($users as $userData) {
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password123'),
            ]);

            // أضف لكل مستخدم 5 جهات اتصال
            for ($i = 1; $i <= 5; $i++) {
                $user->contacts()->create([
                    'first_name' => "Contact {$i}",
                    'last_name' => $user->name,
                    'phone' => '09' . rand(10000000, 99999999),
                    'email' => "contact{$i}@{$user->email}",
                    'address' => "Address {$i}",
                    'notes' => "Note for contact {$i} of {$user->name}",
                ]);
            }
        }

    }
}
