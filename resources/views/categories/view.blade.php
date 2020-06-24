@extends('app')
@section('content')
    <div class="container">
        <h2>{{ $category->name }}</h2>
        @foreach($category->articles as $article)
            <h3>{{ $article->name }}</h3>
            @endforeach
    </div>
@endsection
