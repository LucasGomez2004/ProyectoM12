<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EscapeRoomController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//  Route::get('/inicio', [AdminController::class, 'index'])->name('admin.index');

// LOGIN GOOGLE

Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    $user_google = Socialite::driver('google')->stateless()->user();

    // Buscar un usuario existente por su correo electrónico
    $existing_user = User::where('email', $user_google->email)->first();

    if ($existing_user) {
        // Si el usuario existe, actualiza la información según los datos de Google
        $existing_user->update([
            'google_id' => $user_google->id,
            'avatar' => $user_google->avatar,
            // Puedes agregar más campos aquí si deseas actualizarlos
        ]);

        // Iniciar sesión con el usuario existente
        Auth::login($existing_user);
    } else {
        // Si el usuario no existe, crea un nuevo usuario
        $new_user = User::create([
            'name' => $user_google->name,
            'email' => $user_google->email,
            'google_id' => $user_google->id,
            'avatar' => $user_google->avatar,
            // Puedes agregar más campos aquí si deseas
        ]);

        // Iniciar sesión con el nuevo usuario
        Auth::login($new_user);
    }

    return redirect('/dashboard');
});

// CALENDARIO

Route::get('/calendario', [ReservationController::class, 'index'])->name('calendar.calendar');

// USERS 

Route::match(['get', 'post'], '/users', [UserController::class, 'list'])->name('user.list');


Route::match(['get', 'post'], '/user/new', [UserController::class, 'new'])->name('user.new');

Route::match(['get', 'post'], '/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');

Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

Route::match(['get', 'post'], '/user/profile/{id}', [UserController::class, 'profile'])->name('user.profile');

// ESCAPE ROOM

Route::match(['get', 'post'], '/escaperoom', [EscapeRoomController::class, 'list'])->name('escaperoom.list');

Route::match(['get', 'post'], '/escaperoom/new', [EscapeRoomController::class, 'new'])->name('escaperoom.new');

Route::match(['get', 'post'], '/escaperoom/edit/{id}', [EscapeRoomController::class, 'edit'])->name('escaperoom.edit');

Route::get('/escaperoom/delete/{id}', [EscapeRoomController::class, 'delete'])->name('escaperoom.delete');

// SERVICES 

Route::match(['get', 'post'], '/services', [ServiceController::class, 'list'])->name('service.list');


Route::match(['get', 'post'], '/service/new', [ServiceController::class, 'new'])->name('service.new');

Route::match(['get', 'post'], '/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');

Route::get('/service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');

// LOCATION 

Route::match(['get', 'post'], '/locations', [LocationController::class, 'list'])->name('location.list');


Route::match(['get', 'post'], '/location/new', [LocationController::class, 'new'])->name('location.new');

Route::match(['get', 'post'], '/location/edit/{id}', [LocationController::class, 'edit'])->name('location.edit');

Route::get('/location/delete/{id}', [LocationController::class, 'delete'])->name('location.delete');

// Roles 

Route::match(['get', 'post'], '/roles', [RoleController::class, 'list'])->name('role.list');


Route::match(['get', 'post'], '/role/new', [RoleController::class, 'new'])->name('role.new');

Route::match(['get', 'post'], '/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');

Route::get('/role/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');

//excel import export 
Route::get('/excel-export', [UserController::class,'export'])->name('export');
Route::get('/excel-import', [UserController::class,'importView'])->name('import.view');
Route::post('/excel-import', [UserController::class,'import'])->name('import');

require __DIR__.'/auth.php';

