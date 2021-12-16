<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');


Route::get('/admin/logout',[AdminController::class,'Logout'])->name('admin.logout');

//User Management All Routes
Route::prefix('users')->group(function(){
    Route::get('/view',[UserController::class,'UserView'])->name('view.user');
    Route::get('/add',[UserController::class,'AddUser'])->name('add.user');
    Route::post('/store',[UserController::class,'UserStore'])->name('users.store');
    Route::get('/edit/{id}',[UserController::class,'UserEdit'])->name('users.edit');
    Route::post('/update/{id}',[UserController::class,'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}',[UserController::class,'UserDelete'])->name('users.delete');

});



//User Management All Routes
Route::prefix('profile')->group(function(){
    Route::get('/view',[UserProfileController::class,'ProfileView'])->name('profile.view');
    Route::get('/edit',[UserProfileController::class,'ProfileEdit'])->name('profile.edit');
    Route::post('/store',[UserProfileController::class,'UserStore'])->name('profile.store');
    Route::get('/password/view',[UserProfileController::class,'PasswordView'])->name('password.view');
    Route::post('/password/update',[UserProfileController::class,'PasswordUpdate'])->name('update.password');
});



//Setup Management All Routes
Route::prefix('setups')->group(function(){
    //student class route
    Route::get('/student/class/view',[StudentClassController::class,'ViewStudent'])->name('student.class.view');
    Route::get('/student/class/add',[StudentClassController::class,'StudentClassAdd'])->name('student.class.add');
    Route::post('/student/class/store',[StudentClassController::class,'StudentClassStore'])->name('student.class.store');
    Route::get('/student/class/edit/{id}',[StudentClassController::class,'StudentClassEdit'])->name('student.clas.edit');
    Route::post('/student/class/update/{id}',[StudentClassController::class,'StudentClassUpdate'])->name('student.class.update');
    Route::get('/student/class/delete/{id}',[StudentClassController::class,'StudentClassDelete'])->name('student.class.delete');

     //student year route
     Route::get('/student/year/view',[StudentYearController::class,'ViewYear'])->name('student.year.view');
     Route::get('/student/year/add',[StudentYearController::class,'StudentYearAdd'])->name('student.year.add');
     Route::post('/student/year/store',[StudentYearController::class,'StudentYearStore'])->name('student.year.store');
     Route::get('/student/year/edit/{id}',[StudentYearController::class,'StudentYearEdit'])->name('student.year.edit');
     Route::post('/student/year/update/{id}',[StudentYearController::class,'StudentYearUpdate'])->name('student.year.update');
     Route::get('/student/year/delete/{id}',[StudentYearController::class,'StudentYearDelete'])->name('student.year.delete');

     //student group route
     Route::get('/student/group/view',[StudentGroupController::class,'ViewGroup'])->name('student.group.view');
     Route::get('/student/group/add',[StudentGroupController::class,'StudentGroupAdd'])->name('student.group.add');
     Route::post('/student/group/store',[StudentGroupController::class,'StudentGroupStore'])->name('student.group.store');
     Route::get('/student/group/edit/{id}',[StudentGroupController::class,'StudentGroupEdit'])->name('student.group.edit');
     Route::post('/student/group/update/{id}',[StudentGroupController::class,'StudentGroupUpdate'])->name('student.group.update');
     Route::get('/student/group/delete/{id}',[StudentGroupController::class,'StudentGroupDelete'])->name('student.group.delete');

     
     //student shift route
     Route::get('/student/shift/view',[StudentShiftController::class,'ViewShift'])->name('student.shift.view');
     Route::get('/student/shift/add',[StudentShiftController::class,'StudentShiftAdd'])->name('student.shift.add');
     Route::post('/student/shift/store',[StudentShiftController::class,'StudentShiftStore'])->name('student.shift.store');
     Route::get('/student/shift/edit/{id}',[StudentShiftController::class,'StudentShiftEdit'])->name('student.shift.edit');
     Route::post('/student/shift/update/{id}',[StudentShiftController::class,'StudentShiftUpdate'])->name('student.shift.update');
     Route::get('/student/shift/delete/{id}',[StudentShiftController::class,'StudentShiftDelete'])->name('student.shift.delete');


     //fee category route
     Route::get('/fee/category/view',[FeeCategoryController::class,'ViewFeeCategory'])->name('fee.cateogry.view');
     Route::get('/fee/category/add',[FeeCategoryController::class,'FeeCategoryAdd'])->name('fee.category.add');
     Route::post('/fee/category/store',[FeeCategoryController::class,'FeeCategoryStore'])->name('fee.category.store');
     Route::get('/fee/category/edit/{id}',[FeeCategoryController::class,'FeeCategoryEdit'])->name('fee.category.edit');
     Route::post('/fee/category/update/{id}',[FeeCategoryController::class,'FeeCategoryUpdate'])->name('fee.category.update');
     Route::get('/fee/category/delete/{id}',[FeeCategoryController::class,'FeeCategoryDelete'])->name('fee.category.delete');
     


});


