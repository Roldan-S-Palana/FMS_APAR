<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('payment_term')->insert([
            ['payment_term' => 'Cash on Delivery'],
            ['payment_term' => 'Due Immediately'],
            ['payment_term' => '7 Days'],
            ['payment_term' => '15 Days'],
            ['payment_term' => '30 Days'],
            ['payment_term' => '60 Days'],
            ['payment_term' => '90 Days'],
        ]);

        DB::table('payment_method')->insert([
            ['payment_method' => 'Check'],
            ['payment_method' => 'Bank to Bank Transfer'],
            ['payment_method' => 'Cash'],
            ['payment_method' => 'Telegraphic Transfer'],
            ['payment_method' => 'Letter of Credit'],
        ]);
    }
}
