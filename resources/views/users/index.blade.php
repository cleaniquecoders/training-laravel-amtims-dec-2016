@extends('layouts.app')

@section('content')
	@include('components.list', [
		'route' => 'users',
		'resources' => $users,
		'headings' => [
			[
				'label' => 'Name',
				'attr' => 'name',
			],
			[
				'label' => 'E-mail',
				'attr' => 'email',
			],
		]
	])
@endsection
