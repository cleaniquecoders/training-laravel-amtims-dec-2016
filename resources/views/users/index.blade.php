@extends('layouts.app')

@section('content')
	<div class="container">
		<a href="{{ route('users.create') }}" class="btn btn-success pull-right">New User</a>
		{{ $users->links() }}
		<table class="table table-condensed table-hover">
			<thead>
				<tr>
					<th>Name</th>
					<th>E-mail</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('users.show', ['id' => $user->id]) }} " class="btn btn-default">Details</a>
								<a href="{{ route('users.edit', ['id' => $user->id]) }} " class="btn btn-primary">Edit</a>
								<a href="{{ route('users.destroy', ['id' => $user->id]) }} " class="btn btn-danger">Delete</a>
							</div>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		{{ $users->links() }}
	</div>
@endsection
