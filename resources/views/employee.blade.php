@extends('layouts.master')
@section('content')
<form style="width:15vw;margin-left:auto;margin-right:auto;margin-top:25vh"
    action="{{ route('employees.update', $employee['id']) }}" method="POST">

    @method('PUT') @csrf
    @if (session('status_success'))
    <p style="color: green"><b style="margin-left:auto;margin-right:auto">{{ session('status_success') }}</b></p>
    @else
    <p style="color: red"><b style="margin-left:auto;margin-right:auto">{{ session('status_error') }}</b></p>
    @endif
    <label for="name">Employee name:</label>
    <input style="display:block" type="text" name="name" value="{{ $employee['name'] }}"><br>

    <label for="project">Select project:</label>
    <select style="display: block" name="project_id" id="project"><br>
        @foreach ($projects as $project)
        <option value={{$project->id}}>{{$project->title}}</option>
        @endforeach
    </select>

    <div>
        @foreach ($errors->all() as $error)
        <p style="color: red;margin-top: 1vh;">{{ $error }}</p>
        @endforeach
    </div>

    <input style="margin-top: 1.8vh" class="btn btn-info" type="submit" value="UPDATE">
</form>
@endsection