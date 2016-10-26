<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $table = 'tags';
	public $timestamp = true ;
	public function post_tag() {
		return $this->hasMany('App\Post','id','id_tag');
	}
}
