@include('header')
@include('navbar')

@auth
<main style="padding: 1rem;">

    <h1>Courses</h1>

    <!-- Add Course Form -->
    <h2>Add Course</h2>
    <form method="POST" action="{{route('courses.store')}}" style="margin-bottom: 2rem; max-width: 600px;">
        @csrf

        <select name="programme_id" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
            <option value="">-- Choose Programme --</option>
            @foreach($programmes as $programme)
                <option value="{{$programme->id}}">{{$programme->title}} ({{$programme->base_code}})</option>
            @endforeach
        </select>

        <input type="text" name="courseCode" placeholder="Course Code" maxlength="50" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
        <input type="text" name="courseFullCode" placeholder="Full Course Code" maxlength="50" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
        <textarea name="courseDescription" placeholder="Course Description" maxlength="500" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;"></textarea>

        <div style="margin-bottom: 1rem;">
            <label>
                <input type="checkbox" name="onlyOneCourseForProgramme" value="1">
                Only one course for this programme
            </label>
        </div>

        <select name="status" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
            <option value="working">Working</option>
            <option value="completed">Completed</option>
        </select>

        <button type="submit" class="headerBtn" style="background-color: #3B82F6; margin-top: 0.5rem;">Add Course</button>
    </form>

    <!-- Existing Courses Table -->
    <h2>Existing Courses</h2>
    <table class="programmesTable">
        <thead>
            <tr>
                <th>Programme</th>
                <th>Course Code</th>
                <th>Full Code</th>
                <th>Description</th>
                <th>Only One?</th>
                <th>Status</th>
                <th></th>
                <th></th>
                <th></th> <!-- For View Activities button -->
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{$course->programme->title}}</td>
                    <td>{{$course->courseCode}}</td>
                    <td>{{$course->courseFullCode}}</td>
                    <td>{{$course->courseDescription}}</td>
                    <td>{{$course->onlyOneCourseForProgramme ? 'Yes' : 'No'}}</td>
                    <td>{{ucfirst($course->status)}}</td>
                    <td>
                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('courses.edit', $course->id) }}">
                            <button class="editBtn">Edit</button>
                        </a>
                    </td>
                    <td>
                        <!-- View Activities Button -->
                        <button class="headerBtn" style="background-color:#F59E0B;" onclick="openActivitiesModal({{ $course->id }})">
                            View Activities
                        </button>

                        <!-- Activities Modal -->
                        <div id="activitiesModal-{{$course->id}}" class="modal" style="display:none; position: fixed; z-index: 1000; left:0; top:0; width:100%; height:100%; overflow:auto; background-color: rgba(0,0,0,0.4);">
                            <div style="background-color: white; margin: 5% auto; padding: 20px; border-radius: 6px; width: 500px; max-height: 80vh; overflow-y:auto; position: relative;">
                                <h2>Activities for {{$course->courseCode}}</h2>
                                <button class="close-modal" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:18px; cursor:pointer;">&times;</button>

                                @if($course->activities->count() > 0)
                                    <table class="programmesTable" style="margin-top: 1rem;">
                                        <thead>
                                            <tr>
                                                <th>Activity Name</th>
                                                <th>Base Code</th>
                                                <th>Campus</th>
                                                <th>Intake Month</th>
                                                <th>For Programme?</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($course->activities as $activity)
                                                <tr>
                                                    <td>{{$activity->course_name}}</td>
                                                    <td>{{$activity->base_code}}</td>
                                                    <td>{{$activity->campus}}</td>
                                                    <td>{{$activity->intake_month}}</td>
                                                    <td>{{$activity->for_programme}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @else
                                    <p style="margin-top: 1rem;">No activities found for this course.</p>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" style="text-align: center; padding: 0.5rem;">No courses found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</main>

<script>
    function openActivitiesModal(courseId) {
        const modal = document.getElementById('activitiesModal-' + courseId);
        modal.style.display = 'block';
    }

    // Close modal when clicking the close button
    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.modal').style.display = 'none';
        });
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            e.target.style.display = 'none';
        }
    });
</script>

@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
