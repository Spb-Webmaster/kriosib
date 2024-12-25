<?php

namespace App\Http\Controllers;

use App\Models\Gallery;

class GalleryController extends Controller
{

    public function gallery() {

        $items = Gallery::query()->where('published', 1)->orderBy('sorting')->get();

        return view('pages.gallery', ['items' => $items ]);
    }

}
