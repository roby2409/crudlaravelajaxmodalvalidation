<?php

use Illuminate\Database\Seeder;
use App\Persentase;

class persentaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Persentase::class, 100)->create();
    }
}
