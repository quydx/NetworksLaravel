<?php

namespace App;
use App\Post;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
 	protected $table = 'categories';
	public $timestamp = true ;
	public function posts() {
		return $this->hasMany('App\Post','cate_id','id');
	}
}
