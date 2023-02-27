@include('partials.head')
@include('partials.header')
<div class="container-scroller">
    <div class="main-panel">
        @yield('content')
        @include('partials.footer')
    </div>
</div>
@include('partials.end-section')
