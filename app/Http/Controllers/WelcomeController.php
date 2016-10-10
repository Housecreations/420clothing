<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\CarouselImage;
use App\Article;
use App\FrontImage;

class WelcomeController extends Controller
{
    public function index(){
        
    $carousel = CarouselImage::all();
    $front_images = FrontImage::find(1);
    return view('welcome', ['carousel' => $carousel, 'front_images' => $front_images]);  
        
        
    }
    
    
}
