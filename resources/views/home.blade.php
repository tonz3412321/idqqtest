@extends('layouts.app', ['title' => 'Home'])

@section('content')

                    You are logged in!
                    {{ csrf_token() }}

@endsection
