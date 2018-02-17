<?php

namespace App\Http\Controllers;

use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        return response()->json(Tag::all());
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->with('articles')->first();
        abort_unless($tag, 404);

        return view('tags.show', compact('tag'));
    }
}
