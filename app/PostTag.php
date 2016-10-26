<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
	protected $table = 'post_tags';
	public $timestamp = true ;
	public function post() {
		return $this->belongsTo('App\Post','id_post','id');
	}
	public function tag() {
		return $this->belongsTo('App\Tag','id_tag','id');
	}
}
