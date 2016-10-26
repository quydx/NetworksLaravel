<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;
use App\Post ;
use App\Category ;
use App\Tag;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $all_posts = Post::all();
        $all_cates = Category::all();
        $all_tags = Tag::all();
        $newests = Post::orderBy('created_at','desc')->paginate(5);
        $mostviews = Post::orderBy('views','asc')->paginate(5);
        view()->share(['all_posts'=>$all_posts , 'all_cates'=>$all_cates , 'newests'=>$newests , 'mostviews'=>$mostviews , 'all_tags'=>$all_tags]);
    }
    public function cates($id){
        $posts = Post::where('cate_id', $id)->paginate(20);
        // return view('frontend.pages.cates',compact('posts')) ;
    }
    public function home()
    {   
        return view('frontend.trangchu');
    }
    public function get_view_post( $id_post , $name){
        $posts = Post::orderBy('created_at','desc')->take(5)->get();
        $post_detail = Post::where('id', $id_post)->first();
        $post_detail->views ++;
        $post_detail->save();
        return view('frontend.post',compact('post_detail','posts'));
    }
    public function register(){
        return view('frontend.register');
    }
    public function dangnhap(){
         if (Auth::user() )                        
            return ' Bạn đã đăng nhập rồi';
         else
            return view('frontend.login');
    }
    public function quanly(){
        return view('backend.pages.blank');
    }
    public function confirmRegister( Request $request){ //post register
        $this->validate($request , ['email'=>'required|unique:users,email'],['email.unique'=>'Email này đã được sử dụng'] ); 
        $user = new User();
        $user->name = $request->name ;
        $user->email = $request->email ;
        if ( $request->password == $request->retypePassword)
        $user->password = Hash::make( $request->password);
        else return redirect()->route('get_dang_ky')->with(['flash_message'=>'Nhập lại mật khẩu không đúng','kind'=>'danger']);
        $user->save();
        return redirect()->route('get_dang_nhap')->with(['flash_message'=>'Đăng ký tài khoản thành công','kind'=>'success']);
    }
    public function p_dangnhap(Request $request){ // đăng nhập
        $email = $request->email ;
        $password = $request->password ;
        if ( Auth::attempt(['email'=>$email , 'password'=>$password] ) ){ // đănh nhập thành công
            // Session::put('user', $email); // tạo session username
            return redirect()->route('admin'); // trả vẻ trang quản trị
        }
        else {
            return redirect()->route('get_dang_nhap')->with(['flash_message'=>'Sai tên tài khoản hoặc mật khẩu', 'kind'=>'danger']);
        }
    }
    public function dangxuat() {
        Auth::logout();
        return redirect()->route('get_dang_nhap');
    }
}
