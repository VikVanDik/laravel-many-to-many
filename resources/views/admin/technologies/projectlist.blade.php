@extends('layouts.admin')

@section('content')

@foreach ($technology->projects as $project)

<div>{{$project->name}}</div>

@endforeach

@endsection
