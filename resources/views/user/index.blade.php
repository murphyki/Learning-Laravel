@extends('app')

@section('title', 'View All Users')

@section('content')
    <h1>View All Users</h1>

    @include('errors.errors')
    @include('flash')

    <table class="table table-hover table-bordered table-responsive">
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th></th>
            @role('super.admin')
                <th></th>
                <th style="text-align: center;"><a href="{{ route('users.create') }}" title="Create New User"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a></th>
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
                <td style="text-align: center;"><a href="{{ route('users.show', $user->id) }}" title="View User Details"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></a></td>
                @role('super.admin')
                    <td style="text-align: center;"><a href="{{ route('users.edit', $user->id) }}" title="Edit User Details"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                    <td style="text-align: center;"><a href="{{ route('users.delete', $user->id) }}" title="Delete User"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                @endrole
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection