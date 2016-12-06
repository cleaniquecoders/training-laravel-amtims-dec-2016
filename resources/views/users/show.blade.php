@extends('layouts.app')

@section('content')
    <div class="container well well-small">
        Hi {{ $user->name }}, your email is {{ $user->email }}.
    </div>
@endsection
