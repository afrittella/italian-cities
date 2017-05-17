<?php
// All controllers
$resources = [
    'Regions',
    'States',
    'Cities',
];

// Dynamic routing generation

Route::group(['prefix' => 'italian-cities', 'middleware' => 'web'], function() use ($resources){
    foreach ($resources as $resource):
        Route::resource(strtolower($resource), "Afrittella\ItalianCities\Http\Controllers\\" . $resource . 'Controller', ['only' => ['index', 'show']]);
    endforeach;
});