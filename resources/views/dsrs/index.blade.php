@extends('layouts.app')

@section('content')
<div class="tile">
    <div class="tile-title-w-btn">
        <h4 class="title">All DSRs</h4>
        <p>
            <a class="btn btn-primary icon-btn" href="{{ route('dsrs.create') }}">
                <i class="fa fa-plus"></i>
                Add DSR
            </a>
        </p>
    </div>
    <div class="tile-body">
        <table class="table table-hover table-bordered data-table">
            <thead>
                <tr>
                    <th class="d-none">{{ _('#') }}</th>
                    <th>{{ _('Serial') }}</th>
                    <th>{{ _('Release Order') }}</th>
                    <th>{{ _('Client') }}</th>
                    <th>{{ _('Page No') }}</th>
                    <th>{{ _('Advt Size') }}</th>
                    <th>{{ _('Mode') }}</th>
                    <th>{{ _('Bill No') }}</th>
                    <th>{{ _('Amount') }}</th>
                    <th>{{ _('MR. No') }}</th>
                    <th>{{ _('Publishing Date') }}</th>
                    <th>{{ _('Cheque No') }}</th>
                    <th>{{ _('Cheque Date') }}</th>
                    <th>{{ _('Agent') }}</th>
                    <th>{{ _('Remarks') }}</th>
                    <th>{{ _('Created At') }}</th>
                    <th>{{ _('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($dsrs) && count($dsrs))
                @foreach ($dsrs as $index => $dsr)
                <tr>
                    <td class="d-none">{{ $index }}</td>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->serial }}
                        @else
                        {{ _('Schedule not found') }}
                        @endif
                    </td>
                    <td>{{ $dsr->release_order }}</td>
                    <td>
                        @if($dsr->schedule_id && $dsr->schedule->client_id)
                        {{ $dsr->schedule->client->name }}
                        @else
                        {{ _('Client not found') }}
                        @endif
                    </td>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->page_no }}
                        @else
                        {{ _('Schedule not found') }}
                        @endif
                    </td>
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
                    <td>{{ $dsr->bill_no }}</td>
                    <td>
                        @if($dsr->schedule_id)
                        {{ $dsr->schedule->amount }}
                        @else
                        {{ _('Schedule not found') }}
                        @endif
                    </td>
                    <td>{{ $dsr->mr_no }}</td>
                    <td>{{ $dsr->publishing_date }}</td>
                    <td>{{ $dsr->cheque_no }}</td>
                    <td>{{ $dsr->cheque_date }}</td>
                    <td>
                        @if($dsr->schedule_id && $dsr->schedule->client_id && $dsr->schedule->client->agent_id)
                        {{ $dsr->schedule->client->agent->name }}
                        @else
                        {{ _('Agent not found') }}
                        @endif
                    </td>
                    <td>
                        @if($dsr->remarks)
                        {{ $dsr->remarks }}
                        @else
                        {{ _('N/A') }}
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
                            Edit
                        </a>
                        <form action="{{ route('dsrs.destroy', $dsr->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mr-3"
                                onclick="return(confirm('are you sure to delete?'))">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
