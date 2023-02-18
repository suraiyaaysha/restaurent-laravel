<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset('frontend') }}/assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                            {{-- <li class="scroll-to-section">
                                <a href="{{ url('/showcart', Auth::user()->id) }}">
                                @auth
                                    Cart <span class="badge badge-success">{{ $count }}</span>
                                @endauth

                                @guest
                                    Cart <span class="badge badge-success">0</span>
                                @endguest
                                </a>
                            </li> --}}

                                @if (Auth::user())
                                   <li class="scroll-to-section">
                                        <a href="{{ url('/showcart', Auth::user()->id) }}">Cart <span class="badge badge-success">{{ $count }}</span></a>
                                    </li>
                                @else
                                    <li class="scroll-to-section"><a href="{{ url('/emptyshowcart') }}">Cart <span class="badge badge-success">0</span></a></li>
                                @endif

                            {{-- <li> --}}
                                @if (Route::has('login'))
                                    {{-- <div class=""> --}}
                                        @auth
                                            {{-- <li><a href="{{ url('/dashboard') }}" class="">Dashboard</a></li> --}}
                                            <x-app-layout></x-app-layout>
                                        @else
                                        <li><a href="{{ route('login') }}">Log in</a></li>
                                            @if (Route::has('register'))
                                                <li><a href="{{ route('register') }}" class="">Register</a></li>
                                            @endif
                                        @endauth
                                    {{-- </div> --}}
                                @endif
                            {{-- </li> --}}
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
