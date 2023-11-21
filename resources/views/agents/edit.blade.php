@extends('layouts.app')

@section('content')
<div class="tile">
    <h4 class="tile-title">Edit Agent</h4>
    <form action="{{route('agents.update', $agent->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="tile-body">
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Name</label>
                    <input type="text" name="name" id="name" value="{{ $agent->name }}" class="form-control" required
                        placeholder="Enter agent name">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ $agent->phone }}" class="form-control" required
                        placeholder="Enter agent phone">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label">Address</label>
                <input type="text" name="address" id="address" value="{{ $agent->address }}" class="form-control"
                    placeholder="Enter agent address">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="1" @if($agent->status == 1) {{ 'selected' }} @endif>Active</option>
                    <option value="0" @if($agent->status == 0) {{ 'selected' }} @endif>Inactive</option>
                </select>
            </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
            </button>
            <a class="btn btn-secondary" href="{{ route('agents.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
