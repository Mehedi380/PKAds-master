@extends('layouts.app')
@section('content')

@if(Session::has('response'))
{{Session::get("response")}}
@endif
<div class="tile">
    <h4 class="tile-title">Create Schedules</h4>
    <form action="{{route('schedules.store')}}" method="POST">
        @csrf
        <div class="tile-body">
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Serial No.</label>
                    <input type="text" name="serial" id="serial" class="form-control" required
                        placeholder="Enter the serial">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Client</label>
                    <select class="form-control select2" name="client_id" id="client_id" required>
                        <option value="" selected disabled>Select Client</option>
                        @foreach($clients as $client)
                        <option value="{{$client->id}}">{{$client->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-sm-12">
                    <label class="control-label">Page No</label>
                    <input type="text" name="page_no" id="page_no" class="form-control" required
                        placeholder="Enter Page No">
                </div>
                <div class="col-md-4 col-sm-12">
                    <label class="control-label">Advt. Size</label>
                    <input type="text" name="advt_size" id="advt_size" class="form-control" required
                        placeholder="Enter Advt. Size">
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Amount</label>
                        <input type="text" name="amount" id="amount" class="form-control" required
                            placeholder="Enter Amount">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Mode</label>
                <div class="row">
                    <div class="col-md-4">
                        <div class="animated-radio-button">
                            <label>
                                <input type="radio" id="mode" name="mode" value="Color" checked>
                                <span class="label-text">Color</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="animated-radio-button">
                            <label>
                                <input type="radio" id="mode" name="mode" value="Black-White">
                                <span class="label-text">Black-White</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="animated-radio-button">
                                    <label>
                                        <input type="radio" id="type" name="type" value="New" checked>
                                        <span class="label-text">New</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="animated-radio-button">
                                    <label>
                                        <input type="radio" id="type" name="type" value="Old">
                                        <span class="label-text">Old</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Repeat From</label>
                        <input type="text" name="repeat_from" id="repeat_from" class="form-control date-picker" disabled
                            placeholder="Enter Repeat From">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="2"
                    placeholder="Enter Remarks"></textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="1" selected>
                        Active
                    </option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary mr-1" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>
                    Create
                </button>
                <a class="btn btn-secondary" href="{{ route('schedules.index') }}">
                    <i class="fa fa-fw fa-lg fa-times-circle"></i>
                    Cancel
                </a>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).on('change', "input[name='type']", function () {
        let schedule_type = $("input[name='type']:checked").val();
        let repeat_from = $('#repeat_from');
        if (schedule_type == 'Old') {
            repeat_from.prop('disabled', false);
        } else {
            repeat_from.val("");
            repeat_from.prop('disabled', true);
        }
    });

</script>
@endsection
