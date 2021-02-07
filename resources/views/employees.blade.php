@extends('layouts.master')
@section('content')
<p style="margin-top:25px;margin-left:5vw">You are in employees page</p>
<br>
<br>

@if (session('status_success'))
<p style="color: green"><b>{{ session('status_success') }}</b></p>
@else
<p style="color: red"><b>{{ session('status_error') }}</b></p>
@endif

<table style="width:90vw;margin:auto" class="table table-hover ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Project</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @foreach ($employees as $employee)
    <tr>
      <td>{{ $employee['id'] }} </td>
      <td>{{ $employee['name'] }}</td>
      <td>{{$employee->project['title']}}</td>
      <td>
        <a class="btn btn-info" href="{{ route('employees.show', $employee['id']) }}">UPDATE</a>
        <form  style="display:inline" action="{{ route('employees.destroy', $employee['id']) }}" method="POST">
          @method('DELETE')
          @csrf
          <input class="btn btn-danger" type="submit" value="DELETE">
        </form>
    </tr>
    @endforeach
  </tbody>
</table>

<form style="display: block;margin-left:5vw;margin-top:5vh" method="POST" action="./employees">
  @csrf
  <label for="name">Employee name:</label><br>
  <input type="text" id="name" name="name"><br><br>


  {{-- Validation error, for invalid incoming data display logic --}}
  @if ($errors->any())
  <div>
    @foreach ($errors->all() as $error)
    <p style="color: red;margin: 0;margin-bottom:2vh">{{ $error }}</p>
    @endforeach
  </div>
  @endif
  <input class="btn btn-primary" type="submit" value="CREATE NEW++">
</form>
@endsection