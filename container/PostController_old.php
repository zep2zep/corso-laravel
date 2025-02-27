<?php

namespace App\Http\Controllers;
use App\Models\Post; // Importa il modello Post
//use Illuminate\Http\Request;

class PostController_old extends Controller
{
    // Metodo per mostrare tutti i post
    public function index()
    {
        // Recupera tutti i post
        $posts = Post::all();

        // Restituisce la vista con i post
        return view('posts.index', ['posts' => $posts]);
    }
    // Metodo per la creazione di un nuovo post
    public function create()
    {
        // Crea un nuovo post con dati fittizi
        $post = Post::create([
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Mostra un messaggio di conferma e la vista del nuovo post
        return view('posts.create', ['post' => $post]);
    }
    // Metodo per eliminare un post
    public function delete($id)
    {
        // Recupera il post tramite l'ID
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            $message = "Il post con ID $id è stato eliminato.";
        } else {
            $message = "Il post con ID $id non esiste o non è stato eliminato.";
        }

        // Mostra un messaggio di conferma
        return view('posts.delete', ['message' => $message]);
    }
}
