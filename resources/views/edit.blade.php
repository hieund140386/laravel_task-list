@extends('layouts.index')

@section('title', 'Edit Task')

@section('content')
    @include('subviews.form', ['task' => $task])
@endsection
