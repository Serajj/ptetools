@extends('layouts.main')

@section('content')

<div class="container justify-content-center">
    <div style="margin-top:2%;" id="headingouter"> <h2>Your {{$head}} - Repeat {{$head}} Practising Progress</h2></div>
<a style="margin: 3%;padding:3%" href="{{route($routeurl)}}" class="btn ctabtn"> Start Practice</a>
</div>

@endsection