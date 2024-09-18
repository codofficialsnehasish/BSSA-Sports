<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


use App\Http\Controllers\{
    AuthController,
    Dashboard,
    MemberCategory,
    MembersController,
    FeesController,
    AdmissionController,
    AccountsController,
};

Route::get('/',[AuthController::class,'login'])->name('login');
Route::prefix('admin')->group( function (){

    Route::post('/login',[AuthController::class,'process_login'])->name('login.process');

    Route::middleware('auth')->group( function (){
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
        Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('dashboard');

        Route::resource('member-category',MemberCategory::class);

        Route::resource('members',MembersController::class);

        Route::resource('fees',FeesController::class);
        Route::get('due-list',[FeesController::class,'due_list'])->name('fees.due-list');
        Route::get('collection-history',[FeesController::class,'collection_history'])->name('fees.collection-history');

        Route::resource('admission',AdmissionController::class);
        Route::get('fees-collection',[AdmissionController::class,'fees_collection'])->name('admission.fees-collection');
        Route::get('create-fees-collection',[AdmissionController::class,'create_fees_collection'])->name('admission.create-fees-collection');
        Route::get('fees-collection-history',[AdmissionController::class,'fees_collection_history'])->name('admission.fees-collection-history');

        Route::prefix('accounts')->group( function () {
            Route::controller(AccountsController::class)->group( function () {
                Route::get('assets','assets')->name('assets');
                Route::get('purches','purches')->name('purches');
                Route::get('sallaries','sallaries')->name('sallaries');
                Route::get('missniliyes','missniliyes')->name('missniliyes');
                Route::get('profit-loss','profit_loss')->name('profit-loss');
                Route::get('criditor-dators','criditor_dators')->name('criditor-dators');
                Route::get('balance-sheet','balance_sheet')->name('balance-sheet');
            });
        });
    });
    
    
});
