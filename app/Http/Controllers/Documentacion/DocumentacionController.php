<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;


class DocumentacionController extends Controller
{
    public function show($slug){
        $id = Category::where('slug', $slug)->first()->id;
        $categorias = Category::all();
         $documentos = Document::where('category_id', $id)->get();
        return view('documentacion.mostrar',compact('categorias','documentos'));

    }

    public function principal(){
        $categorias = Category::all();
        return view('documentacion.principal',compact('categorias'));

    }
}
