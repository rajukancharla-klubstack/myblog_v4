@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 20px;">

    <h1 style="color: #3b5998;">Login</h1>

    <form method="post" action="{{ route('users.login') }}">
        @csrf

        <div class="form-group">
            <label for="email" style="color: #512da8;">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password" style="color: #e44d26;">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary" style="background-color: #00796b; border-color: #00796b;">Login</button>
    </form>

</div>
@endsection