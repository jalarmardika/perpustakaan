<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Book, Member, User, Transaction};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'title' => 'Tutorial Web Programing',
            'isbn' => '9983742831',
            'author' => 'Jalar Mardika',
            'publisher' => 'PT. Gramedia Indonesia',
            'issued' => '2006-06-20',
            'stock' => 10,
            'location' => 'Rak 1',
            'description' => 'Buku terbaik abad ini'
        ]);

        Member::create([
            'name' => 'Ahmad Faizal',
            'nim' => '0123456',
            'gender' => 'Male',
            'study_program' => 'Teknik Informatika',
            'no_hp' => '089567251007'
        ]);

        User::create([
            'name' => 'M. Ariel Setiawan',
            'email' => 'arielsetiawan@gmail.com',
            'password' => bcrypt('password'),
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Nur Hamdani',
            'email' => 'hamdaninur@example.com',
            'password' => bcrypt('hamdani')
        ]);

        Transaction::create([
            'transaction_code' => 'T-0034723341',
            'book_id' => 1,
            'member_id' => 1,
            'user_id' => 1,
            'transaction_date' => '2024-06-07',
            'return_date' => '2024-06-10',
            'status' => 'borrowed',
            'notes' => '-'
        ]);
    }
}
