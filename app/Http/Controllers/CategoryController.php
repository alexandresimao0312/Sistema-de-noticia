<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category= $this->category->orderBy('id','desc')->paginate(3);
        return view("admin.template.category.category", compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.template.category.criarCategory");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $this->category->create($request->all());
        session()->flash("success","A Operação Foi Realizada Com Sucesso!");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {

        return view("admin.template.category.editCategory", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->all());
        session()->flash("success","A Operação Foi atualizado Com Sucesso!");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash("success","O Resgisto Foi Apagado Com Sucesso!");
        return redirect()->back();
    }
}
