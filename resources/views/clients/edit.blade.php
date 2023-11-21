@extends('layouts.app')

@section('content')
<div class="tile">
    <h4 class="tile-title">Edit Client</h4>
    <form action="{{route('clients.update', $client->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="tile-body">
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Name</label>
                    <input type="text" name="name" id="name" value="{{ $client->name }}"
                        class="form-control @error('name') is-invalid @enderror" required
                        placeholder="Enter client name">
                </div>
                <div class="col-md-6 col-sm-12">
                    <label class="control-label">Phone</label>
                    <input type="text" name="phone" id="phone" value="{{ $client->phone }}"
                        class="form-control @error('phone') is-invalid @enderror" required
                        placeholder="Enter client phone">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input type="text" name="email" id="email" value="{{ $client->email }}"
                    class="form-control @error('email') is-invalid @enderror" placeholder="Enter client email">
            </div>
            <div class="form-group row">
                <div class="col-md-6 col-sm-12">
                    <label for="status">Category</label>
                    <select name="category" id="category" class="form-control @error('category') is-invalid @enderror"
                        required>
                        <option value="Govt" @if($client->status == 'Govt') {{ 'selected' }} @endif>Govt</option>
                        <option value="Non-Govt" @if($client->status == 'Non-Govt') {{ 'selected' }} @endif>Non-Govt
                        </option>
                        <option value="Circulation" @if($client->status == 'Circulation') {{ 'selected' }}
                            @endif>Circulation
                        </option>
                    </select>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="status">Agent</label>
                    <select name="agent_id" id="agent_id" class="form-control @error('agent_id') is-invalid @enderror
                        select2" required>
                        <option value="" selected disabled>Select Agent</option>
                        @foreach($agents as $agent)
                        <option value="{{$agent->id}}" @if($client->agent_id == $agent->id) {{ 'selected' }}
                            @endif>{{$agent->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Address</label>
                <input type="text" name="address" id="address" value="{{ $client->address }}"
                    class="form-control @error('address') is-invalid @enderror" placeholder="Enter client address">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control @error('status') is-invalid @enderror" name="status" id="status" required>
                    <option value="1" @if($client->status == 1) {{ 'selected' }} @endif>Active</option>
                    <option value="0" @if($client->status == 0) {{ 'selected' }} @endif>Inactive</option>
                </select>
            </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
            </button>
            <a class="btn btn-secondary" href="{{ route('clients.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
