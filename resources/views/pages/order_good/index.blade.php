<div>
    @foreach($servers as $server)
        <td>{{ $server->id }}</td>
        <td>
            <a href="{{ route('servers.show', $server) }}" class="btn btn-sm btn-primary">{{ $server->name }}</a>
        </td>
        <td>{{ $server->ip }}</td>
    @endforeach
</div>
