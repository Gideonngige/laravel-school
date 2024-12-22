@extends('school.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('login.css') }}">
<div class="container">
    <div class="inner-container">
        <form action="{{ route('form.submit') }}" method="POST">
            @csrf
            <h2>Login</h2><hr>
            <label>Username</label>
            <input type="text" name="name" class="form-control" placeholder="your name" required/>
            <label>Password</label>
            <input type="password" name="password" class="form-control" placeholder="your password" required />
            <input type="submit" value="Login" />
        </form>
        @if(isset($message))
            <p class="alert alert-danger">{{ $message }}</p>
        @endif

    </div>
</div>
@stop