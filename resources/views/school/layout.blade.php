<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="{{ asset('layout.css') }}">
  <link rel="stylesheet" href="{{ asset('home.css') }}">
  
    <title>school</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-custom">
        <div class="container-fluid">
          <a class="navbar-brand" href="javascript:void(0)">School</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('portal') }}">Portal</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#myModal1">Admin</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('form.submit') }}">Login</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="{{route('message')}}">Messages</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container">
        @yield("content")
      </div>
      @yield("footer")

      <!-- The Modal -->
<div class="modal" id="myModal1">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Admin Login</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="{{ route('admin')}}" method="post">
          @csrf
          <label>Email</label>
          <input type="email" class="form-control" name="email" required>
          <label>Password</label>
          <input type="password" class="form-control" name="password" required>
          <input type="submit" class="btn btn-custom" value="Login"/>
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

    
</body>
</html>