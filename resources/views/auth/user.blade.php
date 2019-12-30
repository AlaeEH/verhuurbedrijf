@extends('layouts.layout')

@section('title')
		{{Auth::user()->name}}
@endsection

@section('content')

<html>
<head>
	
</head>
<body>
	Welcome back {{Auth::user()->name}}!!
</body>
</html>

@endsection