@include('header')
@include('navbar')

@auth
<main>
    <h1>Edit Programme</h1>

    <form action="{{ route('programmes.update', $programme->id) }}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        @method('PUT')

        <input type="text" name="title" placeholder="Programme Title" value="{{ $programme->title }}" maxlength="100" required>
        <input type="text" name="base_code" placeholder="Base Code" value="{{ $programme->base_code }}" maxlength="10" required>
        <input type="text" name="region" placeholder="Region" value="{{ $programme->region }}" maxlength="3" required>
        <input type="text" name="start_month" placeholder="Start Month" value="{{ $programme->start_month }}" maxlength="20" required>

        <button type="submit" style="background-color:#16A34A; color:white;">Save Changes</button>
        <a href="{{ route('programmes') }}"><button type="button">Cancel</button></a>
    </form>
</main>
@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
