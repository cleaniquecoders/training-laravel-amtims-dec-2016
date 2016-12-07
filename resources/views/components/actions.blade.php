<div class="btn-group">
	<a href="{{ route($route.'.show', ['id' => $resource->id]) }}" class="btn btn-default">Details</a>

    @ability('superadministrator,administrator', '')
	<a href="{{ route($route.'.edit', ['id' => $resource->id]) }}" class="btn btn-primary">Edit</a>
    @endability

    @role('superadministrator')
    <a href="{{ route($route.'.destroy', ['id' => $resource->id]) }}"
    	class="btn btn-danger"
    	onclick="event.preventDefault();
    			if(confirm('{!! $confirm or 'Are you sure want to delete this record?' !!}')){document.getElementById('action-resource-form-{{ $resource->id }}').submit();}">
    	Delete
    </a>

    <form id="action-resource-form-{{ $resource->id }}"
    	action="{{ route($route.'.destroy', ['id' => $resource->id]) }}"
    	method="POST" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    @endrole
</div>
