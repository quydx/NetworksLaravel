@extends('backend.index')
@section('content')
	<div class="col-sm-12" style="margin:auto;">
	{{-- thông báo lỗi --}}
 	@if( Session::has('flash_message'))
		<div class="alert alert-success">
		    {!! Session::get('flash_message') !!}
		</div>
	@endif
	{{-- end --}}
	<div id="notification" class="alert" style="display:none;"></div>
	{{-- banner --}}
	<div class="col-lg-12">
		<h5 class="page-header">Danh sách
		</h5>
	</div>
	{{-- end --}}
	<!-- content -->
		<table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr align="center">
			        <th>STT</th>
			        <th>Tên</th>
			        <th>Chủ đề cha</th>
			        <th>Trạng thái</th>
			        <th>Tùy chọn</th>
			    </tr>
			</thead>
			<tbody>
			<?php $STT = 1; ?>
	        @foreach($cates as $cate )
	            <tr>
		            <td> {{ $STT }}</td>
		            <td>{!! $cate["name"]	!!}</td>
		            <?php $cateParentName = App\Category::find($cate->parent_id) ;?>
		            <td> {{ $cateParentName ? $cateParentName->name : "Không có" }}</td>
		            <td>{!! $cate["status"]!!}</td>
		            <td>
		            	<button class="ajax-xoa" action="{{ route('cate_delete',['id'=>$cate->id])}}"><i class="fa fa-trash-o"></i></button>
		            	<button class="edit_cate" data-toggle="modal" data-name="{{ $cate->name }}" data-id="{{$cate->id}}" data-target="#myModal"><i class="fa fa-pencil"></i></button>
					 </td>
	            </tr>
	            <?php $STT ++  ?>
	        @endforeach    
	        <tr>
	        	<td><i class="fa fa-plus"></i></td>
	        	<td><input class="form-control" name="cate_name" placeholder="Please Enter Category Name" /></td>
	        	<td>
	        		<select>
	        			@foreach(App\Category::all() as $cate)
	        				<option name="parent_id" value="{{$cate->id}}">{{$cate->name}}</option>
	        			@endforeach
	        		</select>
	        	</td>
	        	<td>Auto public</td>
	        	<td><button id="cate_add" class="btn-sm btn-success">Thêm mới</button></td>
	        </tr>      
            </tbody>
        </table>
        <div class="col-sm-6 col-xs-12" id="edit_box">
        </div>
	<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
        	<form action="" method="post">
        		{{ csrf_field()}}
	            <div class="form-group">
	                <label>Tên Cate</label>
	                <input class="form-control" name="name" value="" required="" />
	            </div>
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
			//
			$('body').on('click', '.edit_cate', function(){

			var name = $(this).data('name')
			,id   = $(this).data('id');

			$('input[name=name]').val(name);
			$('form').attr('action', "{{ url('admin/categories/edit')}}" + '/' +id );


		});
			// ajax them
			$(document).on('click', "#cate_add", function(){
				var cate_name = $("input[name='cate_name']").val();
				var parent_id = $("option[name='parent_id']").val();
				$.ajax({
					url : "{{ url('admin/categories/add') }}"+ '/'+ cate_name + '/' + parent_id , 
					type: 'GET',
					cache: false ,
					data : {

					},
					success: function(){
						$('#example1 tbody').load('#example1 tbody tr');
					}
				}).done(function(responseData){
					if ( responseData == 'false') {
						$('#notification').removeClass('alert-success');
						$('#notification').html('Tag đã tồn tại');
						$('#notification').addClass('alert-danger');
						$('#notification').css('display' , 'block').delay(4000).fadeOut();
					}
					else{
						$('#notification').removeClass('alert-danger');
						$('#notification').html('Thêm thành công');
						$('#notification').addClass('alert-success');
						$('#notification').css('display' , 'block').delay(4000).fadeOut();
						 
					}
				});
			});
			// ajax load edit
			// $(".edit_cate").click(function(){
			// 	var id_cate = $(this).attr('value');
			// 	// alert(id_cate);
			// 	$.get( " url('categories/get-edit') "+ '/' + id_cate ,function(data ){
			// 		// $('#edit_box').html(data);
			// 	});
			// });
			// ajax xoa 
			$('body').on('click',".ajax-xoa", function(){
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

		});


	</script>
@endsection
