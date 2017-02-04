<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// nicer one stop view of all routes
Route::get('/', 'StudentController@index');

Route::get('student/{id}', 'StudentController@detail');

Route::get('help', function() { return view('help'); });

Route::get('/init', function() {
    $faker = Faker\Factory::create();

    $limit = 50;

    $arrays = array();
    for ($i = 0; $i < $limit; $i++) {
        $arrays[$i] = array();
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $arrays[$i]["nick"] = $firstName;
        $arrays[$i]["name"] = $firstName . ' ' . $lastName;
        $iso3_codes = json_decode(file_get_contents('../iso3.json'), true);
        $arrays[$i]["country_iso2"] = $faker->countryCode;
        $arrays[$i]["country_iso3"] = $iso3_codes[$arrays[$i]["country_iso2"]];
        $arrays[$i]["scores"] = array();
        for ($j = 1; $j < 7; $j++) {
            $arrays[$i]["scores"][] = number_format($faker->numberBetween($min = 0, $max = 8) * 0.5, 1);
        }
    }
    $string = serialize($arrays);
    $fn = "../students.txt";
    $fh = fopen($fn, 'w');
    fwrite($fh, $string);
    fclose($fh);
});
?>
