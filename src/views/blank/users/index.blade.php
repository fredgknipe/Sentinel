@extends(Config::get('Sentinel::views.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Current Users
@stop

{{-- Content --}}
@section('content')
<h1>Current Users</h1>

<a class='btn btn-primary' href="{{ route('sentinel.users.create') }}">Create User</a>

<table class="sentinel-table">
	<thead>
		<th>User</th>
		<th>Status</th>
		<th>Options</th>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>
					<a href="{{ route('sentinel.users.show', array($user->id)) }}">{{ $user->email }}</a>
				</td>
				<td>
					{{ $user->status }} 
				</td>
				<td>
					<button type="button" onClick="location.href='{{ route('sentinel.users.edit', array($user->id)) }}'">Edit</button>
					@if ($user->status != 'Suspended')
						<button type="button" onClick="location.href='{{ route('sentinel.users.suspend', array($user->id)) }}'">Suspend</button>
					@else
						<button type="button" onClick="location.href='{{ route('sentinel.users.unsuspend', array($user->id)) }}'">Un-Suspend</button>
					@endif
					@if ($user->status != 'Banned')
						<button type="button" onClick="location.href='{{ route('sentinel.users.ban', array($user->id)) }}'">Ban</button>
					@else
						<button type="button" onClick="location.href='{{ route('sentinel.users.unban', array($user->id)) }}'">Un-Ban</button>
					@endif
					<button class="action_confirm" href="{{ route('sentinel.users.destroy', array($user->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
