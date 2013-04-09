@extends('layouts/subpage')

@section('content')
    

	<h1>Welcome Ambassador {{ $user->name }}!</h1>
	
	@if (isset($user_profile['education']) && !empty($user_profile['education']))
		@foreach ($user_profile['education'] as $education)
			@if ($education['type'] == 'College')
				
				


				<h2>From {{ $education['school']['name'] }},  {{ $education['year']['name'] }}</h2>



			@endif
		@endforeach
	@endif


	<pre>
	<?php print_r($user_profile); ?>
	</pre>

	{{ $errors->first('first_name', '<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button><strong>Oh snap!</strong> :message</div>') }}
	


	{{ Form::open(array('url' => '/login', 'class' => '', 'id' => 'ambassador-form')) }}
		
		 <div class="control-group {{ $errors->first('first_name', 'error') }}">
			<label class="control-label" for="first_name">First Name</label>
			 <div class="controls">
			{{
				Form::text(
					'first_name',
					Input::old('first_name'),
					array(
						'placeholder' => 'First Name',
						'class' => $errors->first('first_name', 'error'),
						'id' => 'first_name'
					)
				) }}
			</div>
		 </div>
		

		{{ Form::submit('Submit') }}
	

	{{ Form::close() }}


@stop
