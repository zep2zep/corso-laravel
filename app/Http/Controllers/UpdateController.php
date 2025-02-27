<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request)
    {
        $path = $request->file('file')->store('public/images');

        return response()->json([
            'path' => $path,
            'msg' => 'success'
        ]);
    }
}
