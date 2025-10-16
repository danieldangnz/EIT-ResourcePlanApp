@include('header')
@include('navbar')

@auth
<main>
    <h1>Programmes</h1>

    <!-- Add Programme Form -->
    <h2>Add Programme</h2>
    <form action="{{ route('programmes.store') }}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        <input type="text" name="title" placeholder="Programme Title" maxlength="255" required>
        <input type="text" name="base_code" placeholder="Base Code" maxlength="20" required>
        <input type="text" name="region" placeholder="Region" maxlength="10" required>
        <input type="text" name="intake" placeholder="Intake" maxlength="10" required>
        <input type="text" name="full_prog_code" placeholder="Full Programme Code" maxlength="50" required>
        <input type="text" name="campus" placeholder="Campus" maxlength="100" required>
        <input type="text" name="full_desc" placeholder="Full Description" maxlength="255" required>
        <input type="text" name="prog_stud_set" placeholder="Programme Student Set" maxlength="50" required>
        <input type="text" name="prog1_code" placeholder="Prog1 Code" maxlength="50" required>

        <!-- Section Dropdown -->
        <select name="section_id" required>
            <option value="">-- Select Section --</option>
            @foreach($sections as $section)
                <option value="{{ $section->SectionID }}">{{ $section->Section }}</option>
            @endforeach
        </select>

        <button type="submit">Add Programme</button>
    </form>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    <!-- Filter programmes by Section -->
    <label for="sectionDropdown">Filter by Section:</label>
    <select id="sectionDropdown">
        <option value="">-- All Sections --</option>
        @foreach($sections as $section)
            <option value="{{ $section->SectionID }}">{{ $section->Section }}</option>
        @endforeach
    </select>

    <!-- Programmes Table -->
    <table class="programmesTable">
        <thead>
            <tr>
                <th>Title</th>
                <th>Base Code</th>
                <th>Region</th>
                <th>Intake</th>
                <th>Full Code</th>
                <th>Campus</th>
                <th>Description</th>
                <th>Student Set</th>
                <th>Prog1 Code</th>
                <th>Section</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($programmes as $programme)
                <tr data-section="{{ $programme->section_id }}">
                    <td>{{ $programme->title }}</td>
                    <td>{{ $programme->base_code }}</td>
                    <td>{{ $programme->region }}</td>
                    <td>{{ $programme->intake }}</td>
                    <td>{{ $programme->full_prog_code }}</td>
                    <td>{{ $programme->campus }}</td>
                    <td>{{ $programme->full_desc }}</td>
                    <td>{{ $programme->prog_stud_set }}</td>
                    <td>{{ $programme->prog1_code }}</td>
                    <td>{{ $programme->section->Section ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('programmes.delete', $programme->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('programmes.edit', $programme->id) }}">
                            <button class="editBtn">Edit</button>
                        </a>
                    </td>
                    <td>
                        <button class="editBtn" onclick="openCoursesModal({{ $programme->id }})">View Courses</button>

                        <!-- Courses Modal -->
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
                                                    <td>{{ $course->courseCode }}</td>
                                                    <td>{{ $course->courseFullCode }}</td>
                                                    <td>{{ $course->courseDescription }}</td>
                                                    <td>{{ $course->onlyOneCourseForProgramme ? 'Yes' : 'No' }}</td>
                                                    <td>{{ ucfirst($course->status) }}</td>
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

    <!-- JavaScript -->
    <script>
        // Filter table by section
        const sectionDropdown = document.getElementById('sectionDropdown');
        const programmeRows = document.querySelectorAll('.programmesTable tbody tr');

        sectionDropdown.addEventListener('change', function() {
            const selectedSection = this.value;

            programmeRows.forEach(row => {
                if (!selectedSection || row.dataset.section === selectedSection) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Open course modal
        function openCoursesModal(id) {
            document.getElementById('coursesModal-' + id).style.display = 'block';
        }

        // Close course modal
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', function() {
                this.closest('.modal').style.display = 'none';
            });
        });

        // Click outside modal to close
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
