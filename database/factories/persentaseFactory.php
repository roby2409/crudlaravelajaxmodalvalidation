<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Persentase;
use Faker\Generator as Faker;

$factory->define(Persentase::class, function (Faker $faker) {
    return [
        'total_penerima' => $faker->unique()->numberBetween(1, 20),
        'id_kabupaten' => $faker->randomElement([1, 2]),
        'id_jenis_bantuan' => $faker->randomElement([1, 2]),
        'total_penerima_terealisasi' => $faker->unique()->numberBetween(1, 20),
        'total_penerima_terealisasi_persen' => $faker->unique()->numberBetween(1, 20),
        'total_penerima_dalam_antrian' => $faker->unique()->numberBetween(1, 20),
        'total_penerima_dalam_antrian_persen' => $faker->unique()->numberBetween(1, 20),

    ];
});
