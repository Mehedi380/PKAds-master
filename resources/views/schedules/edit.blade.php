@extends('layouts.app')

@section('content')
<div class="tile">
    <h4 class="tile-title">Edit Schedules</h4>
    <form action="{{route('schedules.update', $schedule->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="tile-body">
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Serial No.</label>
                    <input type="text" name="serial" id="serial" value="{{ $schedule->serial }}"
                        class="form-control @error('serial') is-invalid @enderror" required
                        placeholder="Enter the serial">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Client</label>
                    <select class="form-control @error('client_id') is-invalid @enderror select2" name="client_id"
                        id="client_id" required>
                        <option value="" selected disabled>Select Client</option>
                        @foreach($clients as $client)
                        <option value="{{$client->id}}" @if($schedule->client_id == $client->id) {{ 'selected' }}
                            @endif>{{$client->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-sm-12">
                    <label class="control-label">Page No</label>
                    <input type="text" name="page_no" id="page_no" value="{{ $schedule->page_no }}"
                        class="form-control @error('page_no') is-invalid @enderror" required
                        placeholder="Enter Page No">
                </div>
                <div class="col-md-4 col-sm-12">
                    <label class="control-label">Advt. Size</label>
                    <input type="text" name="advt_size" id="advt_size" value="{{ $schedule->advt_size }}"
                        class="form-control @error('advt_size') is-invalid @enderror" required
                        placeholder="Enter Advt. Size">
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Amount</label>
                        <input type="text" name="amount" id="amount" value="{{ $schedule->amount }}"
                            class="form-control @error('amount') is-invalid @enderror" required
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
                                <input type="radio" id="mode" name="mode" value="Color" @if($schedule->mode == 'Color')
                                {{ 'checked' }}@endif>
                                <span class="label-text">Color</span>
                            </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="animated-radio-button">
                            <label>
                                <input type="radio" id="mode" name="mode" value="Black-White" @if($schedule->mode ==
                                'Black-White') {{ 'checked' }}@endif>
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
                                        <input type="radio" id="type" name="type" value="New" @if($schedule->type ==
                                        'New') {{ 'checked' }}@endif>
                                        <span class="label-text">New</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="animated-radio-button">
                                    <label>
                                        <input type="radio" id="type" name="type" value="Old" @if($schedule->type ==
                                        'Old') {{ 'checked' }}@endif>
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
                        <input type="text" name="repeat_from" id="repeat_from" value="{{ $schedule->repeat_from }}"
                            class="form-control @error('repeat_from') is-invalid @enderror date-picker"
                            @if($schedule->type == 'New') {{ 'disabled' }}@endif
                        placeholder="Enter Repeat From">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks"
                    rows="2" placeholder="Enter Remarks">{{ $schedule->remarks }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" required>
                    <option value="1" selected>
                        Active
                    </option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary mr-1" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>
                    Save
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
