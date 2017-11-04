@extends('master')
@section('content')
<div class="row center" style="margin-top: 15px;">
	<div class="col-md-6 col-md-offset-1">
		<div class="well">
			<h2>Edit Category</h2>
			{!! Form::model($category,['route' => ['categories.update',$category->id],'method'=>'PUT']) !!}
			

				<div class="form-group">
					{{ Form::label('category_name', 'Category Name:') }}
					{{ Form::text('category_name', null,['class'=>'form-control', 'placeholder'=>'Insert a category name']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Save Changes',['class'=>'btn btn-success']) }}
					<a href="{{ route('categories.index') }}" class="btn btn-default">Cancel</a>
				</div>
		    
			{!! Form::close() !!}
		</div>
	</div>
</div>
	

@endsection