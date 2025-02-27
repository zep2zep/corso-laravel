<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Verifica se è presente il parametro 'limit'
        $limit = $request->query('limit');

        // Se 'limit' è presente, limita i risultati
        if ($limit) {
            $posts = Post::limit($limit)->get();
        } else {
            // Altrimenti, restituisci tutti i post
            $posts = Post::all();
        }

        // Restituisci i risultati come JSON
        return response()->json($posts, 200);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json($post, 200);
        } else {
            return response()->json(['message' => 'Post not found', 404]);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'user_id' => 'required|exists:users,id',
        ]);

        $post = Post::create($validatedData);

        return response()->json($post, 201);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post) {
            $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'content' => 'sometimes|required|string',
            ]);

            $post->update($request->only(['title', 'content']));

            return response()->json($post, 200);

        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            $post->delete();
            return response()->json(['message' => 'Post deleted'], 200);

        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }

}
