@extends('app')

@section('title', 'View All Users')

@section('content')
    <h1>View All Users</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('info'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('info') }}
        </div>
    @endif

    <table class="table table-hover table-bordered table-responsive">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th></th>
            @role('super.admin')
                <th></th>
                <th style="text-align: center;"><a href="{{ route('user.create') }}" title="Create New User"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
            @endrole
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @for ($i = 0; $i < count($user->roles); $i++)
                        {{ $user->roles[$i]->name }}
                        @if ($i < (count($user->roles) - 1))
                            |
                        @endif
                    @endfor
                </td>
                <td style="text-align: center;"><a href="{{ route('user.show', $user->id) }}" title="View User Details"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></td>
                @role('super.admin')
                    <td style="text-align: center;"><a href="{{ route('user.edit', $user->id) }}" title="Edit User Details"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                    <td style="text-align: center;"><a href="{{ route('user.delete', $user->id) }}" title="Delete User"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                @endrole
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection