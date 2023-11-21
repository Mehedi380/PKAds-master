@extends('layouts.app')
@section('content')

@if(Session::has('response'))
{{Session::get("response")}}
@endif
<div class="tile">
    <h4 class="tile-title">Create DSRs</h4>
    <form action="{{route('dsrs.store')}}" method="POST">
        @csrf
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label">Schedule</label>
                <select class="form-control select2" name="schedule_id" id="schedule_id" required>
                    <option value selected disabled>Select a Schedule</option>
                    @foreach($schedules as $schedule)
                    <option value="{{$schedule->id}}">
                        {{ $schedule->serial . ' - (Client: ' . $schedule->client->name . ', Page No:' .
                        $schedule->page_no . ', Adv Size:' . $schedule->advt_size . ', Mode:' . $schedule->mode . ')'
                        }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Release Order</label>
                        <input type="text" name="release_order" id="release_order" class="form-control" required
                            placeholder="Enter Release Order">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Publishing Date</label>
                        <input type="text" name="publishing_date" id="publishing_date" class="form-control date-picker"
                            required placeholder="Enter Publishing Date">
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label">MR No</label>
                            <input type="text" name="mr_no" id="mr_no" class="form-control" required
                                placeholder="Enter MR No">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Cheque No</label>
                        <input type="text" name="cheque_no" id="cheque_no" class="form-control" required
                            placeholder="Enter Cheque No">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label">Cheque Date</label>
                            <input type="text" name="cheque_date" id="cheque_date" class="form-control date-picker"
                                required placeholder="Enter Cheque Date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="2"
                    placeholder="Enter Remarks"></textarea>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary mr-1" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>
                    Create
                </button>
                <a class="btn btn-secondary" href="{{ route('dsrs.index') }}">
                    <i class="fa fa-fw fa-lg fa-times-circle"></i>
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
@endsection
