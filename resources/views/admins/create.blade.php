@extends('layouts.app')
@section('content')
<div class="tile">
    <h4 class="tile-title">Create Admin</h4>
    <form action="{{route('admins.store')}}" method="POST">
        @csrf
        <div class="tile-body">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">First Name</label>
                        <input type="text" name="first_name" id="first_name"
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
                        <input type="text" name="last_name" id="last_name"
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
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                    required placeholder="Enter admin email">
                @error('email')
                <div class="form-control-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">Username</label>
                    <input type="text" name="username" id="username"
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
                        <option value="1">Admin</option>
                        <option value="2" selected>Operator</option>
                        <option value="0">Inactive</option>
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
                        class="form-control @error('password') is-invalid @enderror" required
                        placeholder="Enter admin Password">
                    @error('password')
                    <div class="form-control-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="form-group">
                    <label class="control-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror" required
                        placeholder="Enter Confirm Password">
                    @error('password_confirmation')
                    <div class="form-control-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="tile-footer">
            <button class="btn btn-primary mr-1" type="submit">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Create
            </button>
            <a class="btn btn-secondary" href="{{ route('admins.index') }}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
            </a>
        </div>
    </form>
</div>
@endsection
