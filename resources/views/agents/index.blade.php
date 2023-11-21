@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">All Agents</h4>
        <p><a class="btn btn-primary icon-btn" href="{{ route('agents.create') }}"><i class="fa fa-plus"></i>Add Agent
            </a></p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Name') }}</th>
                    <th>{{ _('Address') }}</th>
                    <th>{{ _('Phone') }}</th>
                    <th>{{ _('Status') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agents as $index => $agent)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $agent->name }}</td>
                    <td>{{ $agent->address }}</td>
                    <td>{{ $agent->phone }}</td>
                    <td>
                        @if($agent->status == 1)
                        {{ _('Active') }}
                        @elseif($agent->status == 0)
                        {{ _('Inactive') }}
                        @else
                        {{ _('Unknown') }}
                        @endif
                    </td>
                    <td>{{date('d M, Y', strtotime($agent->created_at))}}</td>
                    <td>
                        <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-primary btn-sm mr-3">Edit</a>
                        <form action="{{ route('agents.destroy', $agent->id) }}" method="POST"
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
