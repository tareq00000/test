@extends('master')
@section('content')
	@if ($errors->any())
    <div class="alert alert-danger" style="margin-top: 50px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<div class="well">
		<div class="row">
			<div class="col-md-6">
				<a href="{{route('categories.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> New</a>
			</div>
			<div class="col-md-6"></div>
		</div>		
	</div>
	<div class="row">
		<div class="col-md-6 col-md-offset-1">
			<h2>Category List</h2>
			<div class="well">
				<table class="table table-responsive table-bordered">
					<thead>
						<tr>
							<th>#</th>
							<th>Category Name</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $i=0; ?>
						@foreach($categories as $category)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $category->category_name }}</td>
							<td>
								{!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
									<a href="{{route('categories.edit',$category->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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