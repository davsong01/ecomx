<?php

use App\Plan;
use App\Post;
use App\User;
use App\Product;
use App\Setting;
use App\Category;
use App\Settings;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class genericSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generalPassword = Hash::make('12345654321');
        
        $admin = User::create([
            'name' => 'Davido',
            'email' => 'davsong01@gmail.com',
            'username' => 'admino1',
            'password' => $generalPassword,
            'level'  => 2,
            ]);

        $plan1 = Plan::create([
            'title' => 'STARTER',
            'mprice' => 3500.00,
            'features' => ["Access to products","Access to  support"],
            'threemprice' => 9450.00,
            'threempercentoff' => 10,
            'sixmprice' => 16800.00,
            'sixmpercentoff' => 20,
            'twelvemprice' => 25200.00,
            'twelvempercentoff' => 40,
            'status' => 'required|numeric',
            'viewproduct' => 1,
            'viewUpsells' => 0,
            'viewCreatives' => 0,
            ]);

        $category1 = Category::create([
            'title' => 'Health',
            'slug' => date('Y-m-d').'-health',
            'status' => 1,
            ]);

            $category2 = Category::create([
                'title' => 'Beauty',
                'slug' => date('Y-m-d').'-beauty',
                'status' => 1,
                ]);

            $category3 = Category::create([
                'title' => 'Education',
                'slug' => date('Y-m-d').'-education',
                'status' => 1,
                ]);

       
        $setting = Settings::create([
            'referral_percent' =>10,
            'official_mail' => "davedeloper@gmail.com",
            'logo' =>'images/site/loader.jpg',
            'preloader' =>'images/site/favicon.ico',
            'favicon' =>'images/site/loader.jpg',
            'referral_threshold' =>'0',
        ]);
    }
}