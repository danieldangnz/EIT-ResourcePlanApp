@include('header')
@include('navbar')

<main>
    @auth
        @if(auth()->user()->role == '1')
            <h1>Dashboard</h1>
            <h2>Logged in as {{ auth()->user()->name }}</h2>
        @else
            <script>window.location = "{{route('login')}}";</script>
        @endif
    @else
        <script>window.location = "{{route('login')}}";</script>
    @endauth
</main>

@include('footer')
