@extends('layouts.app')

@section('content')
<div class="tile">
    <h4 class="tile-title">Edit DSR</h4>
    <form action="{{route('dsrs.update', $dsr->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="tile-body">
            <div class="form-group">
                <label class="control-label">Schedule</label>
                <select class="form-control @error('schedule_id') is-invalid @enderror select2" name="schedule_id"
                    id="schedule_id" required>
                    <option value selected disabled>Select a Schedule</option>
                    @foreach($schedules as $schedule)
                    <option value="{{$schedule->id}}" @if($schedule->id == $dsr->schedule_id) {{ 'selected' }} @endif>
                        {{ $schedule->serial }} @if($dsr->schedule_id) {{ ' - (Client: ' . $schedule->client->name }}
                        @endif {{ ', Page No:' .
                            $schedule->page_no . ', Adv Size:' . $schedule->advt_size . ', Mode:' . $schedule->mode . ')'
                            }}
                    </option>
                    @endforeach
                </select>
                @error('schedule_id')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Release Order</label>
                        <input type="text" name="release_order" id="release_order" value="{{ $dsr->release_order }}"
                            class="form-control @error('release_order') is-invalid @enderror" required
                            placeholder="Enter Release Order">
                        @error('release_order')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Bill No</label>
                        <label class="control-label">Publishing Date</label>
                        <input type="text" name="publishing_date" id="publishing_date" value="{{ $dsr->publishing_date }}" class="form-control @error('publishing_date') is-invalid @enderror date-picker"
                            required placeholder="Enter Publishing Date">
                        @error('publishing_date')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label">MR No</label>
                            <input type="text" name="mr_no" id="mr_no" value="{{ $dsr->mr_no }}"
                                class="form-control @error('mr_no') is-invalid @enderror" required
                                placeholder="Enter MR No">
                            @error('mr_no')
                            <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Cheque No</label>
                        <input type="text" name="cheque_no" id="cheque_no" value="{{ $dsr->cheque_no }}"
                            class="form-control @error('cheque_no') is-invalid @enderror" required
                            placeholder="Enter Cheque No">
                        @error('cheque_no')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label class="control-label">Cheque Date</label>
                            <input type="text" name="cheque_date" id="cheque_date" value="{{ $dsr->cheque_date }}"
                                class="form-control @error('cheque_date') is-invalid @enderror date-picker" required
                                placeholder="Enter Cheque Date">
                            @error('cheque_date')
                            <div class="form-control-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control @error('remarks') is-invalid @enderror" id="remarks" name="remarks"
                    rows="2" placeholder="Enter Remarks">{{ $dsr->remarks }}</textarea>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary mr-1" type="submit">
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>
                    Save
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
