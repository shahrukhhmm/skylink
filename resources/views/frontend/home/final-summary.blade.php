@include('frontend.component.header')


 <!-- Airport Parking Start -->
 <div class="container-fluid reasons py-5">
    <div class="container py-5">

        <!-- Main Title -->
        <!-- <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="display-5 text-white text-capitalize mb-3">Manage Your Booking</h1>
            <p class="mb-0 text-white">Easily find and manage your parking reservations at Manchester
                Airport. Enter
                your details below to locate your booking.</p>
        </div> -->

        <!-- Booking Search Section -->
        <div class="row g-5">

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
                            <p class="mb-0">{{ $data['no_of_days'] }}</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-6">
                            <p class="mb-0">Payable Price</p>
                        </div>
                        <div class="col-6 text-end fw-bold">
                            <p class="mb-0">£{{ $data['price'] }}
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
                    {{-- <div class="row">
                        <div class="col-6">
                            <p class="mb-0">Return Flight Number</p>
                        </div>
                        <div class="col-6 text-end fw-bold">
                            <p class="mb-0">{{ @$data['email'] }}</p>
                        </div>
                    </div> --}}

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
                            {{-- <a href="{{ '/payment/'. @$booking->id }}"  class="w-100 mt-3 btn btn-primary text-center"> Pay Now</a> --}}

                            <a href="{{ route('checkout.session', ['booking' => $booking->id]) }}" class="btn btn-primary">Pay Now</a>


                        </div>

                    </div>


                </div>
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
