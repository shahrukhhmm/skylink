@include('frontend.component.header')
<style>
    /* body {
        background-color: #f5f5f5;
    } */
    .container-form {
        background-color: #ffffff;
        padding: 20px;
        margin-top: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-section {
        margin-bottom: 20px;
    }
    .form-section h5 {
        color: #007bff;
        margin-bottom: 10px;
    }
    .form-section label {
        font-weight: bold;
    }
    .form-section .form-control {
        margin-bottom: 10px;
    }
    .btn-yellow {
        background-color: #ffc107;
        color: #fff;
    }
    .btn-yellow:hover {
        background-color: #e0a800;
    }
    .btn-blue {
        background-color: #007bff;
        color: #fff;
    }
    .btn-blue:hover {
        background-color: #0056b3;
    }
    .summary {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        margin-top: 20px;
    }
    .summary h6 {
        font-weight: bold;
    }
    .summary .price {
        font-size: 1.5em;
        color: #28a745;
    }
    .summary .total {
        font-size: 1.2em;
        font-weight: bold;
    }
    .summary .terms {
        font-size: 0.9em;
        color: #6c757d;
    }
</style>


 <!-- Airport Parking Start -->
 <div class="container-fluid reasons py-5">
    <div class="container py-5">

        <!-- Booking Search Section -->
        {{-- <div class="row g-5">

            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
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
                            <p class="mb-0">{{ @$data['no_of_days'] }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <p class="mb-0">Payable Price</p>
                        </div>
                        <div class="col-6 text-end fw-bold">
                            <p class="mb-0">£{{ @$data['price'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="p-5 rounded bg-light">
                    <h5 class="mb-4 text-center">Customer Detail</h5>

                    <hr>

                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Name</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['fullName'] }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Contact</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['mobile'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['email'] }}</p>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Large Begs</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['number_of_bags'] }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Total Passengers</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['number_of_passengers'] }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Car Make and Model</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['car_make_and_model'] }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Registration Number</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['registration'] }}
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <p class="mb-0">Instructions</p>
                        </div>
                        <div class="col-8 text-end fw-bold">
                            <p class="mb-0">{{ @$data['any_special_instruction'] }}
                            </p>
                        </div>
                    </div>


                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <p class="mb-0">By booking your cruise parking means you agree to our terms and conditions.</p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-12">

                        </div>

                    </div>


                </div>
            </div>
        </div> --}}


        <div class="container-form row">

                <form action="{{ url('/booking-save')  }}" method="POST" >
                    @csrf
                    <input type="hidden" name="airport_id" value="{{ $data['airport_id'] }}">
                    <input type="hidden" name="dropoff_date" value="{{ @$data['dropoff_date'] }}">
                    <input type="hidden" name="dropoff_time" value="{{ @$data['dropoff_time'] }}">
                    <input type="hidden" name="pickup_date" value="{{ @$data['pickup_date'] }}">
                    <input type="hidden" name="pickup_time" value="{{ @$data['pickup_time'] }}">

                    <div class="form-section">
                    <h5>
                    Email confirmation to
                    </h5>
                    <label for="email">
                    Email
                    </label>
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email"/>
                    <small class="form-text text-muted">
                    Your booking confirmation, directions, important pre-travel information will be sent to the booking email address.
                    </small>
                    </div>
                    <div class="form-section">
                    <h5>
                    Customer information
                    </h5>
                    <div class="row">

                        <div class="col-md-6">
                            <label for="lastName">
                                Full name
                            </label>
                            <input class="form-control" id="fullName" name="fullName"  placeholder="full name" type="text"/>
                        </div>
                        <div class="col-md-6">
                            <label for="mobileNumber">
                                Mobile number
                                </label>
                                <input class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Mobile number" type="text"/>
                        </div>
                    </div>

                    </div>
                    <div class="form-section">
                    <h5>
                    Your car details
                    </h5>
                    <div class="row">
                    <div class="col-md-4">
                    <label for="registration">
                        Registration
                    </label>
                    <div class="input-group">
                        <input class="form-control" id="registration" name="registration"  placeholder="YOUR REG" type="text"/>

                    </div>
                    </div>
                    <div class="col-md-2">
                    <label for="passengers">
                        Passengers
                    </label>
                    <select class="form-control" id="passengers" name="passengers">
                        <option>
                        1
                        </option>
                        <option>
                        2
                        </option>
                        <option>
                        3
                        </option>
                        <option>
                        4
                        </option>
                    </select>
                    </div>
                    <div class="col-md-2">
                    <label for="make">
                        Make
                    </label>
                    <input class="form-control" id="make" placeholder="Make" name="make" type="text"/>
                    </div>
                    <div class="col-md-2">
                    <label for="model">
                        Model
                    </label>
                    <input class="form-control" name="model" id="model" placeholder="Model" type="text"/>
                    </div>
                    <div class="col-md-2">
                    <label for="colour">
                        Colour
                    </label>
                    <input class="form-control" name="colour" id="colour" placeholder="Colour" type="text"/>
                    </div>
                    </div>
                    </div>
                    <div class="form-section">
                    <h5>
                    Flight details (optional)
                    </h5>
                    <small class="form-text text-muted">
                    Confirm flight details when dropping off your vehicle or add now to save time.
                    </small>
                    <div class="row">
                    <div class="col-md-3">
                    <label for="terminalOut">
                        Terminal out
                    </label>
                    <input class="form-control" name="terminalOut" id="terminalOut" placeholder="Ternimal" type="text"/>

                    </div>
                    <div class="col-md-3">
                    <label for="outboundFlightNumber">
                        Outbound flight number
                    </label>
                    <input class="form-control" id="outboundFlightNumber" name="outboundFlightNumber" placeholder="Outbound flight number" type="text"/>
                    </div>
                    <div class="col-md-3">
                    <label for="terminalIn">
                        Terminal in
                    </label>
                    <input class="form-control" name="terminalIn" id="terminalIn" placeholder="terminal In" type="text"/>

                    </div>
                    <div class="col-md-3">
                    <label for="inboundFlightNumber">
                        Inbound flight number
                    </label>
                    <input class="form-control" id="inboundFlightNumber" name="inboundFlightNumber" placeholder="Inbound flight number" type="text"/>
                    </div>
                    </div>
                    </div>
                    <div class="form-section">
                    <h5>
                    For your peace of mind
                    </h5>
                    <button class="btn btn-yellow" type="button">
                    EXTRAS
                    </button>
                    <button class="btn btn-blue" type="button">
                    FREE SMS
                    </button>
                    <small class="form-text text-muted">
                    Your SMS message will show your name, contact no. and the car park postcode (for satnav), along with booking times and booking confirmation number.
                    </small>
                    </div>
                    <button class="btn btn-blue btn-lg btn-block" type="submit">
                    CONFIRM AND PAY
                    </button>
                </form>


            <div class="summary" >
                <h6>
                {{ @$airport->name }}
                </h6>
                <p>
                {{ $city->name }}
                </p>

                <p>
                Off Airport
                </p>
                <img alt="APH Self Park logo" height="50" src=" {{ url(@$airport->logo) }}" width="150"/>
                <p>
                From  {{ @$airport->dropoff_date }} at {{ @$airport->dropoff_time }}
                <br/>
                To {{ @$airport->pickup_date }} at {{ @$airport->pickup_time }}
                </p>

                {{-- <p class="price">
                ${{ @$airport->price }}
                </p>
                <p>
                + SMS Confirmation
                <span class="text-success">
                FREE
                </span>
                </p> --}}

                <p class="total">
                Total to Pay
                <span class="text-success">
                    ${{ @$airport->price }}
                </span>
                </p>
                <p class="terms">
                On making payment you agree to our booking terms and conditions.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Airport Parking End -->


    @include('frontend.component.footer')

    <!-- Join Modal Start -->

    @include('frontend.component.join-model')

    <!-- Join Modal End -->

    <!-- Add this script to handle form submission -->

</div>


@include('frontend.component.script')
