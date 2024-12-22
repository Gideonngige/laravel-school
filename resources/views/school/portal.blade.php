@extends('school.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('portal.css') }}">
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Student Details</div>
            <div class="card-body" id="c-body">
                <img src="{{ asset('images/bird.jpg') }}" class="card-image" alt="bird Image">
            </div>
            <div class="card-footer">
            <p>Name: <strong>{{$name}}</strong></p>
            <p>Admission Number: <strong>{{$password}}</strong></p>
            <p>Form: <strong>{{$form}}</strong></p>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Student Fees</div>
            <div class="card-body">
                <p>Total Fees: <strong>Ksh. {{$total}}</strong></p>
                <p>Paid: <strong>Ksh. {{$paid}}</strong></p>
                <p>Balance: <strong>Ksh. {{$balance}}</strong></p>
                <a href="#" class="btn btn-fees" data-bs-toggle="modal" data-bs-target="#myModal">Pay Fees</a>
            </div>
            <div class="card-footer">
            <p><strong>Note:</strong> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum deserunt nihil mollitia natus harum dignissimos maxime ipsum odit, accusantium optio cumque in quas perferendis ex molestiae? Sed aperiam laudantium temporibus.</p>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">Student Results</div>
            <div class="card-body">
                <table width="100%">
                    <tr>
                        <th>Subject</th>
                        <th>Score</th>
                        <th>Grade</th>
                    </tr>
                    <tr>
                        <td>Mathematics</td>
                        <td>{{$mathematics}}</td>
                        <td>B</td></td>
                    </tr>
                    <tr>
                        <td>English</td>
                        <td>{{$english}}</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Kiswahili</td>
                        <td>{{$kiswahili}}</td>
                        <td>B+</td></td>
                    </tr>
                    <tr>
                        <td>Biology</td>
                        <td>{{$biology}}</td>
                        <td>A</td>
                    </tr>
                    <tr>
                        <td>Chemistry</td>
                        <td>{{$chemistry}}</td>
                        <td>B</td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">
            <p>
                <strong>Grading</strong><br>
                The following is how we graded your results:<br>
                A: 90-100<br>
                B: 80-89<br>
                B+: 70-79<br>
                C: 60-69<br>
                D: 50-59<br>
            </p>
            </div>
        </div>
    </div>
</div><hr>

<div class="card">
    <div class="card-header">
        <p>Lates News</p>
    </div>
    <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique aspernatur error, officiis ea quis, molestias possimus cumque amet iure corrupti reprehenderit iusto doloremque, consequuntur temporibus blanditiis ipsum? Quam, perferendis sit.</p>
    </div>
</div>
<script>
    function payFees() {
        alert('Payment successful. Your balance is now Ksh. 500. Thank you!');
    }
</script>

<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Pay Fees</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <form action="{{ route('pay')}}" method="post">
            @csrf
            <label>Amount</label>
            <input type="number" min="1" class="form-control" name="amount" placeholder="enter amount to pay" required>
            <input type="submit" class="btn btn-custom" value="Pay"/>
          </form>
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>
  
@stop