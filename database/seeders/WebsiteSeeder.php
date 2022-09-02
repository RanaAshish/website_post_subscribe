<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Website::insert([
            [
                'name' => 'Genisys',
                'url' => 'https://www.indiagenisys.com/',
            ],
            [
                'name' => 'Google',
                'url' => 'https://www.google.com/',
            ],
            [
                'name' => 'Stack Overflow',
                'url' => 'https://stackoverflow.com/',
            ]
        ]);
    }
}
