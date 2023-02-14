    <section class="section" id="menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section-heading">
                        <h6>Our Menu</h6>
                        <h2>Our selection of cakes with quality taste</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item-carousel">
            <div class="col-lg-12">
                <div class="owl-menu-item owl-carousel">
                    @foreach ($foods as $food)
                        <form action="{{ url('/addcart', $food->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="item">
                                <div class='card card1' style="background-image: url('/foodimage/{{ $food->image }}')">
                                    <div class="price"><h6>${{ $food->price }}</h6></div>
                                    <div class='info'>
                                    <h1 class='title'>{{ $food->food_name }}</h1>
                                    <p class='description'><{{ $food->description }}</p>
                                    <div class="main-text-button">
                                        <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <input type="number" name="quantity" min="1" value="1" style="width: 80px">
                            <button class="main-button-icon" type="submit">{{ __('Add to cart') }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
