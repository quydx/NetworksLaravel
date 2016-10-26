@extends('backend.index')
@section('content')
	<div class="col-md-12" style="margin:64px auto;">
	 	@if( Session::has('flash_message'))
			<div class="alert alert-success">
			    {!! Session::get('flash_message') !!}
			</div>
		@endif
		<h4>Thẻ tag</h4>
		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			<thead>
			    <tr align="center">
			        <th>STT</th>
					<th>Tag Name</th>
			        <th>Status</th>
			        <th>Tùy chọn</th>
			    </tr>
			</thead>
			<tbody>
			<?php $STT = 1; ?>
	        @foreach($tags as $tag )
	            <tr>
	            <td>{{ $STT }}			</td>
	            <td>{{ $tag->name }}		</td> 
	            <td>{{ $tag->status 	}}	</td>
	            <td>
	           	 	<button class="delete__tag-btn" data-id="{{$tag->id}}">
	           	 		<i class="fa fa-trash-o"></i>
	           	 	</button>
	            	<button class="edit__tag-btn" data-toggle="modal" data-name="{{ $tag->name }}" data-id="{{$tag->id}}" data-target="#edit__tag">
	            		<i class=" fa fa-pencil"></i> 
	            	</button>
	            	</td>
	            </tr>
	            <?php $STT++ ?>
	        @endforeach 
	        	 <tr>
	            	<td><i class="fa fa-plus"></i></td>
	            	<td><input type="text" name="tag_name" required=""></td>
	            	<td></td>
	            	<td><button class="add__tag-btn btn-sm btn-success" style="height:30px;"> Thêm</button></td>
	            </tr>         
            </tbody>
        </table>

        <div class="row">
            @if ($tags->count() > 0)
                <div class="col-sm-6 text-left text-center-xs">                
                    <ul class="pagination pagination-sm m-a-0">
                        <li><a href="{{ $tags->previousPageUrl() }}"><i class="fa fa-chevron-left"></i></a></li>
                        <li class="active"><a href="{{ $tags->currentPage() }} ">{{ $tags->currentPage() }}</a></li>
                        <li><a href="?page={{ $tags->currentPage() + 1 }}">{{ $tags->currentPage() + 1 }}</a></li>
                        <li><a href="?page={{ $tags->currentPage() + 2 }}">{{ $tags->currentPage() + 2 }}</a></li>
                        <li><a href="{{ $tags->nextPageUrl() }}"><i class="fa fa-chevron-right"></i></a></li>
                    </ul>
                </div>
            @endif
      </div>
    </div>


    <div class="modal fade" id="edit__tag" role="dialog">
	    <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title">Sửa thẻ tag</h4>
	        </div>
	        <div class="modal-body">
	        	<form action="" method="post">
	        		{{ csrf_field()}}
		            <div class="form-group">
		                <label>Tên tag</label>
		                <input class="form-control" name="tag" value="" required="" />
		            </div>
		            <input type="hidden" name="tag_id" value="">
		            <button type="submit" class="btn-sm btn-primary"> Xác nhận</button>
	            </form>
	        </div>     
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
	        </div>
	      </div>
	    </div>
    </div>
@endsection
@section('jquery')
	<script type="text/javascript">
		$(document).ready(function(){
			// ajax them
			$(document).on('click' , ".add__tag-btn",function(){
				var tag_name = $("input[name='tag_name']").val();
				$.ajax({
					url : "{{ url('admin/tags/add')}}" + '/'+ tag_name , 
					type: 'GET',
					cache: false ,
					data : {

					} ,
					success :function() {
						$('#dataTables-example tbody').load('? #dataTables-example tbody tr');
					}
				}).done(function(res){
					if( res == 'true') ;
					else if (res == 'false') alert('Tag này đã tồn tại');
				});
			});
			//
			// ajax xoa 
			$(document).on('click',".delete__tag-btn", function(){
				var tag__id = $(this).attr('data-id');
				$.ajax({
					url : "{{ url('admin/tags/delete')}}" + '/' +  tag__id,
					type: 'GET',
					cache: false ,
					data :{

					},
					success :function(){
						$('#dataTables-example tbody').load('#dataTables-example tbody tr');
					}
				});
			});
		});

		$('body').on('click', '.edit__tag-btn', function(){

			var name = $(this).data('name')
			,id   = $(this).data('id');

			$('input[name=tag]').val(name);
			$('input[name=tag_id]').val(id);


		});
	</script>
@endsection