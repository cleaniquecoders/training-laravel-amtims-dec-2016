@extends('layouts.app')

@section('content')
	<div class="container well well-small">
		<h1>Hello <small>{{ $user->name }}</small></h1>
		<h2>Your email is <small>{{ $user->email }}</small></h2>
	</div>
@endsection
