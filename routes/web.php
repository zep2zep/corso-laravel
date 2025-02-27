<?php


use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('home', [
        'pageTitle' => 'Home AWS ',
        'metaTitle' => 'Storage in AWS S3 '
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about', [
        'pageTitle' => 'About',
        'metaTitle' => 'About nel metatitle'
    ]);
    //})->middleware(AddCustomHeader::class);
});

Route::get('/user', function () {
    return view('user', [
        'pageTitle' => 'Utente',
        'metaTitle' => 'Utente nel metatitle'
    ]);
})->middleware('auth')->name('user');


Route::get('/post/{post}', function (Post $post) {
    return view('posts.show', ['post' => $post]);
})->where('id', '[0-9]+')->name('post.show');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');


Route::put('/post/{id}', function (Request $request, $id) {
    $post = Post::findOrFail($id);

    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->save();
    return redirect()->route('post.show', ['id' => $post->id])->with('success', 'Post aggiornato con successso');
})->where('id', '[0-9]+')->name('post.update');


Route::delete('/post/{id}', function ($id) {
    $post = Post::findOrFail($id);

    $post->delete();
    return redirect()->route('post.index')->with('success', 'Post eliminato con successso');
})->where('id', '[0-9]+')->name('post.delete');



//Route caricamento dell'immagine:
Route::put('/upload-image', [ImageUploadController::class, 'upload'])->name('upload.image');

//Route per la registrazione
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('showRegistrationForm');
Route::post('/register', [UserController::class, 'register'])->name('registerUser');

//Route per login
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('loginUser');

//Route per logout
Route::post('/logout', [UserController::class, 'logout'])->name('logoutUser');

//Route per products
Route::get('/products', [PostController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class);
