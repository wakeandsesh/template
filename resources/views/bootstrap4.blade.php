@php

    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }

@endphp
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#topmenu" aria-controls="topmenu" aria-expanded="false" aria-label="Toggle navigation">
    <img src="{{ asset('img/mob-menu.png') }}" alt="mobile menu">
  </button>
  <div class="collapse navbar-collapse" id="topmenu">
<ul class="navbar-nav justify-content-between container">
    @foreach($items as $item)
        @if($item->children->count())
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ url($item->url) }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $item->title }}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach($item->children as $subItem)
                        @if($subItem->title == 'divider')
                            <div class="dropdown-divider"></div>
                        @else
                            <a class="dropdown-item {!! url($subItem->link()) == url()->current() ? 'active' : '' !!}" target="{{ $subItem->target }}" href="{{ url($subItem->url) }}">{{ $subItem->title }} {!! url($subItem->link()) == url()->current() ? '<span class="sr-only">(current)</span>' : '' !!}</a>
                        @endif
                    @endforeach
                </div>
            </li>
        @else
            <li class="nav-item">
                <a class="nav-link @if($item->icon_class) {{ $item->icon_class }} @endif" target="{{ $item->target }}" href="{{ url($item->url) }}">{{ $item->title }} {!! url($item->link()) == url()->current() ? '<span class="sr-only">(current)</span>' : '' !!}</a>
            </li>
        @endif
    @endforeach
    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary ml-auto mr-2" data-toggle="modal" data-target="#top_formModal">
            Запустить модальное окно
        </button>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
</ul>
  </div>
</nav>
