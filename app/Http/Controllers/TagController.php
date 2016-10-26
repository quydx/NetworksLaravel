<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tag;
use App\Post ;
use App\PostTag;
use App\Http\Requests;

class TagController extends Controller
{
    public function tag_add ($tag_name){
		$check = Tag::where('name', $tag_name )->get();
		if (count($check) == 0 ){
			$tag = new Tag ;
			$tag->name 		=  	$tag_name;
			$tag->slugify 	=	str_slug($tag_name);
			$tag->status 	=	1;
			$tag->save();
			return 'true';
		} 
		else return 'false';
	}
	public function tag_list() {
    	$tags = Tag::orderBy('id','desc')->paginate(10);
    	return view('backend.tag_list',compact('tags'));
    }
	public function tag_delete( $id) {
		$tag = Tag::find($id);
		$tag->delete();

	}
	public function tag_edit(Request $request , $id){
		$tag = Tag::find($request->id);
		if($tag){
			$tag->name = $request->name ;
			$tag->slugify = str_slug($request->name);
			$tag->status = 1; 
			$tag->save();
		}
	}
}
