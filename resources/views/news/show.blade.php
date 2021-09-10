@extends('layouts.main')
@section('content')
<!-- Featured blog post-->
<div class="col-lg-8">
<div class="card mb-4">
    <a href="#!">
        <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..." />
    </a>
    <div class="card-body">
        <div class="small text-muted">{{ now()->format('d-m-Y H:i') }}</div>
        <h2 class="card-title h4">{{ $news['title'] }}</h2>
        <p>Категория:{{$news['categorie_title']}}</p>
        <p class="card-text">{!! $news['description'] !!}</p>
    </div>
</div>
</div>
@endsection
@section('sidebar')
    @include('layouts.categoriessidebar')
@endsection
