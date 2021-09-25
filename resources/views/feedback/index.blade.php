@extends('layouts.feedback')
@section('title') Добавить новость - @parent @stop

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить отзыв</h1>

    </div>
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif
            <form method="post" action="{{ route('feedback.store') }}">
                @csrf
                <div class="form-group">
                    <label for="title">Имя</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}">
                </div>

                <div class="form-group">
                    <label for="description">Отзыв</label>
                    <textarea class="form-control" name="userfeedback" id="userfeedback">{{ old('userfeedback') }}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>

    <div class="col-lg-8">

        <!-- Nested row for non-featured blog posts-->
        <div class="row">
            <div class="col-lg-6">
                @forelse($feedbacks as $feedback)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2>{{ $feedback->username }}</h2>
                        <p>{{ $feedback->userfeedback }}</p>
                    </div>
                </div>

                @empty
                    <h2>Отзывов нет</h2>
                @endforelse

            </div>

        </div>
    </div>

@endsection

