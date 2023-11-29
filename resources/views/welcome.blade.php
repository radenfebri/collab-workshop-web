<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tuku Buku - Buku Online Indonesia</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('template-frontend') }}/vendors/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('template-frontend') }}/vendors/owl-carousel/css/owl.theme.default.css">
    <link rel="stylesheet" href="{{ asset('template-frontend') }}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ asset('template-frontend') }}/vendors/aos/css/aos.css">
    <link rel="stylesheet" href="{{ asset('template-frontend') }}/css/style.min.css">
	<link rel="icon" href="{{ asset('template-dashboard') }}/img/icon.ico" type="image/x-icon"/>
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
    <header id="header-section">
        <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
            <div class="container">
                <div class="navbar-brand-wrapper d-flex w-100">
                    <a href=""><img src="{{ asset('template-frontend') }}/images/Group2.svg" alt=""></a>
                    <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="mdi mdi-menu navbar-toggler-icon"></span>
                    </button> 
                </div>
                <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
                        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
                            <div class="navbar-collapse-logo">
                                <a href=""><img src="{{ asset('template-frontend') }}/images/Group2.svg" alt=""></a>
                            </div>
                            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features-section">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#digital-marketing-section">Blog</a>  
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#feedback-section">Developer</a>
                        </li>
                        <li class="nav-item btn-contact-us">
                            @if (Route::has('login'))
                                @auth
                                    <a href="{{ route(Auth::user()->role == 'Admin' ? 'dashboard' : 'user') }}" class="nav-link" href="#feedback-section">{{ Auth::user()->name }}</a>
                                    @else
                                    <a href="{{ route('login') }}" class="nav-link" href="#feedback-section">Login</a>
                                @endauth
                            @endif
                        </li>

                        
                    </ul>
                </div>
            </div> 
        </nav>   
    </header>
    <div class="banner" >
        <div class="container">
            <h1 class="font-weight-semibold">Tuku Buku Online<br>Aplikasi Zaman Now.</h1>
            <h6 class="font-weight-normal text-muted pb-3">Membeli buku menjadi lebih praktis melalui Tuku Buku, sebuah platform yang dapat diakses melalui Android maupun situs web. Dengan ini, proses transaksi secara daring menjadi lebih mudah, tanpa perlu menunggu antrian di toko fisik.</h6>
            <div>
                <a href="{{ route('register') }}" class="btn btn-opacity-light mr-1">Mulai sekarang</a>
                <a href="#features-section" class="btn btn-opacity-success ml-1">Pelajari Lanjut</a>
            </div>
            <img src="{{ asset('template-frontend') }}/images/Group171.svg" alt="" class="img-fluid">
        </div>
    </div>
    <div class="content-wrapper">
        <div class="container">
            <section class="features-overview" id="features-section" >
                <div class="content-header">
                    <h2>Tuku Buku Handal</h2>
                    <h6 class="section-subtitle text-muted">Salah satu platform yang melayani berbagai macam buku,<br>layanan kami memiliki keunggulan.</h6>
                </div>
                <div class="d-md-flex justify-content-between">
                    <div class="grid-margin d-flex justify-content-start">
                        <div class="features-width">
                            <img src="{{ asset('template-frontend') }}/images/Group12.svg" alt="" class="img-icons">
                            <h5 class="py-3">Platform<br>Stabil</h5>
                            <p class="text-muted">Website dan Aplikasi yang sudah teruji, memiliki kecepatan yang handal.</p>
                            <a href=""><p class="readmore-link">Selengkapnya..</p></a>  
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-center">
                        <div class="features-width">
                            <img src="{{ asset('template-frontend') }}/images/Group7.svg" alt="" class="img-icons">
                            <h5 class="py-3">Harga Buku<br>Terjangkau</h5>
                            <p class="text-muted">Selain banyak macam buku, juga memiliki harga yang cukup terjangkau relatif murah.</p>
                            <a href=""><p class="readmore-link">Selengkaonya..</p></a>
                        </div>
                    </div>
                    <div class="grid-margin d-flex justify-content-end">
                        <div class="features-width">
                            <img src="{{ asset('template-frontend') }}/images/Group5.svg" alt="" class="img-icons">
                            <h5 class="py-3">Transaksi<br>Mudah</h5>
                            <p class="text-muted">Berbagai macam metode pembayaran yang disediakan meliputi bank transfer indonesia.</p>
                            <a href=""><p class="readmore-link">Selengkapnya..</p></a>
                        </div>
                    </div>
                </div>
            </section>     
            <section class="digital-marketing-service" id="digital-marketing-section">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
                        <h3 class="m-0">Sukses dengan suka<br>Membaca buku!</h3>
                        <div class="col-lg-7 col-xl-6 p-0">
                            <p class="py-4 m-0 text-muted">Buku adalah petualangan menarik di mana Anda menjelajahi kehidupan karakter yang kuat, alam yang menakjubkan, dan pemikiran brilian dari para pemikir terhebat.</p>
                            <p class="font-weight-medium text-muted">Setiap halaman yang Anda baca membangun dasar pengetahuan yang kokoh, menjadi pondasi kesuksesan di masa depan.</p>
                        </div>    
                    </div>
                    <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
                        <img src="{{ asset('template-frontend') }}/images/Group1.png" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
                        <img src="{{ asset('template-frontend') }}/images/Group2.png" alt="" class="img-fluid">
                    </div>
                    <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
                        <h3 class="m-0">Temukan solusi anda<br>di Platform Tuku Buku.</h3>
                        <div class="col-lg-9 col-xl-8 p-0">
                            <p class="py-4 m-0 text-muted">Platform Tuku Buku menyediakan akses ke beragam buku yang mencakup berbagai topik, mulai dari pendidikan, bisnis, kesehatan, hingga hobi dan kesenangan.</p>
                            <p class="pb-2 font-weight-medium text-muted">Jelajahi koleksi buku yang tersedia dan temukan jawaban, wawasan baru, serta solusi praktis yang akan membantu Anda mencapai tujuan yang diinginkan.</p>
                        </div>
                        <button class="btn btn-info">Selengkapnya..</button>
                    </div>
                </div>
            </section>     
            <section class="case-studies" id="case-studies-section">
                <div class="row grid-margin">
                    <div class="col-12 text-center pb-5">
                        <h2>Kategori Buku</h2>
                        <h6 class="section-subtitle text-muted">Berbagai macam buku yang di sediakan.</h6>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-primary text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('template-frontend') }}/images/Group95.svg" class="case-studies-card-img" alt="">
                                    </div>  
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Online marketing</h6>
                                            <button class="btn btn-white">Selengkapnya..</button>
                                        </div>
                                    </div>
                                </div>   
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Online Marketing</h6>
                                    <p>Seo, Marketing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-warning text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('template-frontend') }}/images/Group108.svg" class="case-studies-card-img" alt="">
                                    </div>  
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Web Development</h6>
                                            <button class="btn btn-white">Selengkapnya..</button>
                                        </div>
                                    </div>
                                </div>   
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Web Development</h6>
                                    <p>Developing, Designing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-violet text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('template-frontend') }}/images/Group126.svg" class="case-studies-card-img" alt="">
                                    </div>  
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Web Designing</h6>
                                            <button class="btn btn-white">Selengkapnya..</button>
                                        </div>
                                    </div>
                                </div>   
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Web Designing</h6>
                                    <p>Designing, Developing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 stretch-card" data-aos="zoom-in" data-aos-delay="600">
                        <div class="card color-cards">
                            <div class="card-body p-0">
                                <div class="bg-success text-center card-contents">
                                    <div class="card-image">
                                        <img src="{{ asset('template-frontend') }}/images/Group115.svg" class="case-studies-card-img" alt="">
                                    </div>  
                                    <div class="card-desc-box d-flex align-items-center justify-content-around">
                                        <div>
                                            <h6 class="text-white pb-2 px-3">Know more about Software Development</h6>
                                            <button class="btn btn-white">Selengkapnya..</button>
                                        </div>
                                    </div>
                                </div>   
                                <div class="card-details text-center pt-4">
                                    <h6 class="m-0 pb-1">Software Development</h6>
                                    <p>Developing, Designing</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>     
            <section class="customer-feedback" id="feedback-section">
                <div class="row">
                    <div class="col-12 text-center pb-5">
                        <h2>Tim Pengembang Aplikasi</h2>
                        <h6 class="section-subtitle text-muted m-0">Berikut Pengembang platform Tuku Buku.</h6>
                    </div>
                    <div class="owl-carousel owl-theme grid-margin">
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face2.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Raden Febri</h6>
                                    <h6 class="customer-designation text-muted m-0">Founder</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Sendy</h6>
                                    <h6 class="customer-designation text-muted m-0">CEO</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Sayif</h6>
                                    <h6 class="customer-designation text-muted m-0">Senior Search Engine</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face15.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Ilmia</h6>
                                    <h6 class="customer-designation text-muted m-0">Tata Kelola IT</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face16.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Cody Lambert</h6>
                                    <h6 class="customer-designation text-muted m-0">Senior Mobile Developer</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face1.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Tony Martinez</h6>
                                    <h6 class="customer-designation text-muted m-0">Senior Web Developer</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face2.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Tony Martinez</h6>
                                    <h6 class="customer-designation text-muted m-0">Senior DevOps</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face3.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Sophia Armstrong</h6>
                                    <h6 class="customer-designation text-muted m-0">Projek Manager</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card customer-cards">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="{{ asset('template-frontend') }}/images/face20.jpg" width="89" height="89" alt="" class="img-customer">
                                    <p class="m-0 py-3 text-muted">Lorem ipsum dolor sit amet, tincidunt vestibulum. Fusce egeabus consectetuer turpis, suspendisse.</p>
                                    <div class="content-divider m-auto"></div>
                                    <h6 class="card-title pt-3">Cody Lambert</h6>
                                    <h6 class="customer-designation text-muted m-0">Marketing Manager</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="contact-us" id="contact-section">
                <div class="contact-us-bgimage grid-margin" >
                    <div class="pb-4">
                        <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Apakah Anda punya proyek? </h4>
                        <h4 class="pt-1" data-aos="fade-down">Hubungi kami</h4>
                    </div>
                    <div data-aos="fade-up">
                        <a href="https://wa.me/6289526716627" type="button" class="btn btn-rounded btn-outline-danger">Hubungi kami</a>
                    </div>          
                </div>
            </section>
            <section class="contact-details" id="contact-details-section">
                <div class="row text-center text-md-left">
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <img src="{{ asset('template-frontend') }}/images/Group2.svg" alt="" class="pb-2">
                        <div class="pt-2">
                            <p class="text-muted m-0">admin@tukubuku.id</p>
                            <p class="text-muted m-0">+62 895-2671-6627</p>
                        </div>         
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <h5 class="pb-2">Hubungi</h5>
                        <p class="text-muted">Jangan lewatkan pembaruan apa pun pada templat dan ekstensi baru kami.!</p>
                        <form>
                            <input type="text" class="form-control" id="Email" placeholder="Email">
                        </form>
                        <div class="pt-3">
                            <button class="btn btn-dark">Subscribe</button>
                        </div>   
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <h5 class="pb-2">Pedoman</h5>
                        <a href=""><p class="m-0 pb-2">Terms</p></a>   
                        <a href="" ><p class="m-0 pt-1 pb-2">Privacy policy</p></a> 
                        <a href=""><p class="m-0 pt-1 pb-2">Cookie Policy</p></a> 
                        <a href=""><p class="m-0 pt-1">Discover</p></a> 
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 grid-margin">
                        <h5 class="pb-2">Alamat</h5>
                        <p class="text-muted">SMKN Mastrip<br>Polije. Istimewa</p>
                        <div class="d-flex justify-content-center justify-content-md-start">
                            <a href="facebook.com"><span class="mdi mdi-facebook"></span></a>
                            <a href="twitter.com"><span class="mdi mdi-twitter"></span></a>
                            <a href="instagram.com"><span class="mdi mdi-instagram"></span></a>
                            <a href="linkedin.com"><span class="mdi mdi-linkedin"></span></a>
                        </div>
                    </div>
                </div>  
            </section>
            <footer class="border-top">
                <p class="text-center text-muted pt-4">Copyright © 2023<a href="" class="px-1">Bootstrapdash.</a>All rights reserved.</p>
            </footer>
            <!-- Modal for Contact - us Button -->
            
        </div> 
    </div>
    <script src="{{ asset('template-frontend') }}/vendors/jquery/jquery.min.js"></script>
    <script src="{{ asset('template-frontend') }}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('template-frontend') }}/vendors/owl-carousel/js/owl.carousel.min.js"></script>
    <script src="{{ asset('template-frontend') }}/vendors/aos/js/aos.js"></script>
    <script src="{{ asset('template-frontend') }}/js/landingpage.js"></script>
</body>
</html>