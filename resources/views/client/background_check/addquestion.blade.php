@extends('client.app')

@section('content')

<h2>Question</h2>
 <form action="/savequestion" method="POST">
   @csrf
  <div class="form-group">
   <label>Question:</label> <input type="text" class="form-control" id="fname" name="question" required>
  </div>
  <button type="submit" class="btn btn-default" style="color:black;">Submit</button>
</form> 
@endsection
