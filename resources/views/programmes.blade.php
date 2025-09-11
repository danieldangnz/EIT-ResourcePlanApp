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
                        <a href="{{ route('programmes.edit', $programme->id) }}">
                            <button class="editBtn">Edit</button>
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
