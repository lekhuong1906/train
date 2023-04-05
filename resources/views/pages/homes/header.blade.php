<section>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{asset('public/frontend/assets/images/logo.png')}}" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{url('/')}}" class="active">Home</a></li>
                            <li><a href="#">Map</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Account
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="{{url('/profile-customer')}}" style="color: #403d39">Profile</a>
                                    <a class="dropdown-item" href="{{url('/all-ticket')}}" style="color: #403d39">All Ticket</a>
                                    <a class="dropdown-item" href="{{url('/customer-log-out')}}" style="color: #403d39">Log out</a>
                                </div>
                            </li>

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
    <!-- ***** Header Area End ***** -->
    <script>
        $(document).ready(function() {
            $(".nav-item.dropdown").hover(function() {
                $(this).addClass('show');
                $('.dropdown-menu', this).addClass('show');
            }, function() {
                $(this).removeClass('show');
                $('.dropdown-menu', this).removeClass('show');
            });
        });

    </script>
</section>
