<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class User extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    public static function seed()
    {
        // Data pengguna pertama
        self::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'email_verified_at' => null,
            'password' => password_hash('hashed_password_1', PASSWORD_DEFAULT),
        ]);

        // Data pengguna kedua
        self::create([
            'name' => 'Jane Smith',
            'email' => 'jane.smith@example.com',
            'email_verified_at' => null,
            'password' => password_hash('hashed_password_2', PASSWORD_DEFAULT),
        ]);

        // Data pengguna ketiga
        self::create([
            'name' => 'Michael Johnson',
            'email' => 'michael.johnson@example.com',
            'email_verified_at' => null,
            'password' => password_hash('hashed_password_3', PASSWORD_DEFAULT),
        ]);
    }
}
