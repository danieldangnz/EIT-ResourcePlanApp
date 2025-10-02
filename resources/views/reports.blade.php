@include('header')
@include('navbar')

@auth
<main style="padding: 1rem;">

    <h1>Programmes and Staff</h1>
    <div style="display: flex; gap: 2rem; align-items: flex-start; height: auto;">
        <div style="flex: 1; display: flex; gap: 1rem; padding-right: 1rem; border-right: 2px solid #ccc;">
            <!-- Scrollable programmes box -->
            <div style="flex: 1; padding: 0.5rem; max-height: 60vh; overflow-y: auto; border: 1px solid #ddd; border-radius: 4px;">
                <ul style="list-style: none; margin: 0; padding: 0;">
                    @foreach($programmes as $programme)
                        <li style="margin: 0; padding: 0;">
                            <!-- need to decorarte this in style.css -->
                            <button class="programme-btn" data-programme-id="{{$programme->id}}" style="width: 100%; text-align: left; padding: 0.3rem 0.5rem; margin-bottom: 2px; border: none; background: #f3f4f6; cursor: pointer; border-radius: 4px; font-size: 0.9rem;">
                                {{$programme->title}} ({{$programme->base_code}})
                            </button>

                            <!-- Modals -->
                            <div id="modal-all-{{ $programme->id }}" class="modal" style="display: none; position: fixed; z-index: 1000; left:0; top:0; width:100%; height:100%; overflow:auto; background-color: rgba(0,0,0,0.4);">
                                <div style="background-color: white; margin: 5% auto; padding: 2rem; border-radius: 8px; width: 700px; max-width: 90%; position: relative; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                    <h2 style="margin-top:0; font-size: 1.5rem;">{{$programme->title}} - All Details</h2>
                                    <p style="font-size: 1rem; margin-bottom: 1rem;">Full programme details for <strong>{{$programme->title}}</strong>.</p>
                                    <button class="close-modal" style="position:absolute; top:15px; right:15px; background:none; border:none; font-size:22px; cursor:pointer;">&times;</button>
                                </div>
                            </div>
                            <div id="modal-summary-{{ $programme->id }}" class="modal" style="display :none; position: fixed; z-index: 1000; left:0; top:0; width:100%; height:100%; overflow:auto; background-color: rgba(0,0,0,0.4);">
                                <div style="background-color: white; margin: 5% auto; padding: 2rem; border-radius: 8px; width: 700px; max-width: 90%; position: relative; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
                                    <h2 style="margin-top:0; font-size: 1.5rem;">Programme, Course and Activity Summary Report</h2>
                                    <p style="font-size: 1rem; margin-bottom: 1rem;"><strong>Selected Programme:</strong> {{$programme->title}} ({{$programme->base_code}})</p>
                                    <button class="close-modal" style="position:absolute; top: 15px; right: 15px; background: none; border: none; font-size: 22px; cursor: pointer;">&times;</button>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div style="display: flex; flex-direction: column; gap: 0.5rem; justify-content: flex-start;">
                <button id="allDetailsBtn" style="width: 150px; padding: 0.5rem; background-color: #3B82F6; color: white; border: none; border-radius: 4px;">All Details</button>
                <button id="activitySummaryBtn" style="width: 150px; padding: 0.5rem; background-color: #F59E0B; color: white; border: none; border-radius: 4px;">Activity Summary</button>
            </div>
        </div>

        <!-- Right section - Staff -->
        <div style="flex: 1; padding-left: 1rem; height: 100%;">
            <h2>Staff</h2>
            <p>Select a programme from the left to view staff reports.</p>
        </div>
    </div>

</main>

<script>
    // Select a programme when clicked
    let selectedProgrammeId = null;

    document.querySelectorAll('.programme-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.programme-btn').forEach(i => i.style.backgroundColor = '#f3f4f6');
            this.style.backgroundColor = '#cce5ff';
            selectedProgrammeId = this.getAttribute('data-programme-id');
        });
    });

    function openModal(type) {
        if (!selectedProgrammeId) {
            alert('Please select a programme first.');
            return;
        }
        const modal = document.getElementById(type + '-' + selectedProgrammeId);
        modal.style.display = 'block';
    }

    // Close modal when close button is clicked
    document.querySelectorAll('.close-modal').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.modal').style.display = 'none';
        });
    });

    // Close modal when clicking outside
    window.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            e.target.style.display = 'none';
        }
    });

    // Buttons open modal for selected programme
    document.getElementById('allDetailsBtn').addEventListener('click', function() {
        openModal('modal-all');
    });

    document.getElementById('activitySummaryBtn').addEventListener('click', function() {
        openModal('modal-summary');
    });
</script>

@else
    @php
        header("Location: /login");
        exit();
    @endphp
@endauth

@include('footer')
