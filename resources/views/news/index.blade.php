@extends('layouts.main')
@section('content')
    <div class="col-lg-8">

        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <div class="col-lg-6">
                @forelse($newsList as $news)
                <div class="card mb-4">
                    <a href="{{ route('news.show', ['id' => $news['id']]) }}">
                    <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ now()->format('d-m-Y H:i') }}</div>
                        <h2 class="card-title h4">{{ $news['title'] }}</h2>
                        <p>Категория:{{$news['categorie_title']}}</p>
                        <p class="card-text">{!! $news['description'] !!}</p>
                        <a class="btn btn-primary" href="{{ route('news.show', ['id' => $news['id']]) }}">Читать далее →</a>
                    </div>
                </div>

                @empty
                    <h2>Записей нет</h2>
                @endforelse

            </div>

        </div>
    </div>
@endsection
@section('sidebar')
    @include('layouts.categoriessidebar')
@endsection

