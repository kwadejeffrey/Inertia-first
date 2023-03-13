<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Faker\Provider\ar_EG\Internet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

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
//     return view('home');
// });
Route::get('/', function () {
    return Inertia::render('home',[
        'hello' => 'lols'
    ]);
});

Route::get('/users', function () {
    return Inertia::render('users',[
        'time' => now()->toTimeString(),
        'users' => User::query()
            ->when(Request::input('search'), function($query, $search){
                $query->where('name', "LIKE", "%{$search}%");
            })
            ->paginate(3)
            ->withQueryString()
            ->through(fn ($user) => ['id'=>$user->id,'name' => $user->name, 'email' => $user->email]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        // 'users' => User::paginate(3)->map(fn ($user) => ['id'=>$user->id,'name' => $user->name, 'email' => $user->email])
        // 'users' => DB::table('users')->select('name','email','id')->get()
        // 'users' => User::paginate(3)
    ]);
});

Route::get('/createUser', function (){
    return Inertia::render('Users/createUser');
})->can('create','App\Models\User');

Route::post('/users', function(){
    $user = Request::validate([
        'name' => ['required', 'min:5'],
        'email' => ['required', Rule::unique('users','email')],
        'password' => ['required', 'min:6']
    ]);

    // $user['password'] = Hash::make($user['password']);

    User::create($user);

    return redirect('/');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/setting', function () {
        return Inertia::render('setting',[
            'hello' => 'lols'
        ]);
    });
    Route::post('/logout',[LoginController::class, 'destroy']);
});

Route::get('/loginPage', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'login']);




