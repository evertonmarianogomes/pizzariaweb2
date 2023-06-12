<?php
    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\AppController;
    use App\Http\Controllers\AboutController;
    use App\Http\Controllers\UserController;


    Route::get("/", [AuthController::class, "showLoginForm"])->name("admin.login");
    Route::get("/admin/logout", [AuthController::class, "logout"])->name("admin.logout");
    
    Route::middleware("nocache")->group(function () {        
        Route::get("/admin", [AppController::class, "dashboard"])->name("admin");
        
        Route::get("/admin/edit", [AppController::class, "viewEditCurrentUser"])->name("app.admin.editCurrentUser");

        // Users Routes
        Route::get("/admin/users", [AppController::class, "viewUsers"])->name("app.admin.users")->middleware("role:admin");

        Route::post("/admin/users", [UserController::class, "createUser"])->name("app.admin.users.create");


        //Edit About Route
        Route::get("/admin/about", [AppController::class, "viewEditAbout"])->name("app.admin.about")->middleware('role:admin');
        Route::post("/admin/about/get", [AboutController::class, "selectAboutByID"])->name("app.admin.about.get");

        Route::post("/admin/about/update", [AboutController::class, "update"])->name("app.admin.about.update");

        Route::get('/admin/vue/', [AppController::class, "home"])->name("app.vue.home");
    });

    Route::post("/", [AuthController::class, "validateLogin"])->name("admin.validateLogin");