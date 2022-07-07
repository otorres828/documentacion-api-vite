<?php

namespace App\Http\Controllers\Documentacion;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{    
    public function index()
    {
        $documentos = Document::all();
        return view('documentacion.index',compact('documentos'));
    }
  
    public function create()
    {
        $categorias = Category::orderBy('name','asc')->pluck('name', 'id');
        return view('documentacion.create',compact('categorias'));
    }

    public function store(Request $request)
    {
        Document::create($request->all());
       
        return redirect()->route('document.index')->with('info','El documento se creo con exito');
    }
  
    public function edit(Document $documentacion)
    {
        $categorias = Category::orderBy('name','asc')->pluck('name', 'id');
        return view('documentacion.edit',compact('documentacion','categorias'));
    }

    public function update(Request $request, Document $documentacion)
    {   
        $documentacion->update($request->all());                      
        return redirect()->route('document.index')->with('info','Se actualizo la documentacion');
    }

    public function destroy($id)
    {
       $doc = Document::find($id);
       $doc->delete();
        return redirect()->route('document.index')->with('delete','La documentacion se elimino con exito');
    }
}
