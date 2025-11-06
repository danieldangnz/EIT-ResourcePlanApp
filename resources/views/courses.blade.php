@include('header')
@include('navbar')

@auth
<main style="padding:1rem;">

    <h1>
        @if(isset($programme))
            Courses for {{$programme->title}}
        @else
            All Courses
        @endif
    </h1>

    <!-- Add Course Button -->
    <button type="button" class="editBtn" onclick="openAddCourseModal()" style="margin-bottom:1.5rem;">
        Add Course
    </button>

    <!-- Add Course Modal -->
    <div id="addCourseModal" class="modal" style="display:none; position: fixed; z-index: 1000; left:0; top:0; width:100%; height:100%; overflow:auto; background-color: rgba(0,0,0,0.4);">
        <div style="background-color: white; margin: 5% auto; padding: 20px; border-radius: 6px; width: 400px; position: relative;">
            <h2>Add New Course</h2>
            <button class="close-modal" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:18px; cursor:pointer;">&times;</button>

            @if ($errors->any())
                <div style="color:red; margin-bottom:1rem;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{route('courses.store')}}">
                @csrf

                <input type="text" name="title" placeholder="Course Title" required style="width:100%; margin-bottom:1rem; padding:0.5rem;">
                <input type="text" name="base_code" placeholder="Base Code" required style="width:100%; margin-bottom:1rem; padding:0.5rem;">

                <select name="campus_id" required style="width:100%; margin-bottom:1rem; padding:0.5rem;">
                    <option value="">-- Choose Campus --</option>
                    @foreach($campus as $campus)
                        <option value="{{$campus->id}}">{{$campus->CampusName}}</option>
                    @endforeach
                </select>

                <select name="intake" required style="width:100%; margin-bottom:1rem; padding:0.5rem;">
                    <option value="">-- Select Intake --</option>
                    @foreach($intakes as $intake)
                        <option value="{{$intake->Intake}}">{{$intake->Intake}}</option>
                    @endforeach
                </select>

                @if(isset($programme))
                    <input type="hidden" name="programme_id" value="{{$programme->id}}">
                @else
                    <select name="programme_id" required style="width:100%; margin-bottom:1rem; padding:0.5rem;">
                        <option value="">-- Choose Programme --</option>
                        @foreach($programmes as $prog)
                            <option value="{{$prog->id}}">{{$prog->title}}</option>
                        @endforeach
                    </select>
                @endif

                <button type="submit" class="editBtn" style="width:100%;">Add Course</button>
            </form>
        </div>
    </div>

    @if(session('success'))
        <p style="color:green; margin-bottom:1rem;">{{session('success')}}</p>
    @endif

    <!-- Existing Courses Table -->
    <h2>Existing Courses</h2>
    <table class="programmesTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Base Code</th>
                <th>Campus</th>
                <th>Intake</th>
                @if(!isset($programme))<th>Programme</th>@endif
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($courses as $course)
                <tr>
                    <td>{{$course->title}}</td>
                    <td>{{$course->base_code}}</td>
                    <td>{{$course->campus->CampusName}}</td>
                    <td>{{$course->intake}}</td>
                    @if(!isset($programme))<td>{{$course->programme->title ?? 'N/A'}}</td>@endif
                    <td>
                        <form action="{{route('courses.destroy', $course->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('courses.edit', $course->id)}}">
                            <button class="editBtn">Edit</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('activities.course', $course->id) }}">
                            <button class="editBtn">See Activities</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{isset($programme) ? 6 : 7}}" style="text-align:center; padding:0.5rem;">
                        No courses found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</main>

<script>
    function openAddCourseModal() {
        document.getElementById('addCourseModal').style.display = 'block';
    }

    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.modal').style.display = 'none';
        });
    });

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
