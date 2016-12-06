@extends('layouts.app')

@section('content')
    <div class="container well well-small">
        <p>{{ $post->post }}</p>
        <p class="label label-success">Created on {{ $post->created_at->diffForHumans() }}</p>
        <p class="label label-primary">Updated on {{ $post->updated_at->diffForHumans() }}</p>
        <hr>
		<p>
        	<a href="{{ route('posts.index') }}" class="btn btn-primary pull-right">Back</a>
        </p>
    </div>
@endsection
