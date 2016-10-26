@extends('backend.index')
@section('content')
   <div class="col-sm-12" style="margin:30px auto;">
        <h4>Chỉnh sửa bài viết</h4>
        
        {{-- end --}}
        <div class="col-xs-12" style="padding-bottom:120px">
            @if( count($errors) > 0)
            <div class="alert alert-danger">
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
            <form action="{!! route('post_post_edit',$post->id) !!}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-xs-9">
                    <div class="form-group">
                        <label>Title</label>
                        <input class="form-control" name="title" value=" {!! $post->title!!}" />
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea class="form-control" rows="3" name="_content"> {!! $post['content']  !!}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="cate_id">
                            @foreach($cates as $cate)
                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" name="_description">{!! $post->description !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Thumbnail</label>
                        <img class="form-control" src="{{ url('upload',$post['thumbnail'])}}" style="width:200px;height:100px;">
                    </div>
                    <div class="form-group">
                        <label>Chọn thumbnail khác</label>
                        <label for="upload__thumbnail" class="img__upload">
                            <input name="thumbnail" id="upload__thumbnail" type="file">
                            <img id="preview__img" style="max-width:100%;" src="" />
                        </label>
                    </div>
                    <div class="form-group">
                        <label>SEO Title</label>
                        <textarea class="form-control" rows="3" name="seo_title">{{ $post['seo_title']}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>SEO Description</label>
                        <textarea class="form-control" rows="3" name="seo_description">{{ $post['seo_description']}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>SEO Keywords</label>
                        <input class="form-control" name="seo_keywords" placeholder="Please Enter Category Keywords" value=" {!! $post['seo_keyword']  !!}" />
                    </div>
                    <div class="form-group">
                        <label>Tags</label>
                        <?php $pt = $post->post_tag; ?>
                        <select class="form-control" multiple="multiple" id="tags" name="tags[]">
                            @foreach($pt as $pt)
                                <option selected="" value="{{$pt->tag->id}}"> {{$pt->tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Struct Data</label>
                        <textarea class="form-control" rows="3" name="struct_data"> {!! $post['struct_data']   !!}</textarea>
                    </div>
{{--                     <div class="form-group">
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
    </div>
@endsection
@section('jquery')
    <script type='text/javascript'>CKEDITOR.replace('_content');</script>
    <script type="text/javascript">
    //ReadURL Upload Image
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview__img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#upload__thumbnail").change(function(){
        readURL(this);
    });
    </script>
@endsection
 @section('css')
 <style type="text/css">
    .img__upload{
        width: 100%;
        height: 140px;
        border: 2px solid #000;
        background: url({{url('img/icon/upload-logo.png')}}) no-repeat center center;
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