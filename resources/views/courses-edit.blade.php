@include('header')
@include('navbar')

@auth
<main style="padding: 1rem;">
    <h1>Edit Course</h1>

    <form method="POST" action="{{ route('courses.update', $course->id) }}" style="max-width: 600px;">
        @csrf
        @method('PUT')

        <label for="programme_id">Select Programme:</label>
        <select name="programme_id" id="programme_id" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
            @foreach($programmes as $programme)
                <option value="{{ $programme->id }}" {{ $course->programme_id == $programme->id ? 'selected' : '' }}>
                    {{ $programme->title }} ({{ $programme->base_code }})
                </option>
            @endforeach
        </select>

        <label for="courseDescription">Course Description:</label>
        <textarea name="courseDescription" id="courseDescription" maxlength="500" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">{{ $course->courseDescription }}</textarea>

        <label for="courseCode">Course Code:</label>
        <input type="text" name="courseCode" id="courseCode" value="{{ $course->courseCode }}" maxlength="50" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">

        <label for="courseFullCode">Full Course Code:</label>
        <input type="text" name="courseFullCode" id="courseFullCode" value="{{ $course->courseFullCode }}" maxlength="50" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">

        <div style="margin-bottom: 1rem;">
            <label>
                <input type="checkbox" name="onlyOneCourseForProgramme" value="1" {{ $course->onlyOneCourseForProgramme ? 'checked' : '' }}>
                Only one course for this programme
            </label>
        </div>

        <label for="status">Status:</label>
        <select name="status" id="status" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
            <option value="working" {{ $course->status == 'working' ? 'selected' : '' }}>Working</option>
            <option value="completed" {{ $course->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>

        <button type="submit" style="padding: 0.5rem 1rem; background-color: #3B82F6; color: white; border: none; border-radius: 4px;">
            Update Course
        </button>
    </form>
</main>
@endauth

@include('footer')
