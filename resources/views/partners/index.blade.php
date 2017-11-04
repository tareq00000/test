@extends('master')
@section('content')
	<div class="well">
		<div class="row">
			<div class="col-md-6">
				<a href="{{route('partners.create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus-circle" aria-hidden="true"></i> New</a>
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
						@foreach($partners as $partner)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $partner->partner_name }}</td>
							<td>
								{!! Form::open(['route' => ['partners.destroy', $partner->id], 'method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
									<a href="{{route('partners.edit',$partner->id)}}" class="btn btn-xs btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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