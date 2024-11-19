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
                        <h3 class="card-title text-white">Discount Voucher</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ @$DiscountVoucher }}</h2>
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

                            <p style="margin-top: 14px;"><i class="fa fa-user"></i> <button class="btn btn-sm  btn-info ml-2 my-3 add" type="button">Add Discount Voucher</button></p>


                            <form id="filter-form"
                                style="display:flex; align-items:center;  flex-wrap: nowrap; justify-content: space-between; margin-bottom: 0px;">

                                <label for="from_date" class="me-2 h4"></label>
                                <input type="date" id="from_date" class="me-2 form-control" name="from_date"
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
                            <table class="table table-hover discount-listing table-listing table-hover "
                                style=" width:100%;">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Promo code</th>
                                        <th>Discount</th>
                                        <th>Valid Until</th>
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
        <div class="modal fade" id="addDiscountVoucher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Add Discount Voucher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-dark">
                        <form id="addDiscountVoucherForm" enctype="multipart/form-data">
                            <div id="sending-message" class="text-danger fw-bold"></div>
                            <br>
                            <div class="row d-flex justify-content-center align-items-center">
                                {{-- Add  --}}

                                <div class="row d-flex justify-content-center align-items-center">
                                    <div class="form-group col-md-12">


                                        <label class="control-label">Promo Code</label>
                                        <input type="text" name="promo_code" id="promo_code" class="form-control"
                                            required>
                                        <label class="control-label">Discount</label>
                                        <input type="text" name="discount" id="discount" class="form-control"
                                            required>
                                        <label class="control-label">Valid Until</label>
                                        <input type="date" name="valid_until" id="valid_until" class="form-control"
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
        <div class="modal fade" id="editDiscountVoucher" tabindex="-1" role="dialog" saria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">

                <div class="modal-content ">

                    <div class="modal-header d-flex justify-content-between">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit Discount Voucher</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body text-dark">

                        <input type="hidden" name="discountVoucher_id" id="discountVoucher_id">

                        <div id="update-message" class="text-danger fw-bold"></div>

                        <div class="row d-flex justify-content-center align-items-center">


                            <div class="form-group col-md-12">


                                <label class="control-label">Promo Code</label>
                                <input type="text" name="update_promo_code" id="update_promo_code" class="form-control"
                                    required>
                                <label class="control-label">Discount</label>
                                <input type="text" name="update_discount" id="update_discount" class="form-control"
                                    required>
                                <label class="control-label">Valid Until</label>
                                <input type="date" name="update_valid_until" id="update_valid_until" class="form-control"
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
            var table = $('.discount-listing').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/discount-list') }}",
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
                        data: 'promo_code',
                        name: 'promo_code'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'valid_until',
                        name: 'valid_until'
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
                $('.discount-listing').DataTable().ajax.reload();
            });

        }, 2000);
    });
</script>



{{-- add data --}}
<script>
    $(document).ready(function() {
        $('.add').click(function() {
            $('#addDiscountVoucher').modal('show');
        });

        $('#addDiscountVoucherForm').submit(function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);

            $('#sending-message').text('Processing request, please wait...');

            $.ajax({
                url: "{{ url('/add-discount') }}",
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
                    $('.discount-listing').DataTable().ajax.reload();
                },
                error: function(xhr) {
                    $('#sending-message').text('Error occurred. Please try again.');
                    console.log(xhr.responseText);
                },
                complete: function() {
                    $('#addDiscountVoucher').modal('hide');
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
            var DiscountVoucherId = $(this).val();

            $('#editDiscountVoucher').modal('show');

            $.ajax({
                type: "GET",
                url: "edit-discount/" + DiscountVoucherId,
                success: function(response) {

                    $('#discountVoucher_id').val(DiscountVoucherId);

                    $('#update_promo_code').val(response.DiscountVoucher.promo_code);
                    $('#update_discount').val(response.DiscountVoucher.discount);
                    $('#update_valid_until').val(response.DiscountVoucher.valid_until);


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

            var DiscountVoucher_id = $('#discountVoucher_id').val();

            var promo_code = $('#update_promo_code').val();
            var discount = $('#update_discount').val();
            var valid_until = $('#update_valid_until').val();



            $('#update-message').text('Processing request, please wait...');

            $.ajax({
                url: "{{ url('/update-discount') }}",
                type: 'GET',
                data: {
                    'DiscountVoucher_id': DiscountVoucher_id,
                    'promo_code': promo_code,
                    'discount': discount,
                    'valid_until': valid_until,

                },
                success: function(response) {},

                error: function(xhr) {

                    $('#update-message').text(xhr);
                },
                complete: function() {
                    $('#update-message').text('');
                    $('#editDiscountVoucher').modal('hide');
                    // location.reload();
                    $('.discount-listing').DataTable().ajax.reload();
                }
            });

        });
    });
</script>
