<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontImage extends Model
{
    protected $table = "front_images";
    
    protected $fillable = ['gentleman_image', 'ladies_image', 'acc_image', 'outlet_image'];
}
