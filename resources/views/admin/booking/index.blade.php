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
                        <h3 class="card-title text-white">Booking</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{@$booking}}</h2>
                            {{-- <p class="text-white mb-0">Jan - March 2019</p> --}}
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-booking"></i></span>
                    </div>
                </div>
            </div>

        </div>


        <div class="row mt-4">
            <div class="col">
                <div class="card" style="overflow:auto; width:100% !important;">
                    <div class="card-header">
                        <div  class="col-md-12" style="background:white;  display: flex;  flex-wrap: wrap; flex-direction: row; justify-content: space-between;">

                            {{-- <p style="margin-top: 14px;"><i class="fa fa-user"></i>  <button class="btn btn-sm  btn-info ml-2 my-3 add" type="button">{{ __('SE.add_user') }}</button></p> --}}

                            <p></p>

                            <form id="filter-form" style="display:flex; align-items:center;  flex-wrap: nowrap; justify-content: space-between; margin-bottom: 0px;">

                                <label for="from_date" class="me-2 h4"  ></label>
                                <input type="date" id="from_date"class="me-2 form-control"   name="from_date"  style="width:40%;">

                                <label for="to_date" class="me-2 h4" >-</label>
                                <input type="date" id="to_date" class="me-2 form-control" name="to_date"  style="width:40%;">

                                <button type="submit" class=" me-2 btn btn-primary" style="padding: 9px;"><i class="fas fa-check"></i></button>

                            </form>

                        </div>

                    </div>


                    <div class="card-body" v-cloak>

                        @if (session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success</strong> &nbsp; {{ session()->get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif



                        <div class="table-responsive">
                            <table class="table table-hover booking-listing table-listing table-hover " style=" width:100%;">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Airport Name</th>
                                        <th>Drop Off Date</th>
                                        <th>Drop Off Time</th>
                                        <th>Pick up Date</th>
                                        <th>Pick up Time</th>
                                        <th>Voucher</th>
                                        <th>Email </th>
                                        <th>Full Name</th>
                                        <th>Mobile number</th>
                                        <th>Registration </th>
                                        <th>Passengers </th>
                                        <th>Make </th>
                                        <th>Model</th>
                                        <th>Colour </th>
                                        <th>Terminal Out </th>
                                        <th>Out bound flight number </th>
                                        <th>Terminal in </th>
                                        <th>In bound Flight number </th>
                                        <th>Booking Payment </th>
                                        <th>Total Payment </th>
                                        <th>Status </th>

                                        <th>Created at</th>
                                        <th>ACtion</th>

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






    {{-- update  --}}
    <div class="modal fade" id="editBooking" tabindex="-1" role="dialog" saria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">

            <div class="modal-content ">

                <div class="modal-header d-flex justify-content-between">
                    <h5 class="modal-title text-dark" id="exampleModalLabel">{{ __('SE.edit_user') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-dark">

                    <input type="hidden" name="booking_id" id="booking_id">

                    <div id="update-message" class="text-danger fw-bold"></div>

                    <div class="row d-flex justify-content-center align-items-center">


                        <div class="form-group col-md-12">

                                <label class="control-label">Status</label>
                                <select name="update_status" id="update_status" class="form-select">

                                    <option value="pending">Pending</option>
                                    <option value="complete">Complete</option>
                                    <option value="cancel">Cancel</option>


                                </select>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-lg-right " id="updateBtn">{{ __('SE.submit') }}</button>

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





<script type="text/javascript">
    $(function() {
        setTimeout(function() {
            var table = $('.booking-listing').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/booking-data-admin-list') }}",
                    data: function(d) {
                        d.from_date = $('#from_date').val();
                        d.to_date = $('#to_date').val();
                    }
                },

                columns: [{
                        data: 'id',
                        name: 'id'
                    },

                    {
                        data: 'airport.name',
                        name: 'airport.name'
                    },
                    {
                        data: 'dropoff_date',
                        name: 'dropoff_date'
                    },
                    {
                        data: 'dropoff_time',
                        name: 'dropoff_time'
                    },
                    {
                        data: 'pickup_date',
                        name: 'pickup_date'
                    },
                    {
                        data: 'pickup_time',
                        name: 'pickup_time'
                    },
                    {
                        data: 'voucher',
                        name: 'voucher'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'fullName',
                        name: 'fullName'
                    },
                    {
                        data: 'mobileNumber',
                        name: 'mobileNumber'
                    },
                    {
                        data: 'registration',
                        name: 'registration'
                    },
                    {
                        data: 'passengers',
                        name: 'passengers'
                    },
                    {
                        data: 'make',
                        name: 'make'
                    },
                    {
                        data: 'model',
                        name: 'model'
                    },
                    {
                        data: 'colour',
                        name: 'colour'
                    },
                    {
                        data: 'terminalOut',
                        name: 'terminalOut'
                    },
                    {
                        data: 'outboundFlightNumber',
                        name: 'outboundFlightNumber'
                    },
                    {
                        data: 'terminalIn',
                        name: 'terminalIn'
                    },
                    {
                        data: 'inboundFlightNumber',
                        name: 'inboundFlightNumber'
                    },
                    {
                        data: 'booking_payment',
                        name: 'booking_payment'
                    },

                    {
                        data: 'total_payment',
                        name: 'total_payment'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'created',
                        name: 'created'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [[0, 'desc']],
            });

            $('#filter-form').on('submit', function(e) {
                e.preventDefault();
                $('.booking-listing').DataTable().ajax.reload();
            });

        }, 2000);
    });
</script>





{{--  edit  --}}
<script>
    $(document).ready(function() {

        $(document).on('click', '.edit', function() {
            var booking_id = $(this).val();

            $('#editBooking').modal('show');

            $.ajax({
                type: "GET",
                url: "edit-booking/" + booking_id,
                success: function(response) {
                    $('#booking_id').val(booking_id);

                    $('#update_status').val(response.booking.status);

                }
            });
        });
    });
</script>





{{-- update country --}}

<script>
    $(document).ready(function() {
        $('#updateBtn').on('click', function() {

            var booking_id = $('#booking_id').val();
            var status = $('#update_status').val();

            $('#update-message').text('Processing request, please wait...');

            $.ajax({
                url: "{{ url('/update-booking') }}",
                type: 'GET',
                data: {
                    'booking_id': booking_id,
                    'status': status,
                },
                success: function(response) {},

                error: function(xhr) {

                    $('#update-message').text(xhr);
                },
                complete: function() {
                    $('#update-message').text('');
                    $('#editBooking').modal('hide');
                    // location.reload();
                    $('.booking-listing').DataTable().ajax.reload();
                }
            });

        });
    });
</script>
