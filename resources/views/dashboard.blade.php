@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Agents</h4>
                <p><b>{{ $agents }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
                <h4>Clients</h4>
                <p><b>{{ $clients }}</b></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
                <h4>Schedules</h4>
                <p><b>{{ $schedules }}</b></p>
            </div>
        </div>
    </div>
</div>

<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">Recent Schedules</h4>
        <p>
            <a class="btn btn-primary icon-btn" href="{{ route('schedules.create') }}">
                <i class="fa fa-plus"></i>Add Schedule
            </a>
        </p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Serial') }}</th>
                    <th>{{ _('Client') }}</th>
                    <th>{{ _('Page No') }}</th>
                    <th>{{ _('Advt Size') }}</th>
                    <th>{{ _('Mode') }}</th>
                    <th>{{ _('Type') }}</th>
                    <th>{{ _('Repeat From') }}</th>
                    <th>{{ _('Amount') }}</th>
                    <th>{{ _('Remarks') }}</th>
                    <th>{{ _('Status') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recent_schedules as $index => $schedule)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $schedule->serial }}</td>
                    <td>
                        @if($schedule->client_id)
                        {{ $schedule->client->name }}
                        @else
                        {{ _('No client found') }}
                        @endif
                    </td>
                    <td>{{ $schedule->page_no }}</td>
                    <td>{{ $schedule->advt_size }}</td>
                    <td>{{ $schedule->mode }}</td>
                    <td>{{ $schedule->type }}</td>
                    <td>
                        @if($schedule->type == 'Old' && $schedule->repeat_from)
                        {{ $schedule->repeat_from }}
                        @else
                        {{ _('N/A') }}
                        @endif
                    </td>
                    <td>{{ $schedule->amount }}</td>
                    <td>
                        @if($schedule->remarks)
                        {{ $schedule->remarks }}
                        @else
                        {{ _('N/A') }}
                        @endif</td>
                    <td>
                        @if($schedule->status == 1)
                        {{ _('Active') }}
                        @elseif($schedule->status == 0)
                        {{ _('Inactive') }}
                        @else
                        {{ _('Unknown') }}
                        @endif
                    </td>
                    <td>{{date('d M, Y', strtotime($schedule->created_at))}}</td>
                    <td>
                        <a href="{{ route('schedules.edit', $schedule->id) }}"
                            class="btn btn-primary btn-sm mr-3">Edit</a>
                        <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST"
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
