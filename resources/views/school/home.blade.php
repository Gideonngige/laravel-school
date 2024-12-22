@extends('school.layout')
@section('content')

@if(isset($name))
<h3>Hi {{ $name }} &#128075;</h3>
@else
<h3>Hi User</h3>
@endif

<h2>Welcome back!</h2>
<div class="row">
    <div class="col-sm-3">
        <h3>About Us</h3><hr>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod molestias adipisci cum aliquid suscipit. Doloremque in distinctio cumque possimus ipsum sit facilis, illum necessitatibus nemo reiciendis impedit vero, commodi modi.</p>
    </div>
    <div class="col-sm-3">
        <h3>Why learn with us</h3><hr>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod molestias adipisci cum aliquid suscipit. Doloremque in distinctio cumque possimus ipsum sit facilis, illum necessitatibus nemo reiciendis impedit vero, commodi modi.</p>
    </div>
    <div class="col-sm-3">
        <h3>Our services</h3><hr>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod molestias adipisci cum aliquid suscipit. Doloremque in distinctio cumque possimus ipsum sit facilis, illum necessitatibus nemo reiciendis impedit vero, commodi modi.</p>
    </div>
</div><hr>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Our Students</h5><hr>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, rerum eveniet? Quas, laboriosam fuga reprehenderit excepturi. Ipsam quia voluptas quaerat, vel debitis.</p>
                <a href="#" class="btn btn-primary">View Students</a>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Our Performance</h5><hr>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis, rerum eveniet? Quas, laboriosam fuga reprehenderit excepturi. Ipsam quia voluptas quaerat, vel debitis.</p>
                <a href="#" class="btn btn-primary">View performance</a>
            </div>
        </div>
    </div>
</div>
@stop