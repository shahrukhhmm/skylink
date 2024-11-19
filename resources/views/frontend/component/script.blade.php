

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/assets/lib/wow/wow.min.js') }} "></script>
<script src="{{ asset('/assets/lib/easing/easing.min.js') }} "></script>
<script src="{{ asset('/assets/lib/waypoints/waypoints.min.js') }} "></script>
<script src="{{ asset('/assets/lib/counterup/counterup.min.js') }} "></script>
<script src="{{ asset('/assets/lib/owlcarousel/owl.carousel.min.js') }} "></script>
<script src="{{ asset('/assets/js/main.js') }} "></script>
<script>
    new WOW().init();
</script>


<script>
    document.getElementById('joinForm').addEventListener('submit', function (event) {
        event.preventDefault();
        var emailInput = document.getElementById('emailInput').value;
        if (emailInput) {
            document.getElementById('successMessage').style.display = 'block';
            document.getElementById('emailInput').value = '';
        }
    });
</script>


<script>
    $(document).ready(function () {
        $(".testimonial-carousel").owlCarousel({
            autoplay: true,
            smartSpeed: 1500,
            center: false,
            dots: true,
            loop: true,
            margin: 25,
            nav: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 1
                },
                992: {
                    items: 2
                },
                1200: {
                    items: 2
                }
            }
        });
    });
</script>

<script>
    function nextStep(step) {
        document.querySelectorAll('.step').forEach((el) => {
            el.style.display = 'none';
        });
        document.getElementById('step' + step).style.display = 'block';
    }

    function previousStep(step) {
        nextStep(step);
    }
</script>


</body>

</html>
