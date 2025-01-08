@extends('layouts.main')
@section('content')
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Выйти</button>
    </form>
    {{session('success')}}
@endsection
