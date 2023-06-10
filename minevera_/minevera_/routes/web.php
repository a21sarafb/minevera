<?php

use App\Http\Controllers\AddRecipesController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Database\QueryException;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\EditRecipesController;

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
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::match(['get', 'post'], '/buscar-recetas', [HomeController::class, 'buscarRecetas'])->name('buscarRecetas');
// Ruta para ver las recetas por categorias
Route::get('/categories/{category}', [CategoriesController::class, 'show'])->name('categories.show');

// Añadir receta
Route::post('/addRecipe', [AddRecipesController::class, 'store'])->name('recipes.store');
// formulario para añadir receta
Route::get('/recipes/create', [AddRecipesController::class, 'create'])->name('recipes.create');

// Editar receta
Route::get('recipe/{recipe}/edit', [EditRecipesController::class, 'edit'])->name('recipe.edit');
//Actualizar receta
Route::post('updateRecipe/{recipe}', [EditRecipesController::class, 'update'])->name('recipe.update');
//Route::post('/updateRecipe/{id}', 'EditRecipesController@update')->name('updateRecipe');



// Ruta para añadir receta de 'favoritos'
Route::post('/favorite', [FavoriteController::class, 'addFavorite'])->name('addFavorite');
// Ruta para ver la/s receta/s de 'favoritos'
Route::get('/favorites', [FavoriteController::class, 'showFavorites'])->name('showFavorites');
// Ruta para eliminar receta de 'favoritos'
Route::post('/remove-favorite', [FavoriteController::class, 'removeFavorite'])->name('removeFavorite');

// Ruta para mostrar el formulario de registro
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Ruta para procesar el registro de usuario
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Ruta para mostrar el formulario de inicio de sesión
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Ruta para procesar el inicio de sesión
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Ruta para acceder al perfil de usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas google OAuth 
Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    try {
        $user = Socialite::driver('google')->user();
        $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
        if ($userExists) {
            Auth::login($userExists);
            return redirect('/google-auth');
        } else {
            $existingUser = User::where('email', $user->email)->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'external_id' => $user->id,
                    'external_auth' => 'google',
                ]);
                Auth::login($newUser);
            }
        }
        return redirect('/google-auth');
    } catch (QueryException $exception) {
        // Manejar el error de integridad de la base de datos
        $errorMessage = 'Error: No se pudo crear el usuario. Ya existe un usuario con el mismo correo electrónico.';
        return response()->view('error', ['message' => $errorMessage], 500);
    } catch (\Exception $exception) {
        // Manejar otros errores inesperados
        $errorMessage = 'Error: Ocurrió un problema al autenticar con Google.';
        return response()->view('error', ['message' => $errorMessage], 500);
    }
});

Route::get('/google-auth', function () {
    if (Auth::check()) {
        // El usuario está autenticado, redirigirlo a la página principal
        return redirect('/');
    } else {
        // El usuario no está autenticado, mostrar un mensaje de error o redirigirlo a la página de inicio de sesión
        return response()->view('error', ['message' => 'Error: El usuario no está autenticado.'], 401);
    }
});

//Rutas twitter OAuth 
Route::get('/login-twitter', function () {
    return Socialite::driver('twitter')->redirect();
});

Route::get('/twitter-callback', function () {
    try {
        $user = Socialite::driver('twitter')->user();
        $userExists = User::where('external_id', $user->id)->where('external_auth', 'twitter')->first();
        if ($userExists) {
            Auth::login($userExists);
            return redirect('/twitter-auth');
        } else {
            $existingUser = User::where('email', $user->email)->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'external_id' => $user->id,
                    'external_auth' => 'twitter',
                ]);
                Auth::login($newUser);
            }
            return redirect('/twitter-auth');
        }
    } catch (QueryException $exception) {
        // Manejar el error de integridad de la base de datos
        $errorMessage = 'Error: No se pudo crear el usuario. Ya existe un usuario con el mismo correo electrónico.';
        return response()->view('error', ['message' => $errorMessage], 500);
    } catch (\Exception $exception) {
        // Manejar otros errores inesperados
        $errorMessage = 'Error: Ocurrió un problema al autenticar con Twitter.';
        return response()->view('error', ['message' => $errorMessage], 500);
    }
});

Route::get('/twitter-auth', function () {
    if (Auth::check()) {
        // El usuario está autenticado, redirigirlo a la página principal
        return redirect('/');
    } else {
        // El usuario no está autenticado, mostrar un mensaje de error o redirigirlo a la página de inicio de sesión
        return response()->view('error', ['message' => 'Error: El usuario no está autenticado.'], 401);
    }
});

//Rutas github OAuth 
Route::get('/login-github', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/github-callback', function () {
    try {
        $user = Socialite::driver('github')->user();
        $userExists = User::where('external_id', $user->id)->where('external_auth', 'github')->first();
        if ($userExists) {
            Auth::login($userExists);
            return redirect('/github-auth');
        } else {
            $existingUser = User::where('email', $user->email)->first();
            if ($existingUser) {
                Auth::login($existingUser);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'avatar' => $user->avatar,
                    'external_id' => $user->id,
                    'external_auth' => 'github',
                ]);

                Auth::login($newUser);
            }
            return redirect('/github-auth');
        }

        return redirect('/');
    } catch (QueryException $exception) {
        // Manejar el error de integridad de la base de datos
        $errorMessage = 'Error: No se pudo crear el usuario. Ya existe un usuario con el mismo correo electrónico.';
        return response()->view('error', ['message' => $errorMessage], 500);
    } catch (\Exception $exception) {
        // Manejar otros errores inesperados
        $errorMessage = 'Error: Ocurrió un problema al autenticar con Twitter.';
        return response()->view('error', ['message' => $errorMessage], 500);
    }
});

Route::get('/github-auth', function () {
    if (Auth::check()) {
        // El usuario está autenticado, redirigirlo a la página principal
        return redirect('/');
    } else {
        // El usuario no está autenticado, mostrar un mensaje de error o redirigirlo a la página de inicio de sesión
        return response()->view('error', ['message' => 'Error: El usuario no está autenticado.'], 401);
    }
});

require __DIR__.'/auth.php';