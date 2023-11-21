@extends('layouts.app')
@section('content')
<div class="tile">
    <h4 class="tile-title">Create Agent</h4>
    <form action="{{route('agents.store')}}" method="POST">
        @csrf
        <div class="tile-body">
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" required
                        placeholder="Enter agent name">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" required
                        placeholder="Enter agent phone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Address</label>
                <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" required
                    placeholder="Enter agent address">
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
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>
                Create
            </button>
            <a class="btn btn-secondary" href="{{ route('agents.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
