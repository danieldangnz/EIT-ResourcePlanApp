@include('header')
@include('navbar')

@auth 
    <main>
        <h1>Staff</h1>
        <h2>Add a new staff member</h2>
        <div style="margin-bottom: 1rem; display: flex; gap: 0.5rem;">
            <form action="{{route('staff.store')}}" method="POST" style="margin-bottom: 2rem;">
                @csrf
                <input type="text" name="staff_name" placeholder="Staff name" maxlength="50" required>
                <input type="text" name="staff_code" placeholder="Staff Code" maxlength="10" required>
            <button class="staffBtn" style="background-color: #16A34A;" type='submit'>Add</button>
            </form>
        </div>

        <!-- Search bar -->
        <div style="margin-bottom: 1rem;">
            <form action="{{route('staffmem')}}" method="GET" style="margin-bottom:1rem;">
                <input class="searchbar" type="text" name="query" placeholder="Search staff" value="{{request('query')}}">
                <button class="searchBtn" type="submit">Search</button>
                <a href="{{route('staffmem')}}"><button type="button" class="searchBtn">View All</button></a>
            </form>
        </div>

        <table class="programmesTable">
        <thead>
            <tr>
                <th>Staff Member Name</th>
                <th>Staff Code</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($staffmem as $staff)
                <tr>
                    <td>{{$staff->staff_name}}</td>
                    <td>{{$staff->staff_code}}</td>
                    <td>
                        <form action="{{route('staff.delete', $staff->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="deleteBtn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{route('staff.edit', $staff->id)}}">
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