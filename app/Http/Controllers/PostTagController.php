<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostTag;
use App\Http\Requests;

class PostTagController extends Controller
{
    public function create( $tag_id , $post_id){
    	$post_tag = new PostTag ;
    	$post_tag->id_post = $post_id ;
    	$post_tag->id_tag = $tag_id ;
    	$post_tag->status =  1; 
    	$post_tag->save();
    }
}
