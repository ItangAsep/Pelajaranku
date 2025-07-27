<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;
use App\Models\Material;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    $materials = Material::where('is_approved', true)->get();
    return view('guest.dashboard', compact('materials'));
})->name('guest.dashboard');

Route::get('/redirect-after-login', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');
})->middleware(['auth']);


// Nambah route Dasboard admin
Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }
    $materials = \App\Models\Material::where('is_approved', true)->get();
    return view('user.dashboard', compact('materials'));
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth'])->group(function () {
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/materials/{id}', [MaterialController::class, 'show'])->name('materials.show');

    
});


//Route::middleware('auth')->group(function () {
    
//});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/materials', [MaterialController::class, 'index'])->name('materials.index');
    Route::patch('/materials/{id}/approve', [MaterialController::class, 'approve'])->name('materials.approve');
    Route::get('/materials/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/materials', [MaterialController::class, 'store'])->name('materials.store');
    Route::get('/approvals', [MaterialController::class, 'pending'])->name('approvals.index');
    Route::get('/materials/{id}/edit', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::put('/materials/{id}', [MaterialController::class, 'update'])->name('materials.update');
    Route::delete('/materials/{id}', [MaterialController::class, 'destroy'])->name('materials.destroy');
    Route::get('/materials/{id}', [MaterialController::class, 'show'])->name('materials.show');


});

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');


Route::middleware(['auth', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('dashboard');
});


require __DIR__.'/auth.php';
