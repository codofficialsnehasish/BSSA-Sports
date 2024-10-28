<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Player Entry Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/notifications/css/lobibox.min.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tournament Entry Form</h2>
        <form id="playerEntryform" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Club Selection -->
                <div class="col-md-6 mb-3">
                    <label for="clubSelection" class="form-label">Choose Club</label>
                    <select class="form-select" id="clubSelection" name="club_id" required>
                        <option selected disabled value="">Select Club</option>
                        @foreach($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->club_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tournament Selection -->
                <div class="col-md-6 mb-3">
                    <label for="tournamentSelection" class="form-label">Choose Tournament</label>
                    <select class="form-select" id="tournamentSelection" name="tournament_id" required>
                        <option selected disabled value="">Select a Club</option>
                    </select>
                </div>
    

                <!-- Player Name -->
                <div class="col-md-6 mb-3">
                    <label for="playerName" class="form-label">Player Name</label>
                    <input type="text" class="form-control" id="playerName" name="player_name" placeholder="Enter player name" required>
                </div>

                <!-- Fathers Name -->
                <div class="col-md-6 mb-3">
                    <label for="player_father_name" class="form-label">Fathers Name</label>
                    <input type="text" class="form-control" id="player_father_name" name="player_father_name" placeholder="Enter player name" required>
                </div>

                <!-- Player Phone Number -->
                <div class="col-md-6 mb-3">
                    <label for="playerPhone" class="form-label">Player Phone Number</label>
                    <input type="tel" class="form-control" id="playerPhone" name="phone_number" placeholder="Enter phone number" required>
                </div>

                <!-- WhatsApp Number -->
                <div class="col-md-6 mb-3">
                    <label for="whatsappNumber" class="form-label">WhatsApp Number</label>
                    <input type="tel" class="form-control" id="whatsappNumber" name="whatsapp_number" placeholder="Enter WhatsApp number" required>
                </div>

                <!-- Date of Birth -->
                <div class="col-md-6 mb-3">
                    <label for="dob" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>

                <!-- Age -->
                <div class="col-md-6 mb-3">
                    <label for="playerAge" class="form-label">Age</label>
                    <input type="number" class="form-control" id="playerAge" name="age" placeholder="Enter age" required>
                </div>

                <!-- Aadhar Number -->
                <div class="col-md-6 mb-3">
                    <label for="aadharNumber" class="form-label">Aadhar Number</label>
                    <input type="text" class="form-control" id="aadharNumber" name="aadhar_number" placeholder="Enter Aadhar number" required>
                </div>
    
                <!-- Address -->
                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter address" required></textarea>
                </div>
    
                <!-- District -->
                <div class="col-md-6 mb-3">
                    <label for="district_id" class="form-label">Choose District</label>
                    <select class="form-select" id="district_id" name="district_id" required>
                        <option selected disabled value="">Select District</option>
                        @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="profileImage" class="form-label">Upload Profile Image</label>
                    <input type="file" class="form-control" id="profileImage" name="profile_image" accept="image/*" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary mb-5">Submit Entry</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--notification js -->
    <script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js') }}"></script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <script>
            $(document).ready(function(){
                round_error_noti('{{ $error }}');
            });
        </script>
        @endforeach
    @endif

    @if(Session::has("error"))
    <script>
        $(document).ready(function(){
            round_error_noti('{{Session::get("error")}}');
        });
    </script>
    @endif

    @if(Session::has("success"))
    <script>
        $(document).ready(function(){
            round_success_noti('{{Session::get("success")}}');
        });
    </script>
    @endif


    <script>
        $('#clubSelection').on('change',function() {
            $.ajax({
                url : "{{ route('get-tournaments-by-club-id') }}",
                type : "POST",
                data : {club_id : $(this).val(), _token : "{{ csrf_token() }}"},
                success : function(resp){
                    // console.log(resp);
                    var options = '<option selected disabled value="">Select Tournament</option>';
    
                    // Loop through the response and create options
                    $.each(resp, function(index, tournament) {
                        options += '<option value="' + tournament.tournaments_id + '">' + tournament.tournament_name + '</option>';
                    });
                    
                    // Populate the select element
                    $('#tournamentSelection').html(options);
                }
            });
        });

        $(document).ready(function() {
            $('#playerEntryform').on('submit', function(e) {
                e.preventDefault();
                // var formData = $(this).serialize();
                var formData = new FormData(this);
                // console.log(formData);
                $.ajax({
                    url: "{{ route('process-player-entry-form') }}",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // console.log(response);
                        round_success_noti(response.message);
                        $('#playerName').val('');
                        $('#player_father_name').val('');
                        $('#whatsappNumber').val('');
                        $('#playerPhone').val('');
                        $('#dob').val('');
                        $('#playerAge').val('');
                        $('#aadharNumber').val('');
                        $('#address').val('');
                        $('#district_id').val('');
                        $('#profileImage').val('');
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) { // Validation error
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(field, messages) {
                                // Loop through each error message for the field
                                $.each(messages, function(index, message) {
                                    round_error_noti(message); // Call your notification function
                                });
                            });
                        } else if (xhr.status === 500) { // Server error
                            alert("Server Error: " + xhr.responseJSON.error);
                        } else {
                            alert("An unknown error occurred.");
                        }
                    }
                });
            });
        });

    </script>
</body>
</html>
