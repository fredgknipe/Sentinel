@extends(Config::get('Sentinel::views.layout'))

{{-- Web site Title --}}
@section('title')
@parent
Edit Group
@stop

{{-- Content --}}
@section('content')

<form method="POST" action="{{ route('sentinel.groups.update', $group->id) }}" accept-charset="UTF-8">

    <h2>Edit Group</h2>
    
    <p>
        <input class="form-control" placeholder="Name" name="name" value="Tester1" type="text">
        {{ ($errors->has('name') ? $errors->first('name') : '') }}
    </p>

    <?php $defaultPermissions = Config::get('Sentinel::auth.default_permissions', []); ?>
    
    <p>
        <ul>
            @foreach()
                <li> 
                    <input name="permissions[{{ $permission }}]" value="1" type="checkbox" {{ (isset($permissions[$permission]) ? 'checked' : '') }}>
                    {{ ucwords($permission) }}
                </li>
            @endforeach
        </ul>
    </p>

    <input name="id" value="{{ $group->id }}" type="hidden">
    <input name="_method" value="PUT" type="hidden">
    <input name="_token" value="{{ csrf_token() }}" type="hidden">
    <input value="Save Changes" type="submit">

</form>
   
@stop