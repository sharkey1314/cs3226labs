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

Route::delete('student/{id}', 'StudentController@destroy');

Route::get('help', function() { return view('help'); });

Route::get('create', 'StudentController@create');

Route::post('create', 'StudentController@check');

Route::get('student/{id}/edit', 'StudentController@edit');

Route::post('student/{id}/edit', 'StudentController@checkEdit')

//Route::get('fillscores', 'StudentController@fillscores');

//Route::get('filltable', 'StudentController@filltable');

//Route::get('student/{id}/edit', 'StudentController@edit');

//Route::post('student/{id}/edit', 'StudentController@edit');

//Route::get('removetests', 'StudentController@removetests');

//Route::get('changeimage', 'StudentController@changeImage');

/*Route::get('/init', function() {
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

        $arrays[$i]["scores"]["mc"] = array();
        for ($j = 0; $j < 3; $j++) {
            $arrays[$i]["scores"]["mc"][] = number_format($faker->numberBetween($min = 0, $max = 8) * 0.5, 1);
        }

        $arrays[$i]["scores"]["tc"] = array();
        for ($j = 0; $j < 2; $j++) {
            $arrays[$i]["scores"]["tc"][] = number_format($faker->numberBetween($min = 0, $max = 8) * 0.5, 1);
        }

        $arrays[$i]["scores"]["hw"] = array();
        for ($j = 0; $j < 2; $j++) {
            $arrays[$i]["scores"]["hw"][] = number_format($faker->numberBetween($min = 0, $max = 4) * 0.5, 1);
        }

        $arrays[$i]["scores"]["pb"] = array();
        for ($j = 0; $j < 3; $j++) {
            $arrays[$i]["scores"]["pb"][] = $faker->numberBetween($min = 0, $max = 1);
        }

        $arrays[$i]["scores"]["ks"] = array();
        for ($j = 0; $j < 4; $j++) {
            $arrays[$i]["scores"]["ks"][] = $faker->numberBetween($min = 0, $max = 1);
        }

        $arrays[$i]["scores"]["ac"] = array();
        for ($j = 0; $j < 3; $j++) {
            $arrays[$i]["scores"]["ac"][] = $faker->numberBetween($min = 0, $max = 3);
        }
    }
    $string = serialize($arrays);
    $fn = "../students.txt";
    $fh = fopen($fn, 'w');
    fwrite($fh, $string);
    fclose($fh);
});*/
?>
