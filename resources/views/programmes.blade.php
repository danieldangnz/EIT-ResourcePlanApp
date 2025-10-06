@include('header')
@include('navbar')

@auth
<main>
    <h1>Programmes</h1>

    <h2>Add Programme</h2>
    <form action="{{ route('programmes.store') }}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        <input type="text" name="title" placeholder="Programme Title" maxlength="100" required>
        <input type="text" name="base_code" placeholder="Base Code" maxlength="10" required>
        <input type="text" name="region" placeholder="Region" maxlength="3" required>
        <input type="text" name="start_month" placeholder="Start Month" maxlength="20" required>
        <button type="submit">Add Programme</button>
    </form>

    @if(session('success'))
        <p style="color:green;">{{session('success')}}</p>
    @endif

    <label for="programmeDropdown">Select programme:</label>
    <select id="programmeDropdown" name="programmeDropdown">
        <option value="">-- Choose a programme --</option>
        @foreach($programmes as $programme)
            <option value="{{$programme->id}}">{{$programme->title}}</option>
        @endforeach
    </select>

    <table class="programmesTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Base Code</th>
                <th>Region</th>
                <th>Start Month</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($programmes as $programme)
                <tr>
                    <td>{{ $programme->title }}</td>
                    <td>{{ $programme->base_code }}</td>
                    <td>{{ $programme->region }}</td>
                    <td>{{ $programme->start_month }}</td>
                    <td>
                        <form action="{{ route('programmes.delete', $programme->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('programmes.edit', $programme->id) }}"><button class="editBtn">Edit</button></a>
                    </td>
                    <td>
                        <button class="editBtn" onclick="openCoursesModal({{ $programme->id }})">View Courses</button>

                        <div id="coursesModal-{{ $programme->id }}" class="modal" style="display:none; position: fixed; z-index: 1000; left:0; top:0; width:100%; height:100%; overflow:auto; background-color: rgba(0,0,0,0.4);">
                            <div style="background-color: white; margin: 5% auto; padding: 20px; border-radius: 6px; width: 600px; position: relative; max-height: 80vh; overflow-y: auto;">
                                <h2>Courses for {{ $programme->title }}</h2>
                                <button class="close-modal" style="position:absolute; top:10px; right:10px; background:none; border:none; font-size:18px; cursor:pointer;">&times;</button>

                                @if($programme->courses->isEmpty())
                                    <p>No courses available for this programme.</p>
                                @else
                                    <table class="programmesTable" style="margin-top:1rem;">
                                        <thead>
                                            <tr>
                                                <th>Course Code</th>
                                                <th>Full Code</th>
                                                <th>Description</th>
                                                <th>Only One?</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($programme->courses as $course)
                                                <tr>
                                                    <td>{{$course->courseCode}}</td>
                                                    <td>{{$course->courseFullCode}}</td>
                                                    <td>{{$course->courseDescription}}</td>
                                                    <td>{{$course->onlyOneCourseForProgramme ? 'Yes' : 'No'}}</td>
                                                    <td>{{ucfirst($course->status)}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function openCoursesModal(id) {
            document.getElementById('coursesModal-' + id).style.display = 'block';
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
</main>
@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
