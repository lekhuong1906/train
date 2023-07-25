<section>
    <div class="sidebar" data-color="white" data-active-color="danger">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">
                <div class="logo-image-small">
                    <img src="{{asset('public/backend/assets/img/avt.jpg')}}">
                </div>
                <!-- <p>CT</p> -->
            </a>
            <a href="{{url('/dashboard')}}" class="simple-text logo-normal">
                {{\Illuminate\Support\Facades\Auth::user()->name}}
                <!-- <div class="logo-image-big">
                  <img src="../assets/img/logo-big.png">
                </div> -->
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="active">
                    <a href="{{url('/dashboard')}}">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="item">
                    <a class="sub-btn" style="display: flex"><i class="nc-icon nc-tile-56"></i><span>Type Tickets</span><i class="nc-icon nc-minimal-down right dropdown" style="right: inherit"></i></a>
                    <div class="sub-menu">
                        <a href="{{url('/add-type-ticket')}}" class="sub-item">Add Type Ticket</a>
                        <a href="{{url('/all-type-ticket')}}" class="sub-item">All Type Ticket</a>
                    </div>
                </li>
                <li>
                <li class="item">
                    <a class="sub-btn" style="display: flex"><i class="nc-icon nc-pin-3"></i><span>Station</span><i class="nc-icon nc-minimal-down right dropdown" style="right: inherit"></i></a>
                    <div class="sub-menu">
                        <a href="{{url('/add-station')}}" class="sub-item">Add Station</a>
                        <a href="{{url('/all-station')}}" class="sub-item">All Station</a>
                        <a href="{{url('/maps')}}" class="sub-item">Maps</a>
                    </div>
                <li>
                    <a href="{{url('all-receipt')}}">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>Receipt</p>
                    </a>
                </li>
                <li class="item">
                    <a class="sub-btn" style="display: flex"><i class="nc-icon nc-single-02"></i><span>User</span><i class="nc-icon nc-minimal-down right dropdown" style="right: inherit"></i></a>
                    <div class="sub-menu">
                        <a href="{{url('/new-user')}}" class="sub-item">New User</a>
                        <a href="{{url('/all-user')}}" class="sub-item">All User</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".sub-menu").hide(); // ẩn submenu mặc định

            $(".sub-btn").click(function() {
                $(this).next(".sub-menu").slideToggle(); // hiển thị submenu khi nhấp vào icon
                $(this).find(".dropdown").toggleClass("nc-minimal-up"); // chuyển biểu tượng dropdown lên khi submenu được hiển thị
            });
        });
    </script>
</section>
