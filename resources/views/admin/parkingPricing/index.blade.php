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
                        <h3 class="card-title text-white">Parking Pricing</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ @$ParkingPricing }}</h2>
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
                                    class="btn btn-sm  btn-info ml-2 my-3 add" type="button">Add parkings pricing</button></p>


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
                            <table class="table table-hover pricing-listing table-listing table-hover "
                                style=" width:100%;">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Airport Name</th>
                                        <th>One day price</th>
                                        <th>Weekly pricing</th>
                                        <th>Monthly pricing</th>
                                        <th>Car Type</th>
                                        <th>created_at</th>
                                        <th>action</th>

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
        <div class="modal fade" id="addParkingPricing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Parking</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        <form id="addParkingPricingForm" enctype="multipart/form-data">
                            <div id="sending-message" class="text-danger fw-bold"></div>
                            <br>
                            <div class="row d-flex justify-content-center align-items-center">
                                {{-- Add  --}}

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="form-group col-md-12">

                                        <label class="control-label">Airport Parking</label>
                                        <select name="airport_parking_id" id="airport_parking_id" class="form-select">
                                            <option value="" selected disabled>Select airport parking</option>
                                            @foreach ($airportParking as $airport)
                                                <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="control-label">One Day pricing</label>
                                        <input type="number" name="oneday" id="oneday" class="form-control"
                                            required>
                                        <label class="control-label">Weekly pricing</label>
                                        <input type="number" name="weekly" id="weekly" class="form-control"
                                            required>
                                        <label class="control-label">Monthly pricing</label>
                                        <input type="number" name="monthly" id="monthly" class="form-control"
                                            required>
                                        <label class="control-label">Car type</label>
                                        <input type="text" name="car_type" id="car_type" class="form-control" placeholder="Select car type. (sedan, suv, bus, van, etc)"
                                            required>

                                    </div>
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
        <div class="modal fade" id="editParkingPricing" tabindex="-1" role="dialog" saria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content ">

                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Parking Pricing</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-dark">

                        <input type="hidden" name="ParkingPricing_id" id="ParkingPricing_id">

                        <div id="update-message" class="text-danger fw-bold"></div>

                        <div class="row d-flex justify-content-center align-items-center">


                            <div class="form-group col-md-12">

                                <label class="control-label">Airport Parking</label>
                                <select name="update_airport_parking_id" id="update_airport_parking_id" class="form-select">
                                    <option value="" selected disabled>Select airport parking</option>
                                    @foreach ($airportParking as $airport)
                                        <option value="{{ $airport->id }}">{{ $airport->name }}</option>
                                    @endforeach
                                </select>
                                <label class="control-label">One Day pricing</label>
                                <input type="number" name="update_oneday" id="update_oneday" class="form-control"
                                    required>
                                <label class="control-label">Weekly pricing</label>
                                <input type="number" name="update_weekly" id="update_weekly" class="form-control"
                                    required>
                                <label class="control-label">Monthly pricing</label>
                                <input type="number" name="update_monthly" id="update_monthly" class="form-control"
                                    required>
                                <label class="control-label">Car type</label>
                                <input type="text" name="update_car_type" id="update_car_type" class="form-control" placeholder="Select car type. (sedan, suv, bus, van, etc)"
                                    required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary float-lg-right " id="updateBtn">Update</button>

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
            var table = $('.pricing-listing').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/parkings-pricing-list') }}",
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
                        data: 'airport.name',
                        name: 'airport.name'
                    },
                    {
                        data: 'oneDay',
                        name: 'oneDay'
                    },
                    {
                        data: 'weekly',
                        name: 'weekly'
                    },
                    {
                        data: 'monthly',
                        name: 'monthly'
                    },
                    {
                        data: 'car_type',
                        name: 'car_type'
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
                $('.pricing-listing').DataTable().ajax.reload();
            });

        }, 2000);
    });
</script>



{{-- add data --}}
<script>
    $(document).ready(function() {
        $('.add').click(function() {
            $('#addParkingPricing').modal('show');
        });

        $('#addParkingPricingForm').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);

            $('#sending-message').text('Processing request, please wait...');

            $.ajax({
                url: "{{ url('/add-parkings-pricing') }}",
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
                    $('.pricing-listing').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    $('#sending-message').text('Error occurred. Please try again.');
                    console.log(xhr.responseText);
                },
                complete: function() {
                    $('#addParkingPricing').modal('hide');
                    $('#sending-message').text('');
                }
            });
        });
    });
</script>




{{--  edit Branch --}}
<script>
    $(document).ready(function() {

        $(document).on('click', '.edit', function() {
            var ParkingPricingId = $(this).val();

            $('#editParkingPricing').modal('show');

            $.ajax({
                type: "GET",
                url: "edit-parkings-pricing/" + ParkingPricingId,
                success: function(response) {

                    $('#ParkingPricing_id').val(ParkingPricingId);

                    $('#update_airport_parking_id').val(response.parkingPricing.airport_parking_id);
                    $('#update_oneday').val(response.parkingPricing.oneDay);
                    $('#update_weekly').val(response.parkingPricing.weekly);
                    $('#update_monthly').val(response.parkingPricing.monthly);
                    $('#update_car_type').val(response.parkingPricing.car_type);

                    // console.log(response);
                    // console.log(response.user.type);

                }
            });
        });
    });
</script>





{{-- update  --}}

<script>
    $(document).ready(function() {
        $('#updateBtn').on('click', function() {

            var ParkingPricing_id = $('#ParkingPricing_id').val();

            var airport_parking_id = $('#update_airport_parking_id').val();
            var oneDay = $('#update_oneday').val();
            var monthly = $('#update_monthly').val();
            var weekly = $('#update_weekly').val();
            var car_type = $('#update_car_type').val();



            $('#update-message').text('Processing request, please wait...');

            $.ajax({
                url: "{{ url('/update-parkings-pricing') }}",
                type: 'GET',
                data: {
                    'ParkingPricing_id': ParkingPricing_id,
                    'airport_parking_id': airport_parking_id,
                    'oneDay': oneDay,
                    'monthly': monthly,
                    'weekly': weekly,
                    'car_type': car_type,

                },
                success: function(response) {},

                error: function(xhr) {

                    $('#update-message').text(xhr);
                },
                complete: function() {
                    $('#update-message').text('');
                    $('#editParkingPricing').modal('hide');
                    // location.reload();
                    $('.pricing-listing').DataTable().ajax.reload();
                }
            });

        });
    });
</script>
