<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
   protected $fillable = ['user_id'];

   public function article(){

//       return $this->belongsTo(Article::class,'collection_id','id');

       return $this->morphTo('collection');
   }
}
