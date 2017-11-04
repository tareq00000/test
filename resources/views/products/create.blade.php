@extends('master')
@section('content')
<div class="row center" style="margin-top: 15px;">
	<div class="col-md-12">	
		<div class="well">
			<h2>Add New Product</h2>
			{!! Form::open(['route' => 'products.store','files' => true,'class'=>'form-horizontal']) !!}

				<div class="row">
					<div class="col-md-5">
						<div class="form-group">
							{{ Form::label('title', 'Title:',['class'=>'col-sm-3 text-right']) }}
							<div class="col-sm-9"> 
								{{ Form::text('title', NULL,['class'=>'form-control', 'placeholder'=>'Insert Product Title...']) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('category_id', 'Category:',['class'=>'col-sm-3 text-right']) }}
							<div class="col-sm-9"> 
								<select name="category_id" class="form-control">
									<option value="">Select a category</option>
									@foreach($categories as $category)
									<option value="{{ $category->id }}">{{ $category->category_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('partner_id', 'Partner:',['class'=>'col-sm-3 text-right']) }}
							<div class="col-sm-9"> 
								<select name="partner_id" class="form-control">
									<option value="">Select a partner</option>
									@foreach($partners as $partner)
									<option value="{{ $partner->id }}">{{ $partner->partner_name }}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Description:',['class'=>'col-sm-3 text-right']) }}
							<div class="col-sm-9"> 
								{{ Form::textarea('description', NULL,['class'=>'form-control', 'placeholder'=>'Product Description']) }}
							</div>
						</div>
						
					</div>
					<div class="col-md-4">
						
						<div class="form-group">
							{{ Form::label('published', 'Published:',['class'=>'col-sm-3']) }}
							<div class="col-sm-3">
								{{ Form::radio('published', '1', true) }} <label>  Yes</label> 
							</div>
							<div class="col-sm-3">
								{{ Form::radio('published', '0') }} <label>  No</label> 
							</div>

						</div>
						<div class="form-group">
							{{ Form::label('price', 'Price:',['class'=>'col-sm-3 text-right']) }}
							<div class="col-sm-9">
								{{ Form::text('price', NULL,['class'=>'form-control']) }}
							</div>							
						</div>
						<div class="form-group">
							{{ Form::label('file', 'File:',['class'=>'col-sm-3 text-right']) }}
							<div class="col-sm-9"> 
								{{ Form::file('file', NULL) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('image', 'Thumbnail:',['class'=>'col-sm-3 text-right']) }}
							<div class="col-sm-9"> 
								{{ Form::file('image', NULL) }}
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							{{ Form::label('featured', 'Featured:',['class'=>'col-sm-4']) }}
							<div class="col-sm-4">
								{{ Form::radio('featured', '1', true) }} <label>  Yes</label> 
							</div>
							<div class="col-sm-4">
								{{ Form::radio('featured', '0') }} <label>  No</label> 
							</div>

						</div>
						<div class="form-group">
							{{ Form::label('discount', 'Discount(%):',['class'=>'col-sm-5 text-right']) }}
							<div class="col-sm-7">
								{{ Form::text('discount', NULL,['class'=>'form-control']) }}
							</div>							
						</div>
						
					</div>
					<div class="col-sm-7">
						<div class="row">
							<div class="col-sm-8 text-center" style="margin-top: 50px;">
								<div class="form-group">
									{!! Form::button('<i class="fa fa-check-circle-o" aria-hidden="true"></i> Save',['type'=>'submit', 'class'=>'btn btn-primary']) !!}
									<a href="{{ route('products.index') }}" class="btn btn-danger"><i class="fa fa-repeat" aria-hidden="true"></i> Cancel</a>
								</div>
							</div>
							<div class="col-sm-4">
								<img src="{{asset('images/default.jpg')}}" class="pull-right" id="showimage" width="200" height="200" style="border: 1px solid #ddd;" onerror="this.src="{{asset('images/default.jpg')}}">
							</div>
						</div>						
						
					</div>
				</div>			
		    
			{!! Form::close() !!}
		</div>
	</div>
</div>
	

@endsection