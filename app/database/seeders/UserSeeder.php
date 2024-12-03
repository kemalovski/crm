<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Kullanıcı oluştur
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // Şifreyi hash'liyoruz
        ]);

        // Token oluştur
        $token = $user->createToken('TestToken')->plainTextToken;

        // Konsola token yazdır
        $this->command->info('User created successfully!');
        $this->command->info("Token: {$token}");
    }
}
