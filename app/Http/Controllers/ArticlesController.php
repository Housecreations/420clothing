<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Laracasts\Flash\Flash;
use App\Image;
use App\Tag;

class ArticlesController extends Controller
{
    
    
     public function deleteimage($id, $image_id)
    {
            Image::deleteImage($image_id);
         
            return back();
     
    }
    
    
      public function newimage(Request $request, $id)
    {
            $article = Article::find($id);
          
            Image::uploadImage($article, $request);
            
            return back();
      
    }
    
     public function images($id)
    {
         $article = Article::find($id);
         
         return view('admin.articles.images')->with('article', $article);
    }
    
    
    
   public function index(Request $request)
    {
         $articles = Article::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);
       
        return view('admin.articles.index')->with('articles', $articles);
    }
    
    
  /*  public function all(Request $request)
    {
         $articles = Article::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);
       
        return view('admin.articles.all')->with('articles', $articles);
    }*/
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $tags = Tag::orderBy('name', 'ASC')->lists('name', 'id');
        
        return view('admin.articles.create', ['tags' => $tags]);
        
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        
        
        Article::saveArticle($request);
        
        return redirect()->route('admin.articles.index');
        
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
     
        $article = Article::find($id);
        $tags = Tag::orderBy('name', 'ASC')->lists('name', 'id');
        
       
      
        return view('admin.articles.edit', ['article' => $article, 'tags' => $tags]);
        
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->fill($request->all());
        $article->price_now = $request->price - ($request->price * ($request->discount/100));
        $article->slug = null;
        $article->save();
        
        $article->tags()->sync($request->tags);
        
        
        Flash::success('El artículo se editó con éxito');
        
        
        return redirect()->route('admin.articles.index');
      
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        
        foreach($article->images as $image){
            unlink(public_path()."\images\articles\\".$image->image_url);
             /*  unlink("/home2/dsistema/public_html/images/articles/".$image->image_url);*/
        }
        
        $article->delete();
        
        Flash::error('El articulo ' . $article->name. ' ha sido eliminado');
      
        return redirect()->route('admin.articles.index');
         
    }
    
    public function visible(Request $request)
    {   //ocultar o mostrar el artículo
         if($request->ajax()){
                
             $article = Article::find($request->article_id);
            
             if($article->visible == 'yes'){
                
                 $article->visible = 'no';
                 $article->save();
             
                 return response()->json(['clase'=>'button-visible no-visible', 'texto' => 'Oculto' ]);
                                  
                    
             }else{
                 
                 $article->visible = 'yes';
                 $article->save();
             
                 return response()->json(['clase' => 'button-visible', 'texto' => 'Visible']);
                        
            }
         }
    }
}
