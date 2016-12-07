@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Sample Form with Laravel Collective</div>
                <div class="panel-body">
					{!! Form::open(['role' => 'form', 'url' => 'foo/bar', 'class' => 'form-horizontal']) !!}
				        {{ Form::token() }}
				         @include('components.forms.text', ['name' => 'name'])
				         @include('components.forms.email', ['name' => 'email'])
				    {!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
