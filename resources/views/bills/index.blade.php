@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">All Bills</h4>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Bill No') }}</th>
                    <th>{{ _('Client') }}</th>
                    <th>{{ _('Publishing Date') }}</th>
                    <th>{{ _('Advt Size') }}</th>
                    <th>{{ _('Mode') }}</th>
                    <th>{{ _('Amount') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($dsrs) && count($dsrs))
                @foreach ($dsrs as $index => $dsr)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>{{ $dsr->bill_no }}</td>
                    <td>
                        @if($dsr->schedule_id && $dsr->schedule->client_id)
                        {{ $dsr->schedule->client->name }}
                        @else
                        {{ _('Client not found') }}
                        @endif
                    </td>
                    <td>{{ $dsr->publishing_date }}</td>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->advt_size }}
                        @else
                        {{ _('Schedule not found') }}
                        @endif
                    </td>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->mode }}
                        @else
                        {{ _('Schedule not found') }}
                        @endif
                    </td>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->amount }}
                        @else
                        {{ _('Schedule not found') }}
                        @endif
                    </td>
                    <td>
                        {{date('d M, Y', strtotime($dsr->created_at))}}
                    </td>
                    <td>
                        <a href="{{ route('bills.print', $dsr->id) }}" class="btn btn-primary btn-sm mr-3">
                            Invoice
                        </a>
                        <a href="{{ route('dsrs.edit', $dsr->id) }}" class="btn btn-primary btn-sm mr-3">
                            Edit DSR
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
