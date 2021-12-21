@extends('jecar::app')

@section('content')
<div id="jecar-cms" data-prefix="{{$prefix}}"></div>

<script src="{{asset('js/jecar-cms/index.js')}}"></script>
@endsection
