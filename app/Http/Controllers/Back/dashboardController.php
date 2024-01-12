<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\kategori;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('back.dashboard.index', [
            'total_articles' => Article::count(),
            'total_kategoris' => kategori::count(),
            'latest_article' => Article::with('kategori')->whereStatus(1)->latest()->take(5)->get(),
            'popular_article' => Article::with('kategori')->whereStatus(1)->orderBy('views', 'desc')->take(5)->get()
        ]);
    }
}
