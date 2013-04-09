@extends('layouts/subpage')

@section('content')

	<h1>Welcome College Ambassador {{ $user->name }}!</h1>
	<h3>Which school would you like to be an Ambassador for?</h3>

	{{ $errors->first('college', '<div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>Oh snap!</strong> You must select a college!
            </div>') }}

	{{ Form::open(array('url' => '/login', 'class' => '', 'id' => 'ambassador-form')) }}
		 <div class="control-group {{ $errors->first('college', 'error') }}">
				@if (isset($user_profile['education']) && !empty($user_profile['education']))
					@foreach ($user_profile['education'] as $education)
						@if ($education['type'] == 'College')
							
						<?php
							$school_name = $education['school']['name'];

							$school_year = '';
							if (isset($education['year']['name']) && !empty($education['year']['name'])) :
								$school_year = ', '.$education['year']['name'];
							endif;

							$study = '';
							if (isset($education['concentration']) && !empty($education['concentration'])) :
								$study = ', '.$education['concentration'][0]['name'];
							endif;
						?>
							<div class="controls">
								<label class="radio">{{ Form::radio('college', $school_name); }} {{ $school_name.$study.$school_year }}</label>
							</div>

						@endif
					@endforeach
				@endif
		 </div>
		 <button type="submit" class="btn">Begin Helping Students</button>
	{{ Form::close() }}

@stop