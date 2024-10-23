<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');


use App\Http\Controllers\{
    AuthController,
    Dashboard,
    PermissionsController,
    RoleController,
    EmployeesController,
    MemberCategoryController,
    MembersController,
    FeesController,
    AdmissionController,
    AccountsController,
    CategoriesController,
    FeeCategoryController,
    DesignationController,
    ComityController,
    CommitteeMembersController,
    StudentPaymentController,
    ExpensesController,
    AssetController,
    ExpenseCategoryController,
};

Route::get('/',[AuthController::class,'login'])->name('login');
Route::prefix('admin')->group( function (){

    Route::post('/login',[AuthController::class,'process_login'])->name('login.process');

    Route::middleware('auth')->group( function (){
        Route::get('/logout',[AuthController::class,'logout'])->name('logout');
        Route::get('/dashboard',[Dashboard::class,'dashboard'])->name('dashboard');


        Route::resource('permissions', PermissionsController::class);
        Route::get('permissions/{permissionId}/delete', [PermissionsController::class,'destroy']);

        Route::resource('roles', RoleController::class);
        Route::get('roles/{roleId}/delete', [RoleController::class,'destroy']);
        Route::get('roles/{roleId}/give-permissions', [RoleController::class,'addPermissionToRole']);
        Route::put('roles/{roleId}/give-permissions', [RoleController::class,'givePermissionToRole']);
        
        Route::controller(EmployeesController::class)->group(function () {
            Route::prefix('employees')->group(function () {
                Route::get('/','index')->name('employee');
                Route::get('/add-new','add_new')->name('employee.add');
                Route::post('/add-new/process','process')->name('employee.add.process');
                Route::get('/edit/{id}','edit')->name('employee.edit');
                Route::post('/update','update_process')->name('employee.update');
                Route::get('/delete/{id}','delete')->name('employee.delete');
            });
        });

        // Route::controller(RoleController::class)->group(function () {
        //     Route::prefix('role')->group(function () {
        //         Route::get("/",'roles')->name('roles');
        //         Route::post("/create-role",'create_role')->name('role.create');
        //         Route::post("{roleId}/update-role",'update_role')->name('role.update');
        //         Route::put("/{roleId}/destroy-role",'destroy_role')->name('role.destroy');
        //         Route::get("/{roleId}/add-permission-to-role",'addPermissionToRole')->name('role.addPermissionToRole');
        //         Route::post("/{roleId}/give-permissions",'givePermissionToRole')->name('role.give-permissions');
        //     });
        // });

        // Route::controller(PermissionController::class)->group(function () {
        //     Route::prefix('permission')->group(function () {
        //         Route::get("/",'permission')->name('permission');
        //         Route::post("/create-permission",'create_permission')->name('permission.create');
        //         Route::post("{permissionId}/update-permission",'update_permission')->name('permission.update');
        //         Route::put("/{permissionId}/destroy-permission",'destroy_permission')->name('permission.destroy');
          
        //     });
        // });
     


        Route::prefix('category')->group( function () {
            Route::controller(CategoriesController::class)->group( function () {
                Route::get('list','index')->name('admin.category.list');
                Route::get('create','create')->name('admin.category.create');
                Route::post('store','store')->name('admin.category.store');
                Route::get('edit/{id}','edit')->name('admin.category.edit');
                Route::post('update','update')->name('admin.category.update');
                Route::get('delete/{id}','destroy')->name('admin.category.delete');
     
            });
        });
        Route::prefix('members')->group( function () {
            Route::controller(MembersController::class)->group( function () {
                Route::get('list','index')->name('admin.members.list');
                Route::get('create','create')->name('admin.members.create');
                Route::post('store','store')->name('admin.members.store');
                Route::get('edit/{id}','edit')->name('admin.members.edit');
                Route::post('update','update')->name('admin.members.update');
                Route::get('delete/{id}','destroy')->name('admin.members.delete');
                Route::get('{id}/show','show')->name('admin.members.show');

                Route::post('get-category-data','get_category_data')->name('admin.member.categorydata');
                Route::post('make-payment','make_payment')->name('admin.members.payment');
     
            });
        });
        Route::prefix('members-category')->group( function () {
            Route::controller(MemberCategoryController::class)->group( function () {
                Route::get('list','index')->name('admin.member_category.list');
                Route::get('create','create')->name('admin.member_category.create');
                Route::post('store','store')->name('admin.member_category.store');
                Route::get('edit/{id}','edit')->name('admin.member_category.edit');
                Route::post('update','update')->name('admin.member_category.update');
                Route::get('delete/{id}','destroy')->name('admin.member_category.delete');
     
            });
        });
        Route::prefix('fees-category')->group( function () {
            Route::controller(FeeCategoryController::class)->group( function () {
                Route::get('list','index')->name('admin.fee_category.list');
                Route::get('create','create')->name('admin.fee_category.create');
                Route::post('store','store')->name('admin.fee_category.store');
                Route::get('edit/{id}','edit')->name('admin.fee_category.edit');
                Route::post('update','update')->name('admin.fee_category.update');
                Route::get('delete/{id}','destroy')->name('admin.fee_category.delete');
     
            });
        });
        Route::prefix('student-admission')->group( function () {
            Route::controller(AdmissionController::class)->group( function () {
                Route::get('list','index')->name('admin.student.admission.list');
                Route::get('create','create')->name('admin.student.admission.create');
                Route::post('store','store')->name('admin.student.admission.store');
                Route::get('edit/{id}','edit')->name('admin.student.admission.edit');
                Route::post('update','update')->name('admin.student.admission.update');
                Route::get('delete/{id}','destroy')->name('admin.student.admission.delete');
                Route::get('/get-fee-by-age/{id}/{category_id}','getFeeByAge')->name('admin.student.admission.get_fees');
                Route::get('/get-subdivisions/{district_id}', 'getSubdivisions');
                Route::get('/print-form/{id}','details')->name('admin.student.admission.print_form');
     
            });
        });

        Route::prefix('student-payment')->group( function () {
            Route::controller(StudentPaymentController::class)->group( function () {
                Route::get('/','index')->name('admin.student.payment.index');
                Route::get('create','create')->name('admin.student.payment.create');
                Route::post('store','store')->name('admin.student.payment.store');
                Route::post('get-students-by-category','get_students_by_category')->name('admin.student.get-students-by-category');
                Route::post('get-students-payment-data','get_students_payment_data')->name('admin.student.get-students-payment-data');

                Route::get('/{id}/show','show')->name('admin.student.payment.show');
                Route::get('/{id}/show-transactions','show_transactions')->name('admin.student.payment.show-transactions');
                Route::get('/{date}/{id}/transaction-invoice','student_transaction_invoice')->name('admin.student.payment.transaction-invoice');
            });
        });

        Route::prefix('designations')->group( function () {
            Route::controller(DesignationController::class)->group( function () {
                Route::get('list','index')->name('admin.designations.list');
                Route::get('create','create')->name('admin.designations.create');
                Route::post('store','store')->name('admin.designations.store');
                Route::get('edit/{id}','edit')->name('admin.designations.edit');
                Route::post('update','update')->name('admin.designations.update');
                Route::get('delete/{id}','destroy')->name('admin.designations.delete');
    
            });
        });

        Route::prefix('comity')->group( function () {
            Route::controller(ComityController::class)->group( function () {
                Route::get('list','index')->name('admin.comity.list');
                Route::get('create','create')->name('admin.comity.create');
                Route::post('store','store')->name('admin.comity.store');
                Route::get('edit/{id}','edit')->name('admin.comity.edit');
                Route::post('update','update')->name('admin.comity.update');
                Route::get('delete/{id}','destroy')->name('admin.comity.delete');
    
            });
        });

        Route::prefix('committe')->group( function () {
            Route::controller(CommitteeMembersController::class)->group( function () {
                Route::get('members/{id}','index')->name('admin.committe.members.list');
                Route::get('assign-members/{id}','create')->name('admin.committe.members.create');
                Route::post('assign-members-to-committe','store')->name('admin.committe.members.store');
    
            });
        });


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

        Route::resource('expenses',ExpensesController::class);
        Route::get('expenses/{date}/expenses-details',[ExpensesController::class,'details'])->name('expenses.details');

        
        Route::resource('assets', AssetController::class);
        Route::resource('expense-category', ExpenseCategoryController::class);
    });
    
    
});
