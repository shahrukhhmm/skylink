@include('admin.component.header')
{{-- @include('admin.component.style') --}}
@include('admin.component.topnav')
@include('admin.component.navbar')


<div class="content-body">
    <div class="container-fluid mt-3">

        <div class="row">

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Contact</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ @$AirportParking }}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>

        </div>


        <div class="row mt-4">
            <div class="col">
                <div class="card" style="overflow:auto; width:100% !important;">
                    <div class="card-header">
                        <div class="col-md-12"
                            style="background:white;  display: flex;  flex-wrap: wrap; flex-direction: row; justify-content: space-between;">

                            <p style="margin-top: 14px;"><i class="fa fa-user"></i> <button
                                    class="btn btn-sm  btn-info ml-2 my-3 add" type="button">Add Airport parking</button></p>


                            <form id="filter-form"
                                style="display:flex; align-items:center;  flex-wrap: nowrap; justify-content: space-between; margin-bottom: 0px;">

                                <label for="from_date" class="me-2 h4"></label>
                                <input type="date" id="from_date"class="me-2 form-control" name="from_date"
                                    style="width:40%;">

                                <label for="to_date" class="me-2 h4">-</label>
                                <input type="date" id="to_date" class="me-2 form-control" name="to_date"
                                    style="width:40%;">

                                <button type="submit" class=" me-2 btn btn-primary" style="padding: 9px;"><i
                                        class="fas fa-check"></i></button>

                            </form>

                        </div>

                    </div>


                    <div class="card-body" v-cloak>

                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> &nbsp;

                                {{ session()->get('message') }}

                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        <div class="table-responsive">
                            <table class="table table-hover airport-listing table-listing table-hover "
                                style=" width:100%;">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>City Name</th>
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Location</th>
                                        <th>Logo</th>

                                        <th>Price</th>
                                        <th>Days</th>
                                        <th>Status</th>
                                        <th>Last time booked</th>
                                        <th>Created At</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>



                    </div>


                </div>
            </div>
        </div>




        {{-- add user --}}
        <div class="modal fade" id="addAirportParking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Add AirPort Parking</h5>
                        {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button> --}}
                    </div>
                    <div class="modal-body text-dark">
                        <form id="addAirportParkingForm" enctype="multipart/form-data">
                            <div id="sending-message" class="text-danger fw-bold"></div>
                            <br>
                            <div class="row d-flex justify-content-center align-items-center">
                                {{-- Add Brnach  --}}

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="col-md-6">

                                        <label class="control-label">City</label>
                                      <select name="city_id" id="city_id" class="form-select">
                                        <option value="" disabled selected>Select city </option>

                                        @foreach ($city as $c)
                                            <option value="{{ @$c->id }}">{{ @$c->name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Name</label>
                                        <input type="name" name="name" id="name" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Code</label>
                                        <input type="text" name="code" id="code" class="form-control"
                                            required>
                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Location</label>
                                        <input type="text" name="location" id="location" class="form-control"
                                            required>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Logo</label>
                                        <input type="file" name="logo" id="logo" class="form-control"
                                            required>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Price</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            required>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Days</label>
                                        <input type="text" name="days" id="days" class="form-control"
                                            required>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Points <small>Enter the comma saperated value</small></label>
                                        <textarea name="points" id="points" class="form-control" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Extras <small>Enter the comma saperated value</small></label>
                                        <textarea name="extra_json" id="extra_json" class="form-control" cols="30" rows="10"></textarea>

                                    </div>
                                    {{-- <div class="col-md-6">

                                        <label class="control-label">Summary overview </label>
                                        <textarea name="summary_overview" id="summary_overview" class="form-control" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">On arrival</label>
                                        <textarea name="on_arrival" id="on_arrival" class="form-control" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">On return</label>
                                        <textarea name="on_return" id="on_return" class="form-control" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Important</label>
                                        <textarea name="important" id="important" class="form-control" cols="30" rows="10"></textarea>

                                    </div>
                                    <div class="col-md-6">

                                        <label class="control-label">Reviews</label>
                                        <textarea name="reviews" id="reviews" class="form-control" cols="30" rows="10"></textarea>

                                    </div> --}}
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>




        {{-- update  --}}
        <div class="modal fade" id="editAirportParking" tabindex="-1" role="dialog" saria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content ">

                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Airport Parking</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-dark">
                        <form id="editAirportParkingForm" enctype="multipart/form-data">
                            <input type="hidden" name="airportParking_id" id="airportParking_id">
                            <div id="update-message" class="text-danger fw-bold"></div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">City</label>
                                    <select name="city_id" id="update_city_id" class="form-select">
                                        <option value="" disabled selected>Select city</option>
                                        @foreach ($city as $c)
                                            <option value="{{ @$c->id }}">{{ @$c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Name</label>
                                    <input type="text" name="name" id="update_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Code</label>
                                    <input type="text" name="code" id="update_code" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Location</label>
                                    <input type="text" name="location" id="update_location" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Logo</label>
                                    <input type="file" name="logo" id="update_logo" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Price</label>
                                    <input type="text" name="price" id="update_price" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Days</label>
                                    <input type="text" name="days" id="update_days" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Points</label>
                                    <textarea name="points" id="update_points" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Extras</label>
                                    <textarea name="extra_json" id="update_extra_json" class="form-control"></textarea>
                                </div>
                                {{-- <div class="col-md-6">
                                    <label class="control-label">Summary Overview</label>
                                    <textarea name="summary_overview" id="update_summary_overview" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">On Arrival</label>
                                    <textarea name="on_arrival" id="update_on_arrival" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">On Return</label>
                                    <textarea name="on_return" id="update_on_return" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Important</label>
                                    <textarea name="important" id="update_important" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Reviews</label>
                                    <textarea name="reviews" id="update_reviews" class="form-control"></textarea>
                                </div> --}}
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="updateBtn">Update</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>



@include('admin.component.footer')


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js" defer></script>

<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js" defer></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">




{{-- data table  --}}
<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            var table = $('.airport-listing').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/airport-parkings-list') }}",
                    data: function(d) {
                        d.from_date = $('#from_date').val();
                        d.to_date = $('#to_date').val();
                    }
                },

                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'city.name',
                        name: 'city.name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'location',
                        name: 'location'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'logo',
                        name: 'logo'
                    },
                    {
                        data: 'days',
                        name: 'days'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },

                    {
                        data: 'last_time_booked',
                        name: 'last_time_booked'
                    },

                    {
                        data: 'created_by',
                        name: 'created_by'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [0, 'desc']
                ],
            });

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                $('.airport-listing').DataTable().ajax.reload();
            });

        }, 2000);
    });
</script>



{{-- add data --}}
<script>
    $(document).ready(function() {
        $('.add').click(function() {
            $('#addAirportParking').modal('show');
        });

        $('#addAirportParkingForm').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);

            $('#sending-message').text('Processing request, please wait...');

            $.ajax({
                url: "{{ url('/add-airport-parkings') }}",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#sending-message').text(response.success);
                    // Reload the DataTable or update the UI as necessary
                    $('.airport-listing').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    $('#sending-message').text('Error occurred. Please try again.');
                    console.log(xhr.responseText);
                },
                complete: function() {
                    $('#addAirportParking').modal('hide');
                    $('#sending-message').text('');
                }
            });
        });
    });
</script>




{{--  edit Branch --}}
<script>
    $(document).ready(function() {

        $(document).on('click', '.edit', function () {
    var airportParkingId = $(this).val();

    $('#editAirportParking').modal('show');

    $.ajax({
        type: "GET",
        url: "edit-airport-parkings/" + airportParkingId,
        success: function (response) {
            $('#airportParking_id').val(response.airportParking.id);
            $('#update_city_id').val(response.airportParking.city_id);
            $('#update_name').val(response.airportParking.name);
            $('#update_code').val(response.airportParking.code);
            $('#update_location').val(response.airportParking.location);
            $('#update_price').val(response.airportParking.price);
            $('#update_days').val(response.airportParking.days);
            $('#update_points').val(response.airportParking.points);
            $('#update_extra_json').val(response.airportParking.extra_json);
            // $('#update_summary_overview').val(response.airportParking.summary_overview);
            // $('#update_on_arrival').val(response.airportParking.on_arrival);
            // $('#update_on_return').val(response.airportParking.on_return);
            // $('#update_important').val(response.airportParking.important);
            // $('#update_reviews').val(response.airportParking.reviews);
        }
    });
});
    });
</script>





{{-- update  --}}

<script>
   $(document).ready(function () {
    $('#updateBtn').on('click', function (e) {
        e.preventDefault();

        var formData = new FormData($('#editAirportParkingForm')[0]);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ url('/update-airport-parkings') }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert('Airport Parking updated successfully!');
                $('#editAirportParking').modal('hide');
                $('.airport-listing').DataTable().ajax.reload();
            },
            error: function (xhr) {
                alert('Error occurred while updating: ' + xhr.responseJSON.message);
            }
        });
    });
});
</script>
