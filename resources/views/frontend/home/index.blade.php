@include('frontend.component.header')

        <div class="container-fluid p-0 m-0">
            <!-- Carousel Start -->
            <!-- Simplified Header Section without Carousel -->
            <div class="container-fluid steps bg-dark text-white">
                <div class="container py-5">
                    <div class="row g-5 align-items-center justify-content-center">
                        <div class="col-lg-11 py-5">
                            <!-- New Form Section -->
                            <div class="rounded p-5"
                                style="background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)); background-size: cover; background-position: center;">
                                <h4 class="text-white text-center mb-4">Get 15% Off Your Rental <br> Plan your trip now
                                    and enjoy
                                    great savings!</h4>
                                <form action="{{ url('/search-parking') }}" method="GET">
                                    {{-- @csrf --}}
                                    <div class="row g-3 mt-3">
                                        <!-- Airport Name -->
                                        <div class="col-md-4 col-lg-2">
                                            <label for="airport-name" class="form-label text-white">Airport</label>
                                            <select id="city_name" name="city_id" class="form-select" required>
                                                <option value="" selected disabled>Select Airport City</option>
                                                @foreach($city as $c)
                                                <option value="{{ @$c->id }}">{{ @$c->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!-- Drop-off Date and Time -->
                                        <div class="col-md-4 col-lg-2">
                                            <label for="dropoff-date" class="form-label text-white">Drop-off
                                                Date</label>
                                            <input id="dropoff_date" name="dropoff_date" class="form-control"
                                                type="date" required>
                                        </div>
                                        <div class="col-md-4 col-lg-2">
                                            <label for="dropoff-time" class="form-label text-white">Drop-off
                                                Time</label>
                                            <input id="dropoff_time" name="dropoff_time" class="form-control"
                                                type="time" required>
                                        </div>
                                        <!-- Pickup Date and Time -->
                                        <div class="col-md-4 col-lg-2">
                                            <label for="pickup-date" class="form-label text-white">Pickup Date</label>
                                            <input id="pickup-date" name="pickup_date" class="form-control" type="date"
                                                required>
                                        </div>
                                        <div class="col-md-4 col-lg-2">
                                            <label for="pickup-time" class="form-label text-white">Pickup Time</label>
                                            <input id="pickup-time" name="pickup_time" class="form-control" type="time"
                                                required>
                                        </div>
                                        <!-- Promo Code -->
                                        <div class="col-md-4 col-lg-2">
                                            <label for="promo-code" class="form-label text-white">Voucher</label>
                                            <input id="promo-code" name="voucher" class="form-control" type="text"
                                                placeholder="Enter Voucher">
                                        </div>
                                        <!-- Submit Button -->
                                        <div class="col-12 mt-4">
                                            <button type="submit" class="btn btn-primary w-100 py-3">Search for Parking</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Carousel End -->

            @include('frontend.component.features')

            <!-- Fact Counter -->
            @include('frontend.component.fact-counter')

            <!-- Fact Counter -->

            <!-- Services Start -->
            @include('frontend.component.services')

            <!-- Services End -->

            <!-- Steps Start -->
            @include('frontend.component.step')

            <!-- Steps End -->

            @include('frontend.component.compare')




            <!-- Reasons Start -->
            @include('frontend.component.reason')

            <!-- Reasons End -->


            <!-- Join Section Start -->

            {{-- @include('frontend.component.joins') --}}

            <!-- Join Section End -->




            <!-- Testimonial Start -->
            @include('frontend.component.testimonial')

            <!-- Testimonial End -->






        </div>

        @include('frontend.component.footer')

        <!-- Join Modal Start -->

        @include('frontend.component.join-model')

        <!-- Join Modal End -->

        <!-- Add this script to handle form submission -->

    </div>


    @include('frontend.component.script')
