@extends('site.templates.template1')

@section('content')

<h1>HOME PAGE</h1>
{{$xss}}

{{--
@if($var1 == '1523')
    <p>É IGUAL</p>
@else
    <p>É direfernte</p>
@endif
--}}

@foreach($arrayData as $array)
    <p>Foreach {{$array}}</p>
@endforeach


@forelse($arrayData as $array)
    <p>For else {{$array}}</p>
@empty

@endforelse

@include('site.includes.sidebar',compact('var1'))

@endsection

@push('scripts')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endpush