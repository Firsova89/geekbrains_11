<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeed extends Seeder
{
    public function run()
    {
        \DB::table('users')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];
        $data[] = [
            'name' => "a",
            'email' => "a@a.net",
            'email_verified_at' => now(),
            'password' => Hash::make("a"),
            'is_admin' => 1
        ];

        return $data;
    }
}
