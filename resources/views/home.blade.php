@extends('app')
@section('content')
 {{--   {{ dd($categories) }}--}}
 <div class="container">
     <div class="row">
         @foreach($categories as $category)
             <div class="col-md-6">
                 <h2>{{ $category->name }}</h2>
                 <p>{{ $category->articles->count() }}</p>
                 <a href="{{route('category', $category->slug)}}"> <img class="img-fluid" src="{{ Voyager::image( $category->thumbnail('cropped','images')) }}" alt=""></a>

                 {!! $category->description !!}
             </div>
         @endforeach
     </div>
 </div>
    @endsection
