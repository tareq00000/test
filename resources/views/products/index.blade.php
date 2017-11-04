@extends('master')
@section('content')	
	<div class="well">
		<div class="row">
			<div class="col-md-6">
				<a href="{{route('products.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> New</a>
			</div>
			<div class="col-md-6">
				<div class="dropdown pull-right">
					<form action="status" method="" id="statusForm">
						<select name="status" id="status">
							<option value="">All</option>
							<option @if(isset($_GET['status'])&& $_GET['status']=="0"){{"selected"}}@endif value="0">Unpublished</option>
							<option @if(isset($_GET['status'])&& $_GET['status']=="1"){{"selected"}}@endif value="1">Published</option>							
						</select>
					</form>
				</div>
			</div>
		</div>		
	</div>
	<div class="row">
		<div class="col-md-12">
			<h2>Product List</h2>
			<div class="well">
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Title</th>
							<th>Category</th>
							<th>Partner</th>
							<th>Price</th>
							<th>Discount</th>
							<th>status</th>
							<th>Featured</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($products as $product)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $product->title }}</td>
							<td>{{ $product->category->category_name }}</td>
							<td>{{ $product->partner->partner_name }}</td>
							<td>{{ $product->price }}</td>
							<td>{{ $product->discount }}</td>
							<td>
								@if($product->published==1)
								<i class="fa fa-check btn btn-xs btn-success" aria-hidden="true"></i>
								@else
								<i class="fa fa-times btn btn-xs btn-danger" aria-hidden="true"></i>
								@endif
							</td>
							<td>
								@if($product->featured==1)
								<i class="fa fa-check btn btn-xs btn-success" aria-hidden="true"></i>
								@else
								<i class="fa fa-times btn btn-xs btn-danger" aria-hidden="true"></i>
								@endif
							</td>
							<td>
								{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
									<a href="{{route('products.edit',$product->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
									{!! Form::submit("Delete", ['class' => 'btn btn-danger btn-xs pull-right']) !!}
								{!! Form::close() !!}
								
							</td>							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection