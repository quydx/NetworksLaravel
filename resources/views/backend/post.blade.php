@extends('backend.index')
@section('content')
	   <section class="content">
      <div class="row">
        <div class="col-xs-12">
       
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of posts </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Title</th>
                  <th>Cate</th>
                  <th>Thumbnail</th>
                  <th>Created at</th>
                  <th>Description</th>
                  <th>Options</th>
                </tr>
                </thead>
                <tbody>
                  <?php $i =0; ?>
                  @foreach($posts as $post)
                    <?php $i++; ?>
                    <tr>
                      <td>{{$i}}</td>
                      <td>{{$post->title}}</td>
                      <td>{{ $post->category->name}}</td>
                      <td><a href="" data-toggle="modal" data-target="#myModal"><img src="{{ url('upload/'.$post->thumbnail)}}" style="width:160px;height:70px;"></a></td>
                      <td>{{$post->created_at}}</td>
                      <td>{{$post->description}}</td>
                      <td>
                        <a class="ajax-xoa" action={{ route('post_get_delete', ['id'=>$post->id])}} onclick="confirm_delete()" href=""><button><i class="fa-post fa fa-trash-o"></i></button></a>
                        <a href="{!! URL::route('post_get_edit',$post['id']) !!}"><button><i class="fa-post fa fa-pencil"></i></button></a>
                    </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thumbnail</h4>
        </div>
        <div class="modal-body">
            <img src="{{url('upload',$post->thumbnail)}}" style="width:100%;height:300px;">  
        </div>     
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
</div>
    </section>
@endsection
@section('jquery')
    <script type="text/javascript">
        $('body').on('click',".ajax-xoa", function( e ){
            e.preventDefault();
            var _url = $(this).attr('action');
            $.ajax({
                url : _url ,
                type: 'GET',
                cache: false ,
                data :{},
                success :function(){
                    $('#example1 tbody').load('#example1 tbody tr');
                }
            });
        });
    </script>
@endsection