@include('admin.component.header')
@include('admin.component.topnav')
@include('admin.component.navbar')



<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body " >

    <div class="container-fluid mt-3">

        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body" >
                        <h3 class="card-title text-white">{{ __('SE.users') }}</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$user}}</h2>
                           <a class="m-0 p-0" href="{{url('/user')}}"> <p class="text-white mb-0">{{ __('SE.users') }} <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body" >
                        <h3 class="card-title text-white">Airport Parking</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$airport_parking}}</h2>
                           <a class="m-0 p-0" href="{{url('/airport-parkings')}}"> <p class="text-white mb-0">Airport Parking <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fas fa-parking"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-9">
                    <div class="card-body" >
                        <h3 class="card-title text-white">Parkings Pricing</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$parking_pricing}}</h2>
                           <a class="m-0 p-0" href="{{url('/parkings-pricing')}}"> <p class="text-white mb-0">Parkings Pricing <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fas fa-hand-holding-usd"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-8">
                    <div class="card-body" >
                        <h3 class="card-title text-white">Discount</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$discount_voucher}}</h2>
                           <a class="m-0 p-0" href="{{url('/discount')}}"> <p class="text-white mb-0">Discount <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fas fa-user-tag"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-7">
                    <div class="card-body" >
                        <h3 class="card-title text-white">Booking</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$booking}}</h2>
                           <a class="m-0 p-0" href="{{url('/booking-data-admin')}}"> <p class="text-white mb-0">Booking <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fas fa-book"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body" >
                        <h3 class="card-title text-white">City</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{$city}}</h2>
                           <a class="m-0 p-0" href="{{url('/city')}}"> <p class="text-white mb-0">City <i class="fa-solid fa-arrow-right m-2"></i></p></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fas fa-city"></i></span>
                    </div>
                </div>
            </div>
        </div>




    </div>

    <div class="row" >
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card" >
                        <div class="row">
                            <div class="col-md-12" >

                                <div id="totalBookingPerDay" style="height: 370px; width: 100%; maargin:auto"></div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-12 mx-auto">
                    <div class="card" >
                        <div class="row">
                            <div class="col-md-6" >

                                <div id="bookingStatusChart" style="height: 370px; width: 100%; margin-top: 30px;"></div>

                            </div>
                            <div class="col-md-6" >

                                <div id="airportParkingChart" style="height: 370px; width: 100%; margin-top: 30px;"></div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->


@include('admin.component.footer')


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<script>
    window.onload = function() {
        // Line Chart for Total Booking Per Day
        var totalBookingPerDay = new CanvasJS.Chart("totalBookingPerDay", {
            animationEnabled: true,
            theme: "light1",
            title:{
                text: "Total Booking Per Day"
            },
            axisX: {
                title: "Date"
            },
            axisY: {
                title: "Number of Bookings",
                includeZero: false
            },
            data: [{
                type: "line",
                xValueFormatString: "YYYY-MM-DD",
                yValueFormatString: "#,##0 bookings",
                dataPoints: [
                    @foreach($bookingData as $data)
                        { x: new Date("{{ $data->date }}"), y: {{ $data->total }} },
                    @endforeach
                ]
            }]
        });

        totalBookingPerDay.render();

        // Doughnut Chart for Booking Statuses
        var bookingStatusChart = new CanvasJS.Chart("bookingStatusChart", {
            animationEnabled: true,
            theme: "light4",
            title:{
                text: "Booking Status Distribution"
            },
            data: [{
                type: "doughnut",
                yValueFormatString: "#,##0 bookings",
                indexLabel: "{label} ({y})",
                dataPoints: [
                    @foreach($bookingStatusData as $data)
                        { label: "{{ ucfirst($data->status) }}", y: {{ $data->total }} },
                    @endforeach
                ]
            }]
        });

        bookingStatusChart.render();

        // Doughnut Chart for Airport Parking Distribution
        var airportParkingChart = new CanvasJS.Chart("airportParkingChart", {
            animationEnabled: true,
            theme: "light1",
            title:{
                text: "Airport Parking by Name"
            },
            data: [{
                type: "pie",
                yValueFormatString: "#,##0 spaces",
                indexLabel: "{label} ({y})",
                dataPoints: [
                    @foreach($airportParkingData as $data)
                        { label: "{{ $data->name }}", y: {{ $data->total }} },
                    @endforeach
                ]
            }]
        });

        airportParkingChart.render();
    }
</script>
