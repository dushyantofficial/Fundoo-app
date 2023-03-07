<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('admin/images/icon-admin-sidebar.png')}}">
    <link rel="shortcut icon" href="#">
    <meta name="author" content="Fundoo Driver">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>Welcome To Fundoo Drivers</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600|Roboto:400,400i,500" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/linearicons.css%2bfont-awesome.min.css%2bbootstrap.css%2bmagnific-popup.css%2bnice-select.css%2bhexagons.min.css%2bowl.carousel.css%2bmain.css.pagespeed.cc.PJSHYQ57Cp.css')}}" />
    <script nonce="5a3eefb7-75b6-432f-9900-7ebbfc655063">(function(w,d){!function(a,e,t,r){a.zarazData=a.zarazData||{},a.zarazData.executed=[],a.zaraz={deferred:[]},a.zaraz.q=[],a.zaraz._f=function(e){return function(){var t=Array.prototype.slice.call(arguments);a.zaraz.q.push({m:e,a:t})}};for(const e of["track","set","ecommerce","debug"])a.zaraz[e]=a.zaraz._f(e);a.zaraz.init=()=>{var t=e.getElementsByTagName(r)[0],z=e.createElement(r),n=e.getElementsByTagName("title")[0];for(n&&(a.zarazData.t=e.getElementsByTagName("title")[0].text),a.zarazData.x=Math.random(),a.zarazData.w=a.screen.width,a.zarazData.h=a.screen.height,a.zarazData.j=a.innerHeight,a.zarazData.e=a.innerWidth,a.zarazData.l=a.location.href,a.zarazData.r=e.referrer,a.zarazData.k=a.screen.colorDepth,a.zarazData.n=e.characterSet,a.zarazData.o=(new Date).getTimezoneOffset(),a.zarazData.q=[];a.zaraz.q.length;){const e=a.zaraz.q.shift();a.zarazData.q.push(e)}z.defer=!0;for(const e of[localStorage,sessionStorage])Object.keys(e||{}).filter((a=>a.startsWith("_zaraz_"))).forEach((t=>{try{a.zarazData["z_"+t.slice(7)]=JSON.parse(e.getItem(t))}catch{a.zarazData["z_"+t.slice(7)]=e.getItem(t)}}));z.referrerPolicy="origin",z.src="../../cdn-cgi/zaraz/sd0d9.js?z="+btoa(encodeURIComponent(JSON.stringify(a.zarazData))),t.parentNode.insertBefore(z,t)},["complete","interactive"].includes(e.readyState)?zaraz.init():a.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script></head>
<body>
<header id="header">
    <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="#home"><img src="{{asset('/front/img/logo.png')}}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li><a href="#services">Featured</a></li>
                    <li><a href="#about">About Fundoo</a></li>
                    <li><a href="#testimonial">Testimonial</a></li>
                    <li><a href="#screen">Featured Screens</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<section class="home-banner-area" id="home">
    <div class="container">
        <div class="row fullscreen d-flex align-items-center justify-content-between">
            <div class="home-banner-content col-lg-6 col-md-6">
                <h1>
                    Lorem ipsum <br> dolor sit amet

                </h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure modi omnis praesentium?</p>
                <div class="download-button d-flex flex-row justify-content-start">
                    <div class="buttons flex-row d-flex">
                        <i class="fa fa-apple" aria-hidden="true"></i>
                        <div class="desc">
                            <a href="#">
                                <p>
                                    <span>Available</span> <br>
                                    on App Store
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="buttons dark flex-row d-flex">
                        <i class="fa fa-android" aria-hidden="true"></i>
                        <div class="desc">
                            <a href="#">
                                <p>
                                    <span>Available</span> <br>
                                    on Play Store
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-img col-lg-4 col-md-6">
                <img class="img-fluid" src="{{asset('/front/img/xiphone.png.pagespeed.ic.nNepj-lKF2.png')}}" alt="">
            </div>
        </div>
    </div>
</section>


<section class="fact-area">
    <div class="container">
        <div class="fact-box">
            <div class="row align-items-center">
                <div class="col single-fact">
                    <h2>100K+</h2>
                    <p>Total Downloads</p>
                </div>
                <div class="col single-fact">
                    <h2>10K+</h2>
                    <p>Positive Reviews</p>
                </div>
                <div class="col single-fact">
                    <h2>50K+</h2>
                    <p>Daily Visitors</p>
                </div>
                <div class="col single-fact">
                    <h2>0.02%</h2>
                    <p>Uninstallation Rate</p>
                </div>
                <div class="col single-fact">
                    <h2>15K+</h2>
                    <p>Pro User</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="feature-area section-gap-top" id="services">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2>Lorem ipsum.</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <span class="lnr lnr-book"></span>
                        <h3>Lorem ipsum.</h3>
                    </a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est hic perspiciatis sed!
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <span class="lnr lnr-book"></span>
                        <h3>Lorem ipsum dolor.</h3>
                    </a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est hic perspiciatis sed!
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single-feature">
                    <a href="#" class="title">
                        <span class="lnr lnr-book"></span>
                        <h3>Lorem ipsum.</h3>
                    </a>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At fugiat magnam nobis.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="about-area" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 home-about-left">
                <img class="img-fluid" src="{{asset('/front/img/xiphone.png.pagespeed.ic.nNepj-lKF2.png')}}" alt="">
            </div>
            <div class="offset-lg-1 col-lg-5 home-about-right">
                <h1>
                    Lorem ipsum dolor <br> sit amet, consectetur <br> adipisicing elit.
                </h1>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua.Ut
                    enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.
                </p>
                <a class="primary-btn text-uppercase" href="#">Get Details</a>
            </div>

        </div>
    </div>
</section>


<section class="testimonials-area section-gap-top" id="testimonial">
    <div class="container">
        <div class="testi-slider owl-carousel" data-slider-id="1">
            <div class="item">
                <div class="testi-item">
                    <img src="{{asset('/front/img/xquote.png.pagespeed.ic.nf8TSyCQUv.png')}}" alt="">
                    <h4>Fanny Spencer</h4>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A commodi distinctio in reiciendis. Accusamus commodi culpa debitis distinctio doloribus ex excepturi, hic impedit ipsum itaque iure iusto laboriosam, maiores molestias nemo numquam odit optio porro quam, quia quisquam quod ratione recusandae
                            <br> saepe totam veritatis vero vitae. Ad dolorum fuga quasi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testi-item">
                    <img src="{{asset('/front/img/xquote.png.pagespeed.ic.nf8TSyCQUv.png')}}" alt="">
                    <h4>Rating</h4>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A commodi distinctio in reiciendis. Accusamus commodi culpa debitis distinctio doloribus ex excepturi, hic impedit ipsum itaque iure iusto laboriosam, maiores molestias nemo numquam odit optio porro quam, quia quisquam quod ratione recusandae
                            <br> saepe totam veritatis vero vitae. Ad dolorum fuga quasi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testi-item">
                    <img src="{{asset('/front/img/xquote.png.pagespeed.ic.nf8TSyCQUv.png')}}" alt="">
                    <h4>Lorem ipsum.</h4>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A commodi distinctio in reiciendis. Accusamus commodi culpa debitis distinctio doloribus ex excepturi, hic impedit ipsum itaque iure iusto laboriosam, maiores molestias nemo numquam odit optio porro quam, quia quisquam quod ratione recusandae
                            <br> saepe totam veritatis vero vitae. Ad dolorum fuga quasi.
                        </p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="testi-item">
                    <img src="{{asset('/front/img/xquote.png.pagespeed.ic.nf8TSyCQUv.png')}}" alt="">
                    <h4>Lorem ipsum.</h4>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                        <li><a href="#"><i class="fa fa-star"></i></a></li>
                    </ul>
                    <div class="wow fadeIn" data-wow-duration="1s">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A commodi distinctio in reiciendis. Accusamus commodi culpa debitis distinctio doloribus ex excepturi, hic impedit ipsum itaque iure iusto laboriosam, maiores molestias nemo numquam odit optio porro quam, quia quisquam quod ratione recusandae
                            <br> saepe totam veritatis vero vitae. Ad dolorum fuga quasi.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
            <div class="owl-thumb-item">
                <div>
                    <img class="img-fluid" src="{{asset('/front/img/user-icon.png')}}" alt="">
                </div>
                <div class="overlay overlay-grad"></div>
            </div>
            <div class="owl-thumb-item">
                <div>
                    <img class="img-fluid" src="{{asset('/front/img/user-icon.png')}}" alt="">
                </div>
                <div class="overlay overlay-grad"></div>
            </div>
            <div class="owl-thumb-item">
                <div>
                    <img class="img-fluid" src="{{asset('/front/img/user-icon.png')}}" alt="">
                </div>
                <div class="overlay overlay-grad"></div>
            </div>
            <div class="owl-thumb-item">
                <div>
                    <img class="img-fluid" src="{{asset('/front/img/user-icon.png')}}" alt="">
                </div>
                <div class="overlay overlay-grad"></div>
            </div>
        </div>
    </div>
</section>


<section class="screenshot-area section-gap-top pb-90" id="screen">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2>Featured Screens</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                        magna aliqua.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="owl-carousel owl-screenshot">
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/xbanner-img.png.pagespeed.ic.x1mpc74Oxi.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/xiphone.png.pagespeed.ic.nNepj-lKF2.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/3.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/4.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/5.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/6.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/7.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/8.png')}}" alt="">
                </div>
                <div class="single-screenshot">
                    <img class="img-fluid" src="{{asset('/front/img/9.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>




<footer class="footer-area section-gap" style="padding: 50px 0" id="contact">
    <div class="container"
    >

        <div class="footer-bottom row align-items-center justify-content-center">

            <div class="col-lg-12 social-link">

                <div class="download-button d-flex flex-row justify-content-center">
                    <div class="buttons gray flex-row d-flex">
                        <i class="fa fa-apple" aria-hidden="true"></i>
                        <div class="desc">
                            <a href="#">
                                <p>
                                    <span>Available</span> <br>
                                    on App Store
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="buttons gray flex-row d-flex">
                        <i class="fa fa-android" aria-hidden="true"></i>
                        <div class="desc">
                            <a href="#">
                                <p>
                                    <span>Available</span> <br>
                                    on Play Store
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
                <p class="mt-40 col-lg-12 align-items-center text-center text-white">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('/front/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('/front/js/tilt.jquery.min.js')}}"></script>
<script src="{{asset('/front/js/vendor%2c_bootstrap.min.js%2beasing.min.js%2bhoverIntent.js%2bsuperfish.min.js%2bjquery.ajaxchimp.min.js%2bjquery.magnific-popup.min.js.pagespeed.jc.JRqhRxy7Ct.js')}}"></script><script>eval(mod_pagespeed_UVNsZTh7WU);</script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>--}}
<script>eval(mod_pagespeed_Q33QpBil16);</script>
<script>eval(mod_pagespeed_ClbEXZyXAE);</script>
<script>eval(mod_pagespeed_FNJ09kRk7A);</script>
<script>eval(mod_pagespeed_HcZ83DDJFr);</script>
<script>eval(mod_pagespeed_Hyu90JyTQG);</script>
<script src="{{asset('/front/js/owl.carousel.min.js%2bowl-carousel-thumb.min.js%2bhexagons.min.js%2bjquery.nice-select.min.js%2bwaypoints.min.js%2bmail-script.js%2bmain.js.pagespeed.jc.-oCwgfHcrN.js')}}"></script><script>eval(mod_pagespeed_ghe2I4$241);</script>
<script>eval(mod_pagespeed_R143S_uPCy);</script>
<script>eval(mod_pagespeed_K74O4jun2T);</script>
<script>eval(mod_pagespeed_GyVs92elLZ);</script>
<script>eval(mod_pagespeed_q5fK0sblyK);</script>
<script>eval(mod_pagespeed_al0QH1Vfua);</script>
<script>eval(mod_pagespeed_$erIB099R2);</script>

{{--<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>--}}
{{--<script>--}}
{{--    window.dataLayer = window.dataLayer || [];--}}
{{--    function gtag(){dataLayer.push(arguments);}--}}
{{--    gtag('js', new Date());--}}

{{--    gtag('config', 'UA-23581568-13');--}}
{{--</script>--}}
{{--<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"720e4224efed321d","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.6.0","si":100}' crossorigin="anonymous"></script>--}}
</body>
</html>
