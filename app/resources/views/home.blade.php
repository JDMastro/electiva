@extends('layouts.app')

@section('content')
<div id="example" data-entityId="{{ auth()->user() }}">
<!--<Example iduser ={{ auth()->user() }}/>-->
</div>

@endsection
