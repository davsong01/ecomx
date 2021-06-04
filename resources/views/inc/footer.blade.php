
<footer>
    <!-- Footer Start-->
    <div class="footer-area">
        <div class="container">
           <div class="footer-top footer-padding">
                <div class="row justify-content-between">
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="single-footer-caption mb-30">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <a href="/"><img class="dlogo" src="{{ asset( \App\Settings::select('logo')->first()->value('logo'))}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Quick Links</h4>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="#about">About</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                    <li><a href="/tac">Terms</a></li>
                                    <li><a href="/privacy">Privacy Policy</a></li>
                                    <li><a href="/register">Earn as Affiliate</a></li>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Categories</h4>
                                <ul>
                                    
                                    <li><a href="#">Reasonable Hotel</a></li>
                                    <li><a href="#">Popular Restaurant</a></li>
                                    <li><a href="#">Easy Shopping</a></li>
                                    <li><a href="#">Night Life</a></li>     
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Logistics Partners</h4>
                                <ul>
                                    <li class="app-log"><img src="{{ asset('images/site/pod.jpeg') }}" alt=""></li>
                                    <li class="app-log"><img src="{{ asset('images/site/pod2.jpeg') }}" alt=""></li>
                                    {{-- <li><img src="images/site/pod.jpeg" alt=""></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>Download App</h4>
                                <ul>
                                    <li class="app-log"><a onclick="return confirm('App coming soon');" href="#"><img src="{{ asset('images/gallery/app-logo.png')}}" alt=""></a></li>
                                    <li><a href="#" onclick="return confirm('App coming soon');" ><img src="{{ asset('images/gallery/app-logo2.png')}}" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p>
                                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | {{ config('app.name') }} </a>
                              </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <!-- Footer Social -->
                        <div class="footer-social f-right">
                            <a href="https://www.facebook.com/ecomxglobal"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.twitter/ecomxglobal"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.instagram.com/ecomxglobal"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <!-- Footer End-->
</footer>