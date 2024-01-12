<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home.index', [
            'latest_post' => Article::latest()->first()
        ]);
    }

    public function player()
    {
        return view('front.home.player');
    }
}