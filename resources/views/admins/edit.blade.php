@extends('layouts.app')

@section('content')
<div class="tile">
    <h4 class="tile-title">Edit Admin</h4>
    <form action="{{route('admins.update', $admin->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="tile-body">

            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $admin->first_name }}"
                            class="form-control @error('first_name') is-invalid @enderror" required
                            placeholder="Enter admin first name">
                        @error('first_name')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $admin->last_name }}"
                            class="form-control @error('last_name') is-invalid @enderror" required
                            placeholder="Enter admin last name">
                        @error('last_name')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input type="email" name="email" id="email" value="{{ $admin->email }}"
                    class="form-control @error('email') is-invalid @enderror" required placeholder="Enter admin email">
                @error('email')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" name="username" id="username" value="{{ $admin->username }}"
                            class="form-control @error('username') is-invalid @enderror" required
                            placeholder="Enter admin username">
                        @error('username')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                            <option value="1" @if($admin->role == 1) {{ 'selected' }} @endif>Admin</option>
                            <option value="2" @if($admin->role == 2) {{ 'selected' }} @endif>Operator</option>
                            <option value="0" @if($admin->role == 0) {{ 'selected' }} @endif>Inactive</option>
                        </select>
                        @error('role')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter admin Password">
                        <small class="form-text text-muted" id="passwordHelp">If only you want to change the
                            password.</small>
                        @error('password')
                        <div class="form-control-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Save
            </button>
            <a class="btn btn-secondary" href="{{ route('admins.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
