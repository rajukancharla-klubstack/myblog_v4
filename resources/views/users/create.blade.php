@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">

    <h1 style="color: #00796b;">Create User</h1>

    <form id="user-create-form" action="{{ route('users.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name" style="color: #e44d26;">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email" style="color: #512da8;">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password" style="color: #3b5998;">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #e44d26; border-color: #e44d26;">Create User</button>
    </form>

</div>
@endsection