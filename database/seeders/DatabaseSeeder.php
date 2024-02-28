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
        DB::table('paymentterm')->insert([
            ['payment_term' => 'Cash on Delivery'],
            ['payment_term' => 'Due Immediately'],
            ['payment_term' => '7 Days'],
            ['payment_term' => '15 Days'],
            ['payment_term' => '30 Days'],
            ['payment_term' => '60 Days'],
            ['payment_term' => '90 Days'],
        ]);

        DB::table('paymentmethod')->insert([
            ['payment_method' => 'Check'],
            ['payment_method' => 'Bank to Bank Transfer'],
            ['payment_method' => 'Cash'],
            ['payment_method' => 'Telegraphic Transfer'],
            ['payment_method' => 'Letter of Credit'],
        ]);
        $data = [
            'vendorname' => 'Cat',
            'name' => 'Cat Cat',
            'email' => 'cat@gmail.com',
            'phone' => '09768686676',
            'city' => 'Caloocan',
            'postalcode' => '9',
            'category' => 'Executive Finance',
            'role_name' => 'Vendor',
            'contract_start_date' => '04-02-2024',
            'contract_due_date' => '11-02-2024',
            'payment_method' => 'Check',
            'payment_term' => '7 days',
            'password' => '1234', // Note: This should be hashed before insertion
            'digisign' => 'cluster-logo-small.png',
            'bir' => 'cluster-logo-small.png',
            'bussper' => 'cluster-logo-small.png',
            'dirreg' => 'cluster-logo-small.png',
            'accdocu' => 'cluster-logo-small.png',
            'othersdoc' => 'cluster-logo-small.png',
        ];
        
        DB::table('vendor_user')->insert($data);dd($data);
        $data = [
            'first_name' => 'Cat',
            'last_name' => 'Cat Cat',
            'gender' => 'Male',
            'date_of_birth' => '28-02-2024',
            'email' => 'Caloocan',
            'phone_number' => '9',
            'zip_code' => 'Executive Finance',
            'city' => 'Vendor',
            'region' => '04-02-2024',
            'upload' => '11-02-2024',
            'payment_method' => 'Check',
            'payment_term' => '7 days',
            'password' => '1234', // Note: This should be hashed before insertion
            'digisign' => 'cluster-logo-small.png',
            'bir' => 'cluster-logo-small.png',
            'bussper' => 'cluster-logo-small.png',
            'dirreg' => 'cluster-logo-small.png',
            'accdocu' => 'cluster-logo-small.png',
            'othersdoc' => 'cluster-logo-small.png',
        ];
        
        DB::table('vendor_user')->insert($data);dd($data);
    }
    }

}
