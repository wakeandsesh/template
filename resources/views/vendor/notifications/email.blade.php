@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Название сайта
            {{--<img src="{{asset('yourLogoFileName')}}" alt="{{config('app.name')}}">--}}
        @endcomponent
    @endslot

    {{-- Body --}}
    <h4>Name : <em>{{ $data["username"] }}</em></h4>
    <h4>Phone: <em>{{ $data["phone"] }}</em></h4>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}
        @endcomponent
    @endslot
@endcomponent
