@extends('backend.index')
@section('content')
    <div class="col-sm-12" style="background:#fff;">
        <div class="col-sm-12">
            <h4>Viết bài</h4>
        </div>
        {{-- show errors --}}
        @if( count($errors) > 0)
            <div class="col-xs-12 alert alert-danger">
                <ul>
                     @foreach ($errors->all() as $err) 
                        <li> {!! $err !!}</li>
                    @endforeach     
                </ul>
            </div>
        @endif
        {{-- alert notification --}}
        @if( Session::has('flash_message'))
            <div class="alert alert-success">
                {!! Session::get('flash_message') !!}
            </div>
        @endif
        {{-- end --}}
        
            <form action="{!! route('post_post_add') !!}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-xs-9">
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="title" placeholder="Please Enter Username" value=" {!! old('title')  !!}" />
                    </div>
                    <div class="form-group">
                        <label> Nội dung</label>
                        <textarea class="form-control" rows="3" name="_content" id="_content" ></textarea>
                    </div>
                    <button type="submit" class="btn btn-info">Xác nhận</button>
                    <button type="reset" class="btn btn-info">Reset</button>
                </div>
                <div class="col-xs-3">
                <div class="form-group">
                    <label>Chuyên mục</label>
                    <select class="form-control" name="cate_id">
                        @foreach($cates as $cate)
                            <option value="{{ $cate->id }}"> {{ $cate->name }}</option>
                        @endforeach
                        {{-- <option>Không chuyên mục</option> --}}
                    </select>
                </div>

                <div class="form-group">
                    <label>Miêu tả</label>
                    <textarea class="form-control" rows="3" name="_description">{!! old('_description')  !!}</textarea>
                </div>
                <div class="form-group">
                    <label>Thumbnail</label>
                    {{-- <input class="form-control" type="file" name="thumbnail" value="{!! old('thumbnail') !!} " required=""> --}}
                <label for="upload__thumbnail" class="img__upload">
                    <input name="thumbnail" id="upload__thumbnail" type="file" required="">
                    <img id="preview__img" style="max-width:100%;" src="" />
                </label>
                </div>
                <div class="form-group">
                    <label>SEO Title</label>
                    <textarea class="form-control" rows="3" name="seo_title"  >{!! old('seo_title')  !!}</textarea>
                </div>
                <div class="form-group">
                    <label>SEO Description</label>
                    <textarea class="form-control" rows="3" name="seo_description">{!! old('seo_description')  !!}</textarea>
                </div>
                <div class="form-group">
                    <label>SEO Keywords</label>
                    <input class="form-control" name="seo_keywords" placeholder="Please Enter Category Keywords" value=" {!! old('seo_keywords')  !!}" />
                </div>
                <div class="form-group">
                    <label>Thẻ Tag </label>
                    <select class="form-control select2" multiple="multiple" id="tags" name="tags[]">
                    </select>
                </div>
                <div class="form-group">
                    <label>Struct Data</label>
                    <textarea class="form-control" rows="3" name="struct_data"> {!! old('struct_data')  !!}</textarea>
                </div>
{{--                 <div class="form-group">
                    <label>Status</label>
                    <label class="radio-inline">
                        <input name="status" value="1" checked="" type="radio">Public
                    </label>
                    <label class="radio-inline">
                        <input name="status" value="2" type="radio">Delete
                    </label>
                </div> --}}
             </div>
        </form>
    </div>
 @endsection
 @section('jquery')
    <script type='text/javascript'>CKEDITOR.replace('_content');</script>
    <script type="text/javascript">
        ////// CHECK upload image and ReadURL Upload Image///////////
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                var true_extensoion = ['image/jpeg' , 'image/png' ,'image/gif' , 'image/jpg' ];

                reader.onload = function (e) {
                    var fsize = input.files[0].size;
                    var ftype = input.files[0].type;
                    var _URL = window.URL || window.webkitURL;
                    var img = new Image();
                    img.onload = function(){
                        var img_width = img.width ;
                        var img_height = img.height ;
                        for( var i=0;i<true_extensoion.length ; i++){
                        if (ftype == true_extensoion[i]) {
                            var check = true ;
                            break ;
                        }
                    }
                    if ( check == true ){
                        if (fsize<= 1048576*3) {
                            if ( img_width <=  800 && img_height <= 1200){
                                $('#preview__img').attr('src', e.target.result);
                            }
                            else {
                                alert('Kích thước ảnh quá lớn , maximun 800x1200 pixcel');
                            }
                        }
                         else alert('Dung lượng ảnh quá lớn');
                    }
                    else alert('Định dạng file ảnh không đúng');
                    
                    }
                    img.src = _URL.createObjectURL(input.files[0]);
                    
                    
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#upload__thumbnail').change(function(){
            readURL( this );
        });
        ///////// end ////////
    </script>
 @endsection
 @section('css')
 <style type="text/css">
    .img__upload {
        width: 100%;
        height: 140px;
        border: 1px dashed #555;
        background: url( {{url('img/icon/upload-logo.png')}} ) no-repeat center center;
        background-size:cover;
        cursor: pointer;
    }
    #preview__img{
        width: 100%;
        height: 140px;
    }
    #upload__thumbnail{display: none;}
 </style>
 @endsection