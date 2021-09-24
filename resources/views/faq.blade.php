@extends('layouts.app')
@section('slider')
    <!-- Hero Start-->
    <div class="hero-area2  slider-height2 hero-overly2 d-flex align-items-center" style="min-height: 200px;  !important">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center pt-50">
                        <h2>Frequently asked questions</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Hero End -->
@endsection
@section('main')
    <!--Hero End -->
    <!-- ================ contact section start ================= -->
    <section class="contact-section" style="margin-top:30px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center">
                        <span>eComX</span>
                        <div class="visit-caption">
                            <p class="normalize" style="text-align:center !important">Click any of the frequently asked questions below to find answers to all you need to know about eComX </p>
                        </div>
                    </div> 
                </div>
            </div>
         
            <div class="row">
                <button class="accordion">What is eComX and How Does it Work?</button>
                <div class="panel ck-content">
                    <p class="details">
                        eComX is a platform that makes it extremely easy for just anyone to get into the Mini eCommerce or what others know as Mini Importation business and make good income for themselves, whether as a side hustle or a full time business with nearly ZERO budget.
                        <br><br>
                        It works thus; register on the platform via {{ Config('app.url') }}, subscribe to a plan and get access to PRODUCTS and MARKETING TOOLS that help you sell any of the products you want.
                        <br><br>
                        So you absolutely don't need to invest huge funds in stocking products, neither do you need to rack your brain on what product to sell nor the marketing tools needed to sell off these products in no-time.
                        <br><br>
                        Everything has been made available to you.
                    </p>
                </div>
                <button class="accordion">Selling a product on eComX, How does the product get delivered to the customers?</button>
                <div class="panel ck-content">
                    <p class="details">
                        So, eComX has partnered with reliable logistics companies. All you have to do after choosing a product to sell is, advertise the product and send your orders to a <strong>Whatsapp Order Group</strong> that will be created for you upon subscribing to a plan.
                        <br><br>
                        Send in your orders to the group and the logistic companies handle the delivery for you and then remit your profit to you, weekly.
                    </p>
                </div>
                <button class="accordion">How Much Can I Make On The eComX Platform Selling Your Products?</button>
                <div class="panel ck-content">
                    <p class="details">
                        There is no limit to what you can make with the platform.
                        <br><br>
                        The products on the platform are listed at a little bit above the manufacturers price, then you can sell with over 500% ROI (there are <strong> <i>sellable price range</i></strong> on each product, i.e how much you can sell each product). 
                        <br><br>
                        So take for instance, a product is listed for N1,500 on the platform and the sellable range is N9,500 - N12,500. If you decide to sell for N9,500 that means you will be getting a remittance of N9,500 minus N1,500 minus the delivery cost (let's say N2,000) = N6,000. So you've made N6,000 on that single product. Now imagine selling 100 of that product in a month, that is a whooping N600,000 profit.
                        <br><br>
                        And yes, you can sell more than 100 pcs of any product in a month with Facebook advert which is also made available for you on the PRO plan.
                        <br><br>
                    </p>
                </div>
                <button class="accordion">How Do I Get My Money and How Reliable Are The Logistics Companies?</button>
                <div class="panel ck-content">
                    <p class="details">
                        You get your money weekly remitted to your bank account after a weekly report has been done on all your deliveries.
                        <br><br>
                        For reliability, we have been working with these companies over the years and they have proven to be reliable, delivering Nationwide across Nigeria and Ghana.
                    </p>
                </div>
                <button class="accordion">As a newbie in the eCommerce Business, what plan is advisable for me to Subscribe for?</button>
                <div class="panel ck-content">
                    <p class="details">
                        Ok, great question. As a newbie it is strongly advised you subscribe to the PRO plan, as everything has been done for you there. All you have to do is follow the video to implement your sales page and also run your ads.
                        <br><br>
                        But if you are good with coming up with your own sales copy, sales page and good with running your own ads, you can just subscribe to the STARTER plan or ADVANCE plan.
                    </p>
                </div>
                <button class="accordion">How Do I Get To Set Everything Up To Start Selling After Subscribing?</button>
                <div class="panel ck-content">
                    <p class="details">
                        Ok, so the entire step by step video tutorial on how to set up your marketing system (your sales page and facebook ads) has been made available to you. All you need to do is TAKE ACTION IMMEDIATELY, implement the setting up of your sales page and your facebook ads to start getting sales.
                    </p>
                </div>

            </div>
            <div class="row">
                <p class="details">
                    Can't find an answer?
                   <a href="contact">Click here</a> to ask us directly.
                </p>
            </div>
           
        </div>
    </section>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
            } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
            } 
        });
        }
    </script>
    <!-- ================ contact section end ================= -->
@endsection
