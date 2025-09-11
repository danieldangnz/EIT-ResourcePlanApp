@include('header')
@include('navbar')

@auth
<main>
    <h1>Edit Programme</h1>

    <form action="{{ route('staff.update', $staff->id) }}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        @method('PUT')

        <input type="text" name="staff_name" placeholder="staff Title" value="{{ $staff->staff_name }}" maxlength="50" required>
        <input type="text" name="staff_code" placeholder="staff Code" value="{{ $staff->staff_code }}" maxlength="10" required>

        <button type="submit" style="background-color:#16A34A; color:white;">Save Changes</button>
        <a href="{{ route('staffmem') }}"><button type="button">Cancel</button></a>
    </form>
</main>
@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
