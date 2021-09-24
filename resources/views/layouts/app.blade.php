<!doctype html>
<html>
    @include('inc.head')

   <body>
    {{-- @yield('blog-custom-css') --}}
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="{{ asset(\App\Settings::select('preloader')->first()->value('preloader')) }}" alt="">
                </div>
            </div>
        </div>
    </div>
    @include('inc.header')
    <main>

        <!-- Hero Area Start-->
        @yield('slider')
        <!--Hero Area End-->
        <!-- Popular Locations Start -->

        @yield('main')
       

    </main>
    <div>
        @yield('content')
    </div>
    
    @include('inc.footer')
    <!-- Scroll Up -->
    {{-- <div id="back-top" >
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div> --}}


        <!-- JS here -->
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('js/vendor/modernizr-3.5.0.min.js')}}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{ asset('js/popper.min.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('js/jquery.slicknav.min.js')}}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('js/slick.min.js')}}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('js/wow.min.js')}}"></script>
		<script src="{{ asset('js/animated.headline.js')}}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.js')}}"></script>

		<!-- Nice-select, sticky -->
        <script src="{{ asset('js/jquery.nice-select.min.js')}}"></script>
		<script src="{{ asset('js/jquery.sticky.js')}}"></script>
        
        <!-- contact js -->
        <script src="{{ asset('js/contact.js')}}"></script>
        <script src="{{ asset('js/jquery.form.js')}}"></script>
        <script src="{{ asset('js/jquery.validate.min.js')}}"></script>
        <script src="{{ asset('js/mail-script.js')}}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js')}}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('js/plugins.js')}}"></script>
        <script src="{{ asset('js/main.js')}}"></script>
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/60e0c61e649e0a0a5cca64bd/1f9n0br47';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
    <!--End of Tawk.to Script-->
    </body>
</html>