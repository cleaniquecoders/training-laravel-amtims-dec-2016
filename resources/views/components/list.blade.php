<div class="container">
	<a href="{{ route($route.'.create') }}" class="btn btn-success pull-right">New Record</a>
	{{ $resources->links() }}
	<table class="table table-condensed table-hover">
		<thead>
			<tr>
				@foreach($headings as $heading)
					<th>{{ $heading['label'] }}</th>
				@endforeach
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($resources as $resource)
				<tr>
					@foreach($headings as $heading)
						<td>{{ $resource->{$heading['attr']} }}</td>
					@endforeach
					<td>
						@include('components.actions', ['route' => $route, 'resource' => $resource])
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	{{ $resources->links() }}
</div>
