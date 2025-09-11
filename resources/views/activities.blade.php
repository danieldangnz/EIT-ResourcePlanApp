@include('header')
@include('navbar')

@auth
    <main>
        <h1>Activity List</h1>

        <table class="activityListTable">
            <thead>
                <tr>
                    <th>Course Name</th>
                    <th>Base Code</th>
                    <th>Campus</th>
                    <th>Intake Month</th>
                    <th>1 Course for Programme</th>
                    <th style="background-color:#dc2626; color:white;">Delete</th>
                    <th style="background-color:#16a34a; color:white;">Save</th>
                    <th style="background-color:#2563eb; color:white;">See Activities</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Introduction to an Activity</td>
                    <td>ACT101</td>
                    <td>EIT</td>
                    <td>Jan</td>
                    <td>Yes</td>
                    <td style="text-align:center;"><button>Delete</button></td>
                    <td style="text-align:center;"><button>Save</button></td>
                    <td style="text-align:center;"><button>See</button></td>
                </tr>
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