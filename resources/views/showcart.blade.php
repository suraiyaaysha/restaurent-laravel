<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
<!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/assets/css/font-awesome.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="{{ asset('frontend') }}/assets/css/lightbox.css">

    </head>

    <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    <!-- ***** Header Area Start ***** -->
    @include('header')
    <!-- ***** Header Area End ***** -->

    <!-- ***** Show cart Area Starts ***** -->
    <section class="section mt-5" id="showcart-area">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="left-text-content">
                        <div class="section-heading">
                            <h6>Carts</h6>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ url('orderconfirm') }}" method="POST">
                @csrf
                <div class="row mt-5 pt-5">
                    <div class="col-12">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>Food Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    {{-- <th>Action</th> --}}
                                </th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>
                                            <input type="text" name="food_name[]" value="{{ $item->food_name }}" hidden>
                                            {{ $item->food_name }}
                                        </td>
                                        <td>
                                            <input type="text" name="price[]" value="{{ $item->price }}" hidden>
                                            {{ $item->price }}
                                        </td>
                                        <td>
                                            <input type="text" name="quantity[]" value="{{ $item->quantity }}" hidden>
                                            {{ $item->quantity }}
                                        </td>
                                    </tr>
                                @endforeach

                                @foreach ($data2 as $item2)
                                    {{-- <tr class="position-relative"> --}}
                                        <td><a href="{{ url('/remove', $item2->id) }}" class="btn btn-danger remove-cart-btn">Remove</a></td>
                                    {{-- </tr> --}}
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="col-md-12 mt-4">
                        <div class="float-right">
                            <button class="btn btn-primary" type="button" id="order">Order Now</button>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">

                        {{-- <div class="float-right" id="appear" style="display: none"> --}}
                        <div class="float-right" id="appear">
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name">
                            </div>

                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone" placeholder="Phone">
                            </div>

                            <div class="mb-3">
                                <label>Address</label>
                                <input type="text" name="address" placeholder="Address">
                            </div>

                            <div>
                                <button class="btn btn-primary text-black" type="submit">Order Confirm</button>
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>

    </section>
    <!-- ***** Show cart Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="{{ asset('frontend') }}/assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="{{ asset('frontend') }}/assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('frontend') }}/assets/js/popper.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('frontend') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/accordions.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/datepicker.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/scrollreveal.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/waypoints.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/imgfix.min.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/slick.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/lightbox.js"></script>
    <script src="{{ asset('frontend') }}/assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="{{ asset('frontend') }}/assets/js/custom.js"></script>
    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);

            });
        });

    </script>

        <script>
        $('#order').on('click', function() {
            $('#appear').toggle('show');
        })
    </script>

  </body>
</html>
