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

        <!-- Intake Dropdown -->
        <select name="intake" required>
            <option value="">-- Select Intake --</option>
            @foreach($intakes as $intake)
                <option value="{{ $intake->Intake }}">{{ $intake->Intake }}</option>
            @endforeach
        </select>

        <!-- Campus Dropdown -->
        <select name="campus" required>
            <option value="">-- Select Campus --</option>
            @foreach($campuses as $campus)
                <option value="{{ $campus->CampusName }}">{{ $campus->CampusName }}</option>
            @endforeach
        </select>

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
                <th>Intake</th>
                <th>Campus</th>
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
                    <td>{{ $programme->intake }}</td>
                    <td>{{ $programme->campus }}</td>
                    <td>{{ $programme->section->Section ?? 'N/A' }}</td>

                    <!-- Delete -->
                    <td>
                        <form action="{{ route('programmes.delete', $programme->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Delete</button>
                        </form>
                    </td>

                    <!-- Edit -->
                    <td>
                        <a href="{{ route('programmes.edit', $programme->id) }}">
                            <button class="editBtn">Edit</button>
                        </a>
                    </td>

                    <!-- View Courses -->
                    <td>
                        <a href="{{ route('courses.index.programme', $programme->id) }}">
                            <button class="editBtn">View Courses</button>
                        </a>
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
    </script>
</main>
@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
