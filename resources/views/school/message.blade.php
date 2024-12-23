@extends('school.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('messages.css') }}">
<div class="container">
    @foreach ($messages as $message)
    <div class="card">
        <div class="card-header">{{$message->message_time}}</div>
        <div class="card-body">
            <h5 class="card-title">{{$message->message}}</h5>
        </div>

    </div>
        
    @endforeach
    
    
</div>
@stop