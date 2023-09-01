<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable= ['title','slug','description','img_path','user_id'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
       return [
           'slug'=>[
               'source'=>'title'      //making a slug out of the title.
           ]
       ];
    }
}
