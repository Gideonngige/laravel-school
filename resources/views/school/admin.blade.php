@extends('school.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('admin.css') }}">
<div class="container">
    <div class="card">
    <div class="card-header">Add New Student</div>
    <form action="{{ route('add')}}" method="post">
        @csrf
        <label>Name</label>
        <input type="text" name="name" class="form-control" placeholder="enter student name" required/>
        <label>Form</label>
        <select name="form" class="form-control" required>
            <option>One</option>
            <option>Two</option>
            <option>Three</option>
            <option>Four</option>
        </select>
        <input type="submit" class="btn btn-custom" value="Add student"/>
    </form>
    @if(isset($message))
            <p class="alert alert-danger">{{ $message }}</p>
    @endif

    </div>

    <div class="card">
        <div class="card-header">Enter Marks</div>
        <form action="{{ route('marks')}}" method="post">
            @csrf
            <label>Student ID</label>
            <input type="number" min="1" class="form-control" name="student_id" required/>
            <table width="100%">
                <tr>
                    <td>
                        <label>Mathematics</label>
                        <input type="number" min='0' max="100" name="mathematics" class="form-control" required/>
                    </td>
                    <td>
                        <label>English</label>
                        <input type="number" min='0' max="100" name="english" class="form-control" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Kiswahili</label>
                        <input type="number" min='0' max="100" name="kiswahili" class="form-control" required/>
                    </td>
                    <td>
                        <label>Biology</label>
                        <input type="number" min='0' max="100" name="biology" class="form-control" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Chemistry</label>
                        <input type="number" min='0' max="100" name="chemistry" class="form-control" required/>
                    </td>
                </tr>
            </table>
            <input type="submit" class="btn btn-custom" value="Add Marks"/>
        </form>
        @if(isset($message2))
            <p class="alert alert-danger">{{ $message2 }}</p>
        @endif
    
        </div>
        <div class="card">
            <div class="card-header">Send Message</div>
            <div class="card-body">
                <form action="{{ route('messageAdmin')}}" method="post">
                    @csrf
                    <textarea class="form-control" name="message" placeholder="enter message to send"></textarea>
                    <input type="submit" class="btn btn-custom" value="Send Message"/>
                </form>
                @if(isset($response))
                  <p class="alert alert-danger">{{ $response }}</p>
                @endif

            </div>
        </div>
</div>
@stop