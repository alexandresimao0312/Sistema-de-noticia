<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class SiteController extends Controller
{
    public function index()
    {
        $topnews = News::orderBy('id','desc')->first();
        $news = News::orderBy('id','desc')->skip(1)->limit(6)->get();
       
        return view('site.index', compact('topnews','news'));
    }
    public function read(News $news)
    {
        return view('site.read', compact('news'));
    }
    public function news()
    {
        $news = News::orderBy('id','desc')->get();

        return view('site.todasNews', compact('news'));
    }
    public function newsCategory($id)
    {
        $news = News::orderBy('id','desc')->where('category_id', $id)->get();

        return view('site.todasNews', compact('news'));
    }
    public function buscar(Request $request)
    {
        $keyword = $request->get('keyword');
        $news = News::orderBy('id','desc')->where('titulo','like', "%$keyword%")->get();

        return view('site.todasNews', compact('news'));
    }
}



