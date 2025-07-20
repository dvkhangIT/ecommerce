<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $user = User::where('email', 'admin@gmail.com')->first();
    $vender = new Vendor();
    $vender->banner = 'uploads/1343/jpg';
    $vender->phone = '121212121';
    $vender->address = 'usa';
    $vender->email = 'admin@gmail.com';
    $vender->description = 'shop description';
    $vender->user_id = $user->id;
    $vender->save();
  }
}
