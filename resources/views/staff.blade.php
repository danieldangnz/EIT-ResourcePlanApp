@include('header')
@include('navbar')

<main>
    <h1>Staff</h1>

    <div style="margin-bottom: 1rem; display: flex; gap: 0.5rem;">
        <button class="staffBtn" style="background-color: #16A34A;">Add</button>
        <button class="staffBtn" style="background-color: #2563EB">Edit</button>
        <button class="staffBtn" style="background-color: #DC2626">Remove</button>
    </div>

    <div style="margin-bottom: 1rem;">
        <input class="searchbar" type="text" placeholder="Search">
        <button class="searchBtn">Search</button>
    </div>

    <table border="1" cellpadding="8" cellspacing="0" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="width:5%;">ID</th>
                <th style="width:30%;">Name</th>
                <th style="width:15%;">Staff Code</th>
                <th style="width:15%;">Campus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John</td>
                <td>ddfdsfda</td>
                <td>EIT</td>
            </tr>
        </tbody>
    </table>
</main>

@include('footer')