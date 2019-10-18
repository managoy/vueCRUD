@extends('layouts.layout')

@section('content')

    @if(!session()->has('message'))
    <div id="crud">

        <form @submit="postData" >
            @csrf
            @include('student.form')

        </form>
        <p>Name is: @{{ name }}</p>
    </div>
    @endif
    <script type="text/javascript" src="{{ mix('js/crud.js') }}"></script>
    @endsection
