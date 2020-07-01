@extends('app')
@section('content')
 <div class="container">

     {{--// Слайдеры--}}
     <div id="carouselExampleCaptions" class="carousel slide mb-3" data-ride="carousel">

         <ol class="carousel-indicators">
             @foreach( $sliders as $slider )
                 <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
             @endforeach
         </ol>
         <div class="carousel-inner">
             @foreach($sliders as $slider)
                 <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                     <img src="{{ Voyager::image( $slider->thumbnail('cropped')) }}" class="d-block w-100"  alt="...">
                     <div class="carousel-caption d-none d-md-block">
                         <h5>{{ $slider->name }}</h5>
                         <p>{{ $slider->description }}</p>
                     </div>
                 </div>
             @endforeach

         </div>
         <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
             <span class="sr-only">Previous</span>
         </a>
         <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
             <span class="carousel-control-next-icon" aria-hidden="true"></span>
             <span class="sr-only">Next</span>
         </a>
     </div>

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
