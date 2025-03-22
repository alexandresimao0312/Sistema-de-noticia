<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    private $news;
    private $categoria;

    public function __construct(News $news, Category $categoria)
    {
        $this->news = $news;
        $this->categoria = $categoria;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = $this->news->orderBy('id','desc')->paginate(5);
        return view("admin.template.news.noticia", compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoria = $this->categoria->all();
        return view("admin.template.news.criarNoticia", compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $file = $request->file('cover');
        $data = $request->all();
        $filiname = date('YmdHi').$file->hashName();
        $file->move(public_path("site/images"), $filiname);
        $data['cover'] =$filiname;
        $this->news->create($data);
        session()->flash("success","A Operação Foi Realizada Com Sucesso!");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categoria = $this->categoria->all();
        return view("admin.template.news.editNoticia", compact("news","categoria"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        $file = $request->file('cover');
        $data = $request->all();
        $filiname = date('YmdHi').$file->hashName();
        $file->move(public_path("site/images"), $filiname);
        $data['cover'] =$filiname;
        $news->update($data);
        session()->flash("success","A O Registo Foi atualizado Com Sucesso!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        session()->flash("success","O Resgisto Foi Apagado Com Sucesso!");
        return redirect()->back();
    }
    public function buscar(Request $request)
    {
        $keyword = $request->get('key');
        $news = News::orderBy('id','desc')->where('titulo','like', "%$key%")->get();

        return view("admin.template.news.noticia", compact('news'));
    }
}
