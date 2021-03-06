@extends('master')
@section('content')
<div class="row center" style="margin-top: 15px;">
	<div class="col-md-6 col-md-offset-1">
		<div class="well">
			<h2>Edit Category</h2>
			{!! Form::model($subCategory,['route' => ['sub-categories.update',$subCategory->id],'method'=>'PUT']) !!}
			

				<div class="form-group">
					{{ Form::label('category_id', 'Category:') }}
					<select name="category_id" class="form-control">
						<option value="">Select a category</option>
						@foreach($categories as $category)
						<option @if($subCategory->category_id == $category->id){{ 'selected' }} @endif value="{{ $category->id }}">{{ $category->category_name }}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					{{ Form::label('sub_cat_name', 'Sub-Category Name:') }}
					{{ Form::text('sub_cat_name', null,['class'=>'form-control', 'placeholder'=>'Insert a sub-category name']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Save',['class'=>'btn btn-success']) }}
					<a href="{{ route('sub-categories.index') }}" class="btn btn-default">Cancel</a>
				</div>
		    
		    
			{!! Form::close() !!}
		</div>
	</div>
</div>
	

@endsection