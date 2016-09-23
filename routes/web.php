<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Yangqi\Htmldom\Htmldom;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get("table",function (){
    return view("Comparisons.money");
});
Route::get('exchange','ExchangeTableController@getExchange');
Route::get('interest-rate','InterestRateController@getViewInterestRate');

Route::get('/getHTML',function (){

    $html = new Htmldom('https://www.techcombank.com.vn/customfield/findexchange?catId=234&date=19/09/2016');
    foreach($html->find('table') as $element)
        echo $element->outertext;
});