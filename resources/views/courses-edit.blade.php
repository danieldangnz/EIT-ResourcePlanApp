@include('header')
@include('navbar')

<main style="padding: 1rem;">
    <h1>Edit Course</h1>

    <form method="POST" action="{{route('courses.update', $course->id)}}" style="max-width: 600px;">
        @csrf
        @method('PUT')

        <label for="programme_id">Programme:</label>
        <select name="programme_id" id="programme_id" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
            @foreach($programmes as $programme)
                <option value="{{$programme->id}}" {{$course->programme_id == $programme->id ? 'selected' : ''}}>
                    {{$programme->title}}
                </option>
            @endforeach
        </select>

        <label for="title">Course Title:</label>
        <input type="text" name="title" id="title" value="{{$course->title}}" maxlength="255" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">

        <label for="base_code">Base Code:</label>
        <input type="text" name="base_code" id="base_code" value="{{$course->base_code}}" maxlength="20" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">

        <label for="intake">Intake:</label>
        <select name="intake" id="intake" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
            <option value="">-- Select Intake --</option>
            @foreach($intakes as $intake)
                <option value="{{$intake->Intake}}" {{$course->intake == $intake->Intake ? 'selected' : ''}}>
                    {{$intake->Intake}}
                </option>
            @endforeach
        </select>

        <label for="campus_id">Campus:</label>
        <select name="campus_id" id="campus_id" required style="width: 100%; margin-bottom: 1rem; padding: 0.5rem;">
            @foreach($campus as $campusItem)
                <option value="{{$campusItem->id}}" {{$course->campus_id == $campusItem->id ? 'selected' : ''}}>
                    {{$campusItem->CampusName}}
                </option>
            @endforeach
        </select>

        <button type="submit" style="padding: 0.5rem 1rem; background-color: #3B82F6; color: white; border: none; border-radius: 4px;">
            Update Course
        </button>
    </form>
</main>

@include('footer')
