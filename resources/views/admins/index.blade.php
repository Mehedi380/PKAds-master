@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">All Admins</h4>
        <p><a class="btn btn-primary icon-btn" href="{{ route('admins.create') }}"><i class="fa fa-plus"></i>Add Admin
            </a></p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('First Name') }}</th>
                    <th>{{ _('Last Name') }}</th>
                    <th>{{ _('Email') }}</th>
                    <th>{{ _('Username') }}</th>
                    <th>{{ _('Role') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $index => $admin)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $admin->first_name }}</td>
                    <td>{{ $admin->last_name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->username }}</td>
                    <td>
                        @if($admin->role == 1)
                        {{ _('Admin') }}
                        @elseif($admin->role == 2)
                        {{ _('Operator') }}
                        @elseif($admin->role == 0)
                        {{ _('Inactive') }}
                        @else
                        {{ _('Unknown') }}
                        @endif
                    </td>
                    <td>{{date('d M, Y', strtotime($admin->created_at))}}</td>
                    <td>
                        <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary btn-sm mr-3">Edit</a>
                        <form action="{{ route('admins.destroy', $admin->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mr-3"
                                onclick="return(confirm('are you sure to delete?'))">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
