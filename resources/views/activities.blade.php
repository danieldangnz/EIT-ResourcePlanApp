@include('header')
@include('navbar')

@auth
<main>
    <h1>Activity List</h1>

    <!-- Add Activity Form -->
    <h2>Add Activity</h2>
    <form action="{{route('activities.store')}}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        <input type="text" name="course_name" placeholder="Course Name" maxlength="100" required>
        <input type="text" name="base_code" placeholder="Base Code" maxlength="10" required>
        <input type="text" name="campus" placeholder="Campus" maxlength="50" required>
        <input type="text" name="intake_month" placeholder="Intake Month" maxlength="20" required>
        <select name="for_programme" required>
            <option value="">-- 1 Course for Programme? --</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
        <button type="submit" class="editBtn">Add Activity</button>
    </form>

    @if(session('success'))
        <p style="color:green;">{{session('success')}}</p>
    @endif

    <!-- Activity Table -->
    <table class="programmesTable">
        <thead>
            <tr>
                <th>Activity Name</th>
                <th>Base Code</th>
                <th>Campus</th>
                <th>Intake Month</th>
                <th>1 Course for Programme</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->course_name }}</td>
                    <td>{{ $activity->base_code }}</td>
                    <td>{{ $activity->campus }}</td>
                    <td>{{ $activity->intake_month }}</td>
                    <td>{{ $activity->for_programme }}</td>
                    <td>
                        <form action="{{route('activities.delete', $activity->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="deleteBtn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('activities.edit', $activity->id) }}">
                            <button type="button" class="editBtn">Edit</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
