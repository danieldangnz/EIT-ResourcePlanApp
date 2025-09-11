@include('header')
@include('navbar')

@auth
<main>
    <h1>Edit Activity</h1>

    <form action="{{route('activities.update', $activity->id)}}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        @method('PUT')

        <input type="text" name="course_name" placeholder="Course Name" value="{{ $activity->course_name }}" maxlength="100" required>
        <input type="text" name="base_code" placeholder="Base Code" value="{{ $activity->base_code }}" maxlength="10" required>
        <input type="text" name="campus" placeholder="Campus" value="{{ $activity->campus }}" maxlength="50" required>
        <input type="text" name="intake_month" placeholder="Intake Month" value="{{ $activity->intake_month }}" maxlength="20" required>

        <label for="for_programme">1 Course for Programme:</label>
        <select name="for_programme" id="for_programme" required>
            <option value="Yes" {{ $activity->for_programme === 'Yes' ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ $activity->for_programme === 'No' ? 'selected' : '' }}>No</option>
        </select>

        <button type="submit" style="background-color:#16A34A; color:white;">Save Changes</button>
        <a href="{{route('activities')}}"><button type="button">Cancel</button></a>
    </form>
</main>
@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
