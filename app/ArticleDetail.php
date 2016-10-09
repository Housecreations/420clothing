<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    protected $table = "articleDetails";
    
    protected $fillable = ['article_id', 'color', 'size', 'stock'];
    
    public function article(){
        
        return $this->belongsTo('App\Article');
    }
    

}
