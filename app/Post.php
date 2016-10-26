<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
 	protected $table = 'posts';
	public $timestamp = true ;
	public function category() {
		return $this->belongsTo('App\Category','cate_id','id');
	}
	public function post_tag() {
		return $this->hasMany('App\PostTag','id_post','id');
	}

}
// belongsTo khoaphu -> khoa chinh