<?php

use Illuminate\Database\Seeder;
use App\Detail;

class DetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Detail::class, 50)->create();
    }
}
