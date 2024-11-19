@include('frontend.component.header')
<link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
<style>
 body {
          font-family: Arial, sans-serif;
      }
      .header {
          background-color: #004274;
          color: white;
          padding: 10px;
      }
      .header .car-parks-quoted {
          display: flex;
          align-items: center;
      }
      .header .car-parks-quoted i {
          font-size: 24px;
          margin-right: 10px;
      }
      .header .car-parks-quoted span {
          font-size: 18px;
      }
      .search-bar {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 10px;
          background-color: #f8f9fa;
      }
      .search-bar .form-control {
          max-width: 200px;
      }
      .search-bar .btn {
          background-color: #004274;
          color: white;
      }
      .filter-bar {
          display: flex;
          justify-content: space-between;
          align-items: center;
          padding: 10px;
          background-color: #f8f9fa;
      }
      .filter-bar .btn-group .btn {
          background-color: #f0ad4e;
          color: white;
      }
      .filter-bar .btn-group .btn.active {
          background-color: #f0ad4e;
      }
      .filter-bar .dropdown .btn {
          background-color: #f8f9fa;
          color: #004274;
      }
      .card {
          margin: 10px 0;
      }
      .card .card-body {
          display: flex;
          justify-content: space-between;
      }
      .card .card-body .left-section {
          max-width: 60%;
      }
      .card .card-body .right-section {
          text-align: right;
      }
      .card .card-body .right-section .price {
          font-size: 24px;
          color: #004274;
      }
      .card .card-body .right-section .btn {
          background-color: #004274;
          color: white;
      }
      .card .card-body .right-section .extras {
          background-color: #f0ad4e;
          color: white;
      }
</style>


<div class="container-fluid p-0 m-0">
    <!-- Airport Parking Start -->
    <div class="container-fluid reasons py-5">
        <div class="container py-5">
            <!-- Booking Search Section -->
            <div class="row g-5">
                {{-- <div class="col-md-8 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-5 rounded bg-light">
                        <h5 class="mb-4 text-center">Your Details</h5>

                        <form action="{{ url('/booking-detail-save') }}" method="POST">
                            @csrf
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="hidden" name="booking_id" value="{{@$booking->id}}" >
                                        <input type="hidden" name="price" value="{{ @$price}}" >
                                        <input type="hidden" name="no_of_days" value="{{ @$numberOfDays}}" >
                                        <input type="text" class="form-control" id="full-name" name="fullName"
                                            placeholder="Full Name" required>
                                        <label for="full-name">Full Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="tel" class="form-control" id="mobile" name="mobile"
                                            placeholder="Mobile Number" required>
                                        <label for="">Mobile Number</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Email" required>
                                        <label for="">Email</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="number_of_bags" name="number_of_bags"
                                            placeholder="Number of Large Begs" required>
                                        <label for="">Number of Large Begs</label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-floating">

                                        <input type="text" class="form-control" id="any_special_instruction" name="any_special_instruction"
                                            placeholder="Any Special Instructions" required>
                                        <label for="">Any Special Instructions</label>
                                    </div>
                                </div>

                                <h5 class="mb-4 text-center">Vehicle Details</h5>

                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="crusie_ship_number" name="crusie_ship_number"
                                            placeholder="eg. lona" required>
                                        <label for="">Crusie Ship Name</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="car_make_and_model" name="car_make_and_model"
                                            placeholder="eg. BMW 2023" required>
                                        <label for="">Car Make And Model</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="registration" name="registration"
                                            placeholder="eg. MVII 1234" required>
                                        <label for="">Registration</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="number_of_passengers" name="number_of_passengers"
                                            placeholder="Number of passengers" required>
                                        <label for="">Number of passengers</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                        <p class="mt-3 text-center text-muted">If you have any issues finding your booking,
                            please contact
                            our support team.</p>
                    </div>
                </div>

                <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="p-5 rounded bg-light">
                        <h5 class="mb-4 text-center">Booking Summary</h5>

                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0">Departure Date</p>
                            </div>
                            <div class="col-6 text-end fw-bold">
                                <p class="mb-0">{{ @$booking->dropoff_date }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0">Departure Time</p>
                            </div>
                            <div class="col-6 text-end fw-bold">
                                <p class="mb-0">{{ @$booking->dropoff_time}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0">Return Date</p>
                            </div>
                            <div class="col-6 text-end fw-bold">
                                <p class="mb-0">{{ @$booking->pickup_date }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0">Return Time</p>
                            </div>
                            <div class="col-6 text-end fw-bold">
                                <p class="mb-0">{{ @$booking->pickup_time }}</p>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0">No. of Days</p>
                            </div>
                            <div class="col-6 text-end fw-bold">
                                <p class="mb-0">{{ @$numberOfDays }}</p>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <p class="mb-0">Payable Price</p>
                            </div>
                            <div class="col-6 text-end fw-bold">
                                <p class="mb-0">£{{ @$price }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="header">
                    <div class="container">
                        <div class="car-parks-quoted">
                            <i class="fas fa-car">
                            </i>
                            <span>
                                {{ @$city->name }}
                            </span>
                        </div>
                    </div>
                </div>
                <form class="bg-white  m-0" action="{{ url('/search-parking') }}" method="GET">
                    <input class="form-control mt-2" placeholder="Enter voucher" type="text" name="city_id" value="{{ @$data['voucher'] }}" />
                    <div class="search-bar container">
                        <br>

                        <div class="input-group">
                            <span class="input-group-text">
                            <i class="fas fa-calendar-alt">
                            </i>
                            </span>
                            <input class="form-control" placeholder="Drop Off Date &amp; Time" type="hidden" name="city_id" value="{{ @$data['city_id'] }}" />
                            <input class="form-control" placeholder="Drop Off Date &amp; Time" type="date" name="dropoff_date" value="{{ @$data['dropoff_date'] }}" />
                            <input class="form-control" placeholder="19:15" type="time" name="dropoff_time" value="{{ @$data['dropoff_time'] }}"/>
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">
                            <i class="fas fa-calendar-alt">
                            </i>
                            </span>
                            <input class="form-control" placeholder="Pick Up Date &amp; Time" type="date" name="pickup_date" value="{{ @$data['pickup_date'] }}" />
                            <input class="form-control" placeholder="12:00" type="time" name="pickup_time" value="{{ @$data['pickup_time'] }}" />
                        </div>
                        <button class="btn">
                        <i class="fas fa-search">
                        </i>
                        SEARCH
                        </button>
                    </div>
                </form>
                <div class="filter-bar container">
                    <div class="dropdown">
                        <button aria-expanded="false" class="btn dropdown-toggle" data-bs-toggle="dropdown" id="dropdownMenuButton" type="button">
                        Order By
                        </button>
                        <ul aria-labelledby="dropdownMenuButton" class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    Price - low to high
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    Price - high to low
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    Distance
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- detail --}}

                @if($airport != null)
                @foreach ($airport as $item)
                    <div class="container col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="left-section col-md-8">
                                    <h5 class="card-title">{{ @$item->name }}</h5>
                                    <p class="card-text">
                                        <i class="fas fa-map-marker-alt"></i>
                                        {{ @$item->location }}
                                    </p>
                                    <img alt="APH Self Park logo" class="img-fluid" height="50" src="{{ url(@$item->logo) }}" width="100"/>
                                    <p class="card-text">
                                        @php
                                            $pointsArray = explode(',', $item->points);
                                        @endphp

                                        @foreach ($pointsArray as $point)
                                            <i class="fas fa-arrow-right p-1" style="font-size:10px; border:2px solid black; border-radius:50%;"></i>
                                            <span class="px-2">{{ $point }}</span> <br>
                                        @endforeach
                                    </p>
                                </div>
                                <div class="right-section col-md-4">
                                    <p class="price">
                                        ${{ @$item->price }}
                                    </p>
                                    <p>Price for {{ @$item->days }} days parking</p>
                                    <p>
                                        <i class="fas fa-clock"></i>
                                        Last booked
                                        {{ $item->last_time_booked == null ? 0 : @$item->last_time_booked }} hours ago
                                    </p>
                                    <p class="btn extras">
                                        <span class="text-danger">EXTRAS</span>
                                        <br>
                                        @php
                                            $extra = explode(',', $item->extra_json);
                                        @endphp

                                        @foreach ($extra as $extraItem)
                                            <i class="fas fa-check"></i>
                                            {{ $extraItem }}
                                        @endforeach
                                    </p><br>

                                    <!-- Form to send data -->
                                    <form action="{{ url('/book-parking-form') }}" method="GET">

                                        <input type="hidden" name="airport_id" value="{{ $item->id }}">
                                        <input type="hidden" name="city_id" value="{{ @$data['city_id'] }}">
                                        <input type="hidden" name="dropoff_date" value="{{ @$data['dropoff_date'] }}">
                                        <input type="hidden" name="dropoff_time" value="{{ @$data['dropoff_time'] }}">
                                        <input type="hidden" name="pickup_date" value="{{ @$data['pickup_date'] }}">
                                        <input type="hidden" name="pickup_time" value="{{ @$data['pickup_time'] }}">

                                        <button type="submit" class="btn btn-primary mt-2">
                                            BOOK NOW
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="container col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="left-section">
                                <h5 class="card-title">No airport parking found</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endif






            </div>
        </div>
    </div>
    <!-- Airport Parking End -->

</div>



    @include('frontend.component.footer')

    <!-- Join Modal Start -->

    @include('frontend.component.join-model')

    <!-- Join Modal End -->

    <!-- Add this script to handle form submission -->

</div>


@include('frontend.component.script')

<script crossorigin="anonymous" integrity="sha384-oBqDVmMz4fnFO9gybBogGz1p6y4e/2D5p4rF+8rKELT3hZ5i1P6jktOnlC7BzBfQ" src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js">
</script>
