
@extends('layouts.main')
@section('content')

    <div class="col-lg-8">

        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <div class="col-lg-6">
                @forelse($categoriesList as $categorie)
                <div class="card mb-4">
                    <h1>Категория:<a href="{{ route('newsbycategory', ['id' => $categorie['id']]) }}">{{ $categorie['title'] }}</a></h1>

                </div>

                @empty
                    <h2>Записей нет</h2>
                @endforelse

            </div>
        </div>
    </div>

@endsection

