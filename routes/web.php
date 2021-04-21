 <?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
// //     return view('welcome');
// // // when the user clicks /welcome URL, he is taken to the welcome controller page
// // // resource helps you import all methods  ie create, read, update, delete
// // //when you type php artisan route:list in the terminal, it shwos you all the routes by name ie welcome
// });
Auth::routes();

Route::resource('/student','App\Http\Controllers\StudentController');
Route::resource('/user','App\Http\Controllers\UserController');
Route::get('/','App\Http\Controllers\StudentController@welcome');
// The slash('/') specifies the URL which you define under app.blade.php while @welcome specifies the method defined in welcome controller
Route::get('/filter','App\Http\Controllers\StudentController@filter');
Route::get('/filterz','App\Http\Controllers\UserController@filterz');
/*Route::get('/sam','App\Http\Controllers\WelcomeController@sam')->name('sam');*/
Route::resource('/course','App\Http\Controllers\CourseController');
Route::resource('/role','App\Http\Controllers\RoleController');
Route::resource('/sms','App\Http\Controllers\SmsController');
Route::get('/send','App\Http\Controllers\SmsController@sendSMS');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
