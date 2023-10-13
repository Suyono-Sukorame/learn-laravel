<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public static function seed()
    {
        // Data pengguna pertama
        self::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'email_verified_at' => null,
            'password' => bcrypt('hashed_password_1'),
        ]);

        // Data pengguna kedua
        self::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'email_verified_at' => null,
            'password' => bcrypt('hashed_password_2'),
        ]);

        // Data pengguna ketiga
        self::create([
            'name' => 'Michael Johnson',
            'email' => 'michael.johnson@example.com',
            'email_verified_at' => null,
            'password' => bcrypt('hashed_password_3'),
        ]);
    }
}
