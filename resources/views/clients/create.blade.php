@extends('layouts.app')

@section('content')
<div class="tile">
    <h4 class="tile-title">Create Client</h4>
    <form action="{{route('clients.store')}}" method="POST">
        @csrf
        <div class="tile-body">
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" required placeholder=" Enter client name">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Phone</label>
                    <input type="text" name="phone" required id="phone"
                        class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                        placeholder="Enter client phone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" placeholder="Enter client email">
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label for="status">Category</label>
                    <select name="category" id="category" class="form-control" required>
                        <option value="" selected disabled>Select Category</option>
                        <option value="1" @if(old('category'))=='1' ) {{ 'selected' }} @endif>Govt</option>
                        <option value="2" @if(old('category'))=='2' ) {{ 'selected' }} @endif>Non-Govt</option>
                        <option value="3" @if(old('category'))=='3' ) {{ 'selected' }} @endif>Circulation</option>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="status">Agent</label>
                    <select name="agent_id" id="agent_id" class="form-control select2" required>
                        <option value="" selected disabled>Select Agent</option>
                        @foreach($agents as $agent)
                        <option value="{{$agent->id}}" @if(old('agent_id'))=='1' ) {{ 'selected' }} @endif>
                            {{$agent->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Address</label>
                <input type="text" name="address" id="address"
                    class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                    placeholder="Enter client address">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="status" id="status" required>
                    <option value="1" selected @if(old('status'))=='1' ) {{ 'selected' }} @endif>Active</option>
                    <option value="0" @if(old('status'))=='0' ) {{ 'selected' }} @endif>Inactive</option>
                </select>
            </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Create
            </button>
            <a class="btn btn-secondary" href="{{ route('clients.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
