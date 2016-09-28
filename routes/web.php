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

use App\CategoryRequest;
use App\Request;
use App\Staff;
use Yangqi\Htmldom\Htmldom;
use App\Bank;

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
Route::get('admin', function (){
   return view('admin.home');
});
Route::get('staff/login',function (){
   return view('staff.login');
});
Route::get('getStaffFromBank', function () {
    $staff = Bank::with('staff')->where("name",'ABBank')->get();
    foreach ($staff as $a){
        print_r($a->staff[0]->number_phone);
    }
});
Route::get('getBankFromStaff', function () {
    $bank = Staff::with('bank')->get();
    foreach ($bank as $a){
        print_r($a->toArray());
    }
});
Route::get('catefromstaff', function () {
    $category_request = Staff::with('category_request')->where('id',3)->get();
    foreach ($category_request as $a){
        $array = $a->category_request->toArray();
        print_r($array[0]['id']);
    }
    print_r("HUNG");
});
Route::get('stafffromcate', function () {
    $staff = CategoryRequest::with('staff')->get();
    foreach ($staff as $a){
        $array = $a->toArray();
        print_r($array);
    }

});