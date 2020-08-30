@extends('layout')

@section('content')

    <h1>Cve</h1>
    <ul>
        @foreach ($cves as $cve)
            <li>{{$cve->information}}</li>
            <li>{{$cve->link}}</li>
            <li>{{$cve->created_at}}</li>
        @endforeach
    </ul>
@endsection