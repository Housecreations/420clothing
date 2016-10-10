<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ArticleDetail;

use Laracasts\Flash\Flash;

class ArticleDetailsController extends Controller
{
    public function index($id){
        $articleDetails = ArticleDetail::where('article_id', '=', $id)->orderBy('id', 'DESC')->paginate(5);
        
        return view('admin.articleDetails.index', ['articleDetails' => $articleDetails, 'article_id' => $id]);
    }
    
    public function create($id){
        return view('admin.articleDetails.create', ['article_id' => $id]);
    }
    
    public function store($id, Request $request){
       
        $articleDetail = new ArticleDetail($request->all());
        $articleDetail->save();
              
        Flash::success("Articulo registrado");
       
     return redirect()->route('admin.articleDetails.index', $id);
    }
    
    public function update($id, $articleDetailId, Request $request){
        $articleDetail = ArticleDetail::find($articleDetailId);
        $articleDetail->fill($request->all());
     
        $articleDetail->save();
        
        Flash::success('El detalle de artículo se editó con éxito');
        
        
        return redirect()->route('admin.articleDetails.index', $id);
    }
    
    public function edit($article_id ,$detail_id){
        $articleDetail = ArticleDetail::find($detail_id);
        return view('admin.articleDetails.edit', ['articleDetail' => $articleDetail, 'article_id' => $article_id]);
    }
    
    public function destroy($id){
        ArticleDetail::destroy($id);
        Flash::success('El detalle de artículo ha sido eliminado');
        return back();
        
    }
    public function getSizes(Request $request){
        
        if($request->ajax()){
            
            $sizes = ArticleDetail::where('article_id', '=', $request->article_id)->where('color','=', $request->color)->get(['id', 'size']);
            
            return response()->json($sizes);
        }else{
            return abort(404);
        }
        
    }
    public function sizesAction(Request $request){
        
        if($request->ajax()){
          $articleDetail = ArticleDetail::find($request->articleDetail_id);
            if($articleDetail->stock > 0)
          return response()->json("Existencia");
            else
            return response()->json("Agotado");
        }else{
            return abort(404);
        }
        
    }
}
