@include('header')
@include('navbar')

@auth

    <main>
        <h1>Programmes</h1>

        <label for="programmeDropdown">Select programme:</label>
        <select id="programmeDropdown" name="programmeDropdown">
            <option value="">-- Choose a programme --</option>
            <option value="1">Programme 1</option>
            <option value="2">Programme 2</option>
            <option value="3">Programme 3</option>
        </select>

        <table border="1" cellpadding="8" cellspacing="0" style="margin-top: 1rem; width: 100%">
            <thead>
                <tr>
                    <th style="width: 30%;">Title</th>
                    <th style="width: 5%;">Base code</th>
                    <th style="width: 5%;">Region</th>
                    <th style="width: 10%;">Start Month</th>
                    <th style="width: 3%; background-color:#dc2626; color:white;">Delete</th>
                    <th style="width: 3%; background-color:#16a34a; color:white;">Save</th>
                </tr>
            </thead>
            <tbody>
                
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
