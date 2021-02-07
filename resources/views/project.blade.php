@extends('layouts.master')
@section('content')


<form style="width:15vw;margin-left:auto;margin-right:auto;margin-top:25vh" action="{{ route('projects.update', $project['id']) }}" method="POST">

    @method('PUT') @csrf
    @if (session('status_success'))
    <p style="color: green"><b style="margin-left:auto;margin-right:auto">{{ session('status_success') }}</b></p>
    @else
    <p style="color: red"><b style="margin-left:auto;margin-right:auto">{{ session('status_error') }}</b></p>
    @endif

    <label for="title">Project title:</label>
    <input style="display:block" type="text" name="title" value="{{ $project['title'] }}"><br>
        @foreach ($errors->all() as $error)
        <p style="color: red;margin: 0;margin-bottom:2vh">{{ $error }}</p>
        @endforeach
    </div>
    <input class="btn btn-info" type="submit" value="UPDATE">
</form>
@endsection

