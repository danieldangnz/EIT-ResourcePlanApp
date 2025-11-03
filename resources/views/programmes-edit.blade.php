@include('header')
@include('navbar')

@auth
<main>
    <h1>Edit Programme</h1>

    <form action="{{route('programmes.update', $programme->id)}}" method="POST" style="margin-bottom: 2rem;">
        @csrf
        @method('PUT')

        <input type="text" name="title" placeholder="Programme Title" value="{{$programme->title}}" maxlength="100" required>
        <input type="text" name="base_code" placeholder="Base Code" value="{{$programme->base_code}}" maxlength="10" required>

        <label for="region">Region (Campus)</label>
        <select name="region" id="region" required style="width:300px; padding:8px; margin-bottom:10px;">
            <option value="">-- Select Campus --</option>
            @foreach($campuses as $campus)
                <option value="{{$campus->CampusCode}}"
                    {{ $programme->region == $campus->CampusCode ? 'selected' : ''}}>
                    {{$campus->CampusName}}
                </option>
            @endforeach
        </select>

        <label for="intake">Start Month</label>
        <select name="intake" id="intake" required style="width:300px; padding:8px; margin-bottom:10px;">
            <option value="">-- Select Start Month --</option>
            @foreach($intakes as $intake)
                <option value="{{$intake->Intake}}"
                    {{$programme->intake == $intake->Intake ? 'selected' : ''}}>
                    {{$intake->Intake}}
                </option>
            @endforeach
        </select>

        <button type="submit" style="background-color:#16A34A; color:white;">Save Changes</button>
        <a href="{{route('programmes')}}"><button type="button">Cancel</button></a>
    </form>
</main>
@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
