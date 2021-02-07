@extends('layouts.master')
@section('content')
<p style="margin-top:25px;margin-left:5vw">You are in projects page</p>
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
      <th scope="col">Title</th>
      <th scope="col">Employees</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
    <tr>
      <td>{{ $project['id'] }} </td>
      <td>{{ $project['title'] }}</td>
      <td>
        {{$project->employees->implode('name', ', ')}}
      </td>
      <td>
        <a class="btn btn-info" href="{{ route('projects.show', $project['id']) }}">UPDATE</a>
        <form style="display:inline" action="{{ route('projects.destroy', $project['id']) }}" method="POST">
          @method('DELETE')
          @csrf
          <input class="btn btn-danger" type="submit" value="DELETE">
        </form>
    </tr>
    @endforeach
  </tbody>
</table>

<form style="display: block;margin-left:5vw;margin-top:5vh" method="POST" action="./projects">
  @csrf
  <label for="title">Project title:</label><br>
  <input type="text" id="title" name="title"><br><br>
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


{{-- @foreach ($project->employees as $employee)
        {{ $employee['name'] }}
        @if(!$loop->last)
        ,
        @endif
        @endforeach --}}