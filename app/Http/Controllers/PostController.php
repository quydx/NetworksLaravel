<?php
namespace App\Http\Controllers;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Http\Requests;
use App\Tag;
use App\PostTag;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
class PostController extends Controller
{
	//return posts of a cate
	public function post_of_cates( $cate_id){
		// echo count($cate);
		$posts = Post::where('cate_id',$cate_id)->orderBy('created_at','desc')->take(5)->get()->toArray() ;
		return view('frontend.pages.baiviet',compact('posts'));
	}
	public function search ( Request $request ){
		$posts = Post::where('title','LIKE','%'.$request->key.'%')->paginate(10);
		return view('backend.pages.post_list',compact('posts'));
	}
    public function post_get_list() {  // trả về view list post
    	$posts = Post::all(); 
    	return view('backend.post',compact('posts'));
    }
    public function post_get_add (){
    	$cates = Category::all();
    	return view('backend.post_add',compact('cates'));
	}
    public function post_post_add (Request $request){
	    $this->validate($request , ['title'=>'required|unique:posts,title'],['title.unique'=>'Tên post này đã được sử dụng'] ); 
		$post = new Post ;
		if($request->cate_id){
			$post->cate_id 		=  	$request->cate_id;
		}
		else {
			$post->cate_id 		= 0 ;
		}
		$post->title 			=  	$request->title;
		$post->slugify 			=	str_slug($request->title);
		$post->description 		=	$request->_description;
		$post->content  		=	$request->_content;
		$post->status 			=	1;
		$post->seo_title 		=	$request->seo_title;
		$post->seo_description 	=	$request->seo_description;		
		$post->seo_keyword 		=	$request->seo_keywords;			
		$post->struct_data 		=	$request->struct_data;		
		if($request->thumbnail)	{		
			$file_name = $request->file('thumbnail')->getClientOriginalName();	
			$post->thumbnail 		=	$file_name;
			$request->file('thumbnail')->move('upload/',$file_name);
		}
		$post->save();

		if($request->tags){
			$tags_array = $request->tags;  // lay mang tags
			foreach ($tags_array as $name) {
				$tag  = Tag::where('name', $name )->first(); // kiem tra tag da ton tai chua
				if (count($tag) > 0 ){ // neu ton tai
					$post_tag = new PostTagController;
					$id_tag = $tag->id;
					$id_post = Post::where('title',$request->title)->first()->id;
					$post_tag->create($id_tag , $id_post);
				}
				else { // neu chua ton tai
					$new_tag = new TagController;
					$new_tag->tag_add($name);
					$post_tag = new PostTagController;
					$id_tag = Tag::where('name',$name)->first()->id;
					$id_post = Post::where('title',$request->title)->first()->id;
					$post_tag->create($id_tag , $id_post);
				}
			}  					
		}
		return redirect()->route('post_get_list')->with(['flash_message'=>'added successfully']);
	}
	public function post_get_delete($id) {
		$post = Post::find($id);
		File::delete('upload/'.$post['thumbnail']);
		$post->delete($id);
	}
	public function post_get_edit ( $id  ) {
		$post = Post::find($id);
		$cates = Category::all();
		return view('backend.post_edit',compact('post','cates'));
	}	 
	public function post_post_edit (Request $request , $id) {
		// $this->validate($request , ['title'=>'required|unique:posts,title'],['title.unique'=>'Tên post này đã được sử dụng'] ); 
		$post = Post::find($id);
		$post->cate_id 			=  	$request->cate_id;
		echo $post->cate_id 	;
		$post->title 			=  	$request->title;
		$post->slugify 			=	str_slug($request->title);
		$post->description 		=	$request->_description;
		$post->content  		=	$request->_content;
		$post->status 			=	1;
		$post->seo_title 		=	$request->seo_title;
		$post->seo_description 	=	$request->seo_description;				
		$post->seo_keyword 		=	$request->seo_keywords;					
		$post->struct_data 		=	$request->struct_data;	
		if ( $request->thumbnail ) {		
			File::delete('upload/',$post['thumbnail']);					
			$file_name = $request->file('thumbnail')->getClientOriginalName();	
			$post->thumbnail 	=	$file_name;	
			$request->file('thumbnail')->move('upload/'.$file_name);	
		}
		else {
			//
		}
		$post->save(); 

		if($request->tags){
			$tags_array = $request->tags;  // lay mang tags
			foreach ($tags_array as $name) {
				$tag  = Tag::where('name', $name )->first(); // kiem tra tag da ton tai chua
				if (count($tag) > 0 ){ // neu ton tai
					$tag_id = $tag->id;
					$post_tag = PostTag::where('id_tag',$tag_id)->first();
					if (count($post_tag) == 0){
						$post_tag = new PostTag;
						$post_tag->id_tag = $tag->id;
						$post_tag->id_post = Post::where('title',$request->title)->first()->id;
						$post_tag->status = 1;
						$post_tag->save(); // tao record posttag
					}
				}
				else { // neu chua ton tai
					$new_tag = new Tag;
					$new_tag->name = $name ;
					$new_tag->slugify = str_slug($name) ;
					$new_tag->status = 1;
					$new_tag->save(); // tao tag moi 
					$post_tag = new PostTag;
					$post_tag->id_tag = Tag::where('name',$name)->first()->id;
					$post_tag->id_post = Post::where('title',$request->title)->first()->id;
					$post_tag->status = 1;
					$post_tag->save(); // tao new tag moi
				}
			}  					
		}
		return redirect()->route('post_get_list')->with(['flash_message'=>'added successfully']);
	}	

}
// more way xu li file by laravel
// $path = Storage::putFile('', $request->file('thumbnail')); 	
//$path = $request->file('thumbnail')->store('');
//Storage::disk('local')->put($file_name,'');
