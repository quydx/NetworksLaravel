<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;

class CategoriesController extends Controller
{
    public function cate_get_list() {  
    	$cates = Category::orderBy('id', 'desc')->get(); 
    	return view('backend.cate_list',compact('cates'));
    }
    public function cate_post_add ($cate_name , $parent_id){
	    $cate = Category::where('name', $cate_name)->get();
	    if (count($cate) >= 1 ){
	    	return 'false' ;
	    }
	    else {
			$cate = new Category ;
			$cate->parent_id = $parent_id;
			$cate->name 	=  	$cate_name;
			$cate->slugify 	=	str_slug($cate_name);
			$cate->status 	=	1;
			$cate->save();
			return 'true' ;
		}
		// echo $cate_name . "/" . $parent_id;
	}
	public function cate_get_delete( $id) {
			$cate =Category::find($id);
			$cate->delete($id);
			return redirect()->route('cate_list')->with(['flash_message'=>'removed successfully']);
	} 
	public function cate_post_edit (Request $request , $id) {
	    $this->validate($request , ['name'=>'required|unique:categories,name'],['name.unique'=>'Tên category này đã được sử dụng'] ); 
		$cate = Category::find($id);
		$cate->name 	=  	$request->name;
		$cate->slugify 	=	str_slug($request->name);
		$cate->status 	=	1;
		$cate->save();
		return redirect()->route('cate_list')->with(['flash_message'=>'Edited successfully']);
	}	

}
