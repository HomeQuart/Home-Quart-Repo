<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LockScreen;


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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// ----------------------------- home dashboard ------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ----------------------------- lock screen --------------------------------//
Route::get('lock_screen', [App\Http\Controllers\LockScreen::class, 'lockScreen'])->middleware('auth')->name('lock_screen');
Route::post('unlock', [App\Http\Controllers\LockScreen::class, 'unlock'])->name('unlock');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ------------------------------ admin register ---------------------------------//
Route::get('/adminregister', [App\Http\Controllers\Auth\RegisterController::class, 'adminregister'])->name('adminregister');
Route::post('/adminregister', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('adminregister');


// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);

// ----------------------------- user profile ------------------------------//
Route::get('profile_user', [App\Http\Controllers\UserManagementController::class, 'profile'])->name('profile_user');
Route::post('profile_user/store', [App\Http\Controllers\UserManagementController::class, 'profileStore'])->name('profile_user/store');

// ----------------------------- user userManagement -----------------------//
Route::get('userManagement', [App\Http\Controllers\UserManagementController::class, 'index'])->middleware('auth')->name('userManagement');

// ----------------------------- Purok userManagement -----------------------//
Route::get('purokManagement', [App\Http\Controllers\UserManagementController::class, 'purokindex'])->middleware('auth')->name('purokManagement');

//--------------------------------quarantine patient--------------------------//
Route::get('sendreport', [App\Http\Controllers\UserManagementController::class, 'sendreport'])->middleware('auth')->name('sendreport');
Route::get('reports/view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewreportsDetail'])->middleware('auth');
Route::get('contactHotlines', [App\Http\Controllers\UserManagementController::class, 'contactHotlines'])->middleware('auth')->name('contactHotlines');
Route::get('temperatureProgress', [App\Http\Controllers\UserManagementController::class, 'temperatureProgress'])->middleware('auth')->name('temperatureProgress');
Route::get('consultations', [App\Http\Controllers\UserManagementController::class, 'consultations'])->middleware('auth')->name('consultations');
Route::get('sendSwabTest', [App\Http\Controllers\UserManagementController::class, 'sendSwabTest'])->middleware('auth')->name('sendSwabTest');
Route::post('reportupdate', [App\Http\Controllers\UserManagementController::class, 'reportupdate'])->name('reportupdate');


//-----------------------------brgy healthworker-------------------------------//
Route::get('pendingaccounts', [App\Http\Controllers\UserManagementController::class, 'pendingaccounts'])->middleware('auth')->name('pendingaccounts');
Route::get('pending/view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewPendingDetail'])->middleware('auth');
Route::get('activeaccounts', [App\Http\Controllers\UserManagementController::class, 'activeaccounts'])->middleware('auth')->name('activeaccounts');
Route::get('sendReport/Account/{id}', [App\Http\Controllers\UserManagementController::class, 'sendReportAccount'])->middleware('auth');
Route::get('underQuarantine', [App\Http\Controllers\UserManagementController::class, 'underQuarantine'])->middleware('auth')->name('underQuarantine');
Route::get('doneQuarantine', [App\Http\Controllers\UserManagementController::class, 'doneQuarantine'])->middleware('auth')->name('doneQuarantine');
Route::post('activate', [App\Http\Controllers\UserManagementController::class, 'activate'])->name('activate');
Route::get('swabtest', [App\Http\Controllers\UserManagementController::class, 'swabtest'])->middleware('auth')->name('swabtest');
Route::get('swabtest/view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewSwabtestDetail'])->middleware('auth');
Route::post('swabtestupdate', [App\Http\Controllers\UserManagementController::class, 'swabtestupdate'])->name('swabtestupdate');
Route::get('doneswabtest/view/detail/{user_id}', [App\Http\Controllers\UserManagementController::class, 'viewDoneSwabtestDetail'])->middleware('auth');

//------------------------------doctor -------------------------------------//
Route::get('patientList', [App\Http\Controllers\UserManagementController::class, 'patientList'])->middleware('auth')->name('patientList');
Route::get('reportList/{id}', [App\Http\Controllers\UserManagementController::class, 'reportList'])->middleware('auth');
Route::get('quarantineInformation/{id}', [App\Http\Controllers\UserManagementController::class, 'quarantineInformation'])->middleware('auth');
Route::get('bhwList', [App\Http\Controllers\UserManagementController::class, 'bhwList'])->middleware('auth')->name('bhwList');
Route::get('assignPurok/{id}', [App\Http\Controllers\UserManagementController::class, 'assignPurok'])->middleware('auth');
Route::get('medicine/add/new', [App\Http\Controllers\UserManagementController::class, 'addMedicine'])->middleware('auth')->name('medicine/add/new');
Route::post('medicine/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewMedicineSave'])->name('medicine/add/save');
Route::get('medicineManagement', [App\Http\Controllers\UserManagementController::class, 'medicineindex'])->middleware('auth')->name('medicineManagement');
Route::get('consultPatient/{id}', [App\Http\Controllers\UserManagementController::class, 'consultPatient'])->middleware('auth');
Route::get('medicine/view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'medicineviewDetail'])->middleware('auth');
Route::post('medicineupdate', [App\Http\Controllers\UserManagementController::class, 'medicineupdate'])->name('medicineupdate');
Route::get('delete_medicine/{id}', [App\Http\Controllers\UserManagementController::class, 'medicinedelete'])->middleware('auth');

Route::get('userManagement2', [App\Http\Controllers\UserManagementController::class, 'index2'])->middleware('auth')->name('userManagement2');
Route::get('user/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewUser'])->middleware('auth')->name('user/add/new');
Route::get('purok/add/new', [App\Http\Controllers\UserManagementController::class, 'addNewPurok'])->middleware('auth')->name('purok/add/new');
Route::post('user/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewUserSave'])->name('user/add/save');
Route::post('purok/add/save', [App\Http\Controllers\UserManagementController::class, 'addNewPurokSave'])->name('purok/add/save');
Route::get('view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'viewDetail'])->middleware('auth');
Route::get('purok/view/detail/{id}', [App\Http\Controllers\UserManagementController::class, 'purokviewDetail'])->middleware('auth');
Route::post('update', [App\Http\Controllers\UserManagementController::class, 'update'])->name('update');
Route::post('purokupdate', [App\Http\Controllers\UserManagementController::class, 'purokupdate'])->name('purokupdate');
Route::get('delete_user/{id}', [App\Http\Controllers\UserManagementController::class, 'delete'])->middleware('auth');
Route::get('delete_purok/{id}', [App\Http\Controllers\UserManagementController::class, 'purokdelete'])->middleware('auth');
Route::get('activity/log', [App\Http\Controllers\UserManagementController::class, 'activityLog'])->middleware('auth')->name('activity/log');
Route::get('activity/login/logout', [App\Http\Controllers\UserManagementController::class, 'activityLogInLogOut'])->middleware('auth')->name('activity/login/logout');

Route::get('change/password', [App\Http\Controllers\UserManagementController::class, 'changePasswordView'])->middleware('auth')->name('change/password');
Route::post('change/password/db', [App\Http\Controllers\UserManagementController::class, 'changePasswordDB'])->name('change/password/db');

// ----------------------------- form staff ------------------------------//
Route::get('form/staff/new', [App\Http\Controllers\FormController::class, 'index'])->middleware('auth')->name('form/staff/new');
Route::post('form/save', [App\Http\Controllers\FormController::class, 'saveRecord'])->name('form/save');
Route::get('form/view/detail', [App\Http\Controllers\FormController::class, 'viewRecord'])->middleware('auth')->name('form/view/detail');
Route::get('form/view/detail/{id}', [App\Http\Controllers\FormController::class, 'viewDetail'])->middleware('auth');
Route::post('form/view/update', [App\Http\Controllers\FormController::class, 'viewUpdate'])->name('form/view/update');
Route::get('delete/{id}', [App\Http\Controllers\FormController::class, 'viewDelete'])->middleware('auth');
