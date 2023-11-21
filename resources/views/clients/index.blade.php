@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">All Clients</h4>
        <p><a class="btn btn-primary icon-btn" href="{{ route('clients.create') }}"><i class="fa fa-plus"></i>Add Client
            </a></p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Name') }}</th>
                    <th>{{ _('Phone') }}</th>
                    <th>{{ _('Email') }}</th>
                    <th>{{ _('Category') }}</th>
                    <th>{{ _('Agent') }}</th>
                    <th>{{ _('Address') }}</th>
                    <th>{{ _('Status') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $index => $client)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->category }}</td>
                    <td>
                        @if($client->agent_id)
                        {{ $client->agent->name }}
                        @else
                        {{ _('No agent found') }}
                        @endif
                    </td>
                    <td>{{ $client->address }}</td>
                    <td>
                        @if($client->status == 1)
                        {{ _('Active') }}
                        @elseif($client->status == 0)
                        {{ _('Inactive') }}
                        @else
                        {{ _('Unknown') }}
                        @endif
                    </td>
                    <td>{{date('d M, Y', strtotime($client->created_at))}}</td>
                    <td>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-primary btn-sm mr-3">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
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
