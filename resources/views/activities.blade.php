@include('header')
@include('navbar')

@auth
<main style="padding:1rem;">
    <h1>
        @if(isset($course))
            Activities for {{ $course->title }}
        @else
            All Activities
        @endif
    </h1>

    <!-- Add Activity Button -->
    <button type="button" class="editBtn" data-bs-toggle="modal" data-bs-target="#addActivityModal" style="margin-bottom:1.5rem;">
        Add Activity
    </button>

    <!-- Add Activity Modal -->
    <div class="modal fade" id="addActivityModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('activities.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add Activity</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        @if(isset($course))
                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                        @endif

                        <div class="mb-3">
                            <label for="course_name" class="form-label">Activity Name</label>
                            <input type="text" class="form-control" name="course_name" required>
                        </div>

                        <div class="mb-3">
                            <label for="base_code" class="form-label">Base Code</label>
                            <input type="text" class="form-control" name="base_code" required>
                        </div>

                        <div class="mb-3">
                            <label for="campus" class="form-label">Campus</label>
                            <select class="form-select" name="campus" required>
                                <option value="">Select a campus</option>
                                @foreach ($campuses as $campus)
                                    <option value="{{ $campus->CampusName }}">{{ $campus->CampusName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="intake_month" class="form-label">Intake Month</label>
                            <select class="form-select" name="intake_month" required>
                                <option value="">Select intake</option>
                                @foreach ($intakes as $intake)
                                    <option value="{{ $intake->Intake }}">{{ $intake->Intake }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="for_programme" class="form-label">For Programme?</label>
                            <select class="form-select" name="for_programme" required>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Activity</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if(session('success'))
        <p style="color:green; margin-bottom:1rem;">{{ session('success') }}</p>
    @endif

    <h2>Existing Activities</h2>
    <table class="programmesTable">
        <thead>
            <tr>
                <th>Course</th>
                <th>Name</th>
                <th>Base Code</th>
                <th>Campus</th>
                <th>Intake</th>
                <th>For Programme</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($activities as $activity)
                <tr>
                    <td>{{$activity->course->title ?? 'N/A'}}</td>
                    <td>{{$activity->course_name}}</td>
                    <td>{{$activity->base_code}}</td>
                    <td>{{$activity->campus}}</td>
                    <td>{{$activity->intake_month}}</td>
                    <td>{{$activity->for_programme}}</td>
                    <td>
                        <form action="{{route('activities.delete', $activity->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('activities.edit', $activity->id)}}">
                            <button class="editBtn">Edit</button>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" style="text-align:center;">No activities found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
