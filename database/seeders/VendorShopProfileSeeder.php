<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'vendor@gmail.com')->first();
        $vender = new Vendor;
        $vender->banner = 'uploads/1343/jpg';
        $vender->phone = '121212121';
        $vender->shop_name = 'Vendor Shop';
        $vender->address = 'usa';
        $vender->email = 'vendor@gmail.com';
        $vender->description = 'shop description';
        $vender->user_id = $user->id;
        $vender->status = 1;
        $vender->save();
    }
}
