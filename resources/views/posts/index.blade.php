@extends('layouts.app')

@section('content')
	@include('components.list', [
		'route' => 'posts',
		'resources' => $posts,
		'headings' => [
			[
				'label' => 'Post',
				'attr' => 'post',
			],
			[
				'label' => 'Created At',
				'attr' => 'created_at',
			],
			[
				'label' => 'Updated At',
				'attr' => 'updated_at',
			],
		]
	])
@endsection
