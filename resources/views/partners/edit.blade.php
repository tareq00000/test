@extends('master')
@section('content')
<div class="row center" style="margin-top: 15px;">
	<div class="col-md-6 col-md-offset-1">
		<div class="well">
			<h2>Edit Partner</h2>
			{!! Form::model($partner,['route' => ['partners.update',$partner->id],'method'=>'PUT']) !!}
			

				<div class="form-group">
					{{ Form::label('partner_name', 'Partner Name:') }}
					{{ Form::text('partner_name', null,['class'=>'form-control', 'placeholder'=>'Insert a partner name']) }}
				</div>

				<div class="form-group">
					{{ Form::submit('Save Changes',['class'=>'btn btn-success']) }}
					<a href="{{ route('partners.index') }}" class="btn btn-default">Cancel</a>
				</div>
		    
			{!! Form::close() !!}
		</div>
	</div>
</div>
	

@endsection