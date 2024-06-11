@extends('framework.master')
@section('title', 'Dashboard')
@section('content')
    <div class="page-content">
        <section class="row">
            <h1>Selamat Datang, {{ Auth::user()->name }}</h1 </h1>
        </section>
    </div>
@endsection
