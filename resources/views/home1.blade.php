<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Business, Service">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>DisRep - Home</title>
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="img/coba2.png" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/LineIcons.css">
    <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/main.css">    
    <link rel="stylesheet" href="css/responsive.css">
  </head>
  
  <body>    
    <!-- Header Section Start -->
    <header id="home" class="hero-area">    
      
      <div class="overlay">
        <span></span>
        <span></span>
      </div>
      <nav class="navbar navbar-expand-md bg-inverse fixed-top scrolling-navbar">
        <div class="container">
          <a href="/home" class="navbar-brand"><img src="img/coba.png" alt=""></a>       
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto w-100 justify-content-end">
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#services">Tentang</a>
              </li>                                         
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#team">Tim</a>
              </li>               
              <li class="nav-item">
                <a class="nav-link page-scroll" href="#contact">Kontak</a>
              </li> 
              <li class="nav-item">
                <a class="btn btn-singin" href="{{ route('logout') }}"onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf                  
                </form>
              </li>
            </ul>
          </div>
        </div>
      </nav>  
      <div class="container">      
        <div class="row space-100">
          <div class="col-lg-6 col-md-12 col-xs-12">
            <div class="contents">
              <h2 class="head-title">Web Buatan Tim 10<br>Untuk Kemudahan Anda</h2>
              <p>DisRep menawarkan kepada anda untuk melaporkan semua jenis bencana yang terjadi di sekitar anda.</p>
              <div class="header-button">
                <a href="#contact" class="btn btn-border page-scroll">Hubungi Kami</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-xs-12 p-0">
            <div class="intro-img">
              <img src="https://preview.uideck.com/items/slick/business/img/intro.png" alt="">
            </div>            
          </div>
        </div> 
      </div>             
    </header>
    <!-- Header Section End --> 
    
    <!-- Services Section Start -->
    <section id="services" class="section">
      <div class="container">

        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-alarm-clock"></i>
              </div>
              <h4>24 Jam</h4>
              <p>DisRep selalu tersedia 24 jam dan siap menerima semua laporan anda secara detail.</p>
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-brush"></i>
              </div>
              <h4>Desain Menarik</h4>
              <p>Dengan menggunakan warna yang serasi, DisRep mengutamakan kenyamanan para pengguna.</p>
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="services-item text-center">
              <div class="icon">
                <i class="lni-laptop-phone"></i>
              </div>
              <h4>Kemudahan Akses</h4>
              <p>Akses DisRep dimanapun dan kapanpun, kemudahan yang kami buat untuk anda.</p>
            </div>
          </div>
          <!-- End Col -->

        </div>
      </div>
    </section>
    <!-- Services Section End -->



    <!-- Business Plan Section Start -->
    <section id="business-plan">
      <div class="container">

        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
            <div class="business-item-img">
              <img src="img/business/business-img.png" class="img-fluid" alt="">
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12 pl-4">
            <div class="business-item-info">
              <h3>Dibuat dari kami untuk memenuhi kebutuhan anda</h3>
              <p>Mengingat wilayah Indonesia sangat rawan akan terjadinya bencana,
                DisRep memiliki tujuan sebagai wadah bagi masyarakat untuk melaporkan bencana 
                di sekitar, untuk itu kami sangat mengedepankan faktor kenyamanan dan kemudahan bagi 
                para pengguna. Dan kami sangat berharap bahwa masyarakat Indonesia bisa 
                lebih waspada dan berhati-hati pada lingkungan sekitar.<br> 
              </p>
              <a class="btn btn-common page-scroll" href="#contact">laporkan!</a>
            </div>
          </div>
          <!-- End Col -->

        </div>
      </div>
    </section>
    <!-- Business Plan Section End -->


    <!-- Team section Start -->
    <section id="team" class="section">
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="team-text section-header text-center">  
              <div>   
                <h2 class="section-title">Anggota Tim 10</h2>
                <div class="desc-text">
                  <p>Semua fitur pada DisRep dibuat oleh anggota kelompok kami</p>  
                  <p>dengan semangat dan kerja keras.</p>
                </div>
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row justify-content-center">              
 
          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="img/ruli.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="https://www.facebook.com/thariqi.r/"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="https://twitter.com/21yelloo"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="https://www.instagram.com/thariqi.r"><i class="lni-instagram-filled"></i></a></li>
                  </ul>
                </div>
                <div class="team-inner text-center">
                  <h5 class="team-title">Thariqi Ruli Ramadhani</h5>
                  <p>UI/UX Designer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->
 
          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="img/arya.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
                <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="https://www.facebook.com/aryaswpwp/"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="https://twitter.com/Hirakokunn"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="https://www.instagram.com/aryaswp"><i class="lni-instagram-filled"></i></a></li>
                  </ul>
                </div>
                <div class="team-inner text-center">
                  <h5 class="team-title">Aryasatya Widipratama</h5>
                  <p>UI/UX Engineer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->
        </div>
        <!-- End Row -->
      </div>
    </section>
    <!-- Team section End -->


    <!-- Contact Us Section -->
    <section id="contact" class="section">
      <!-- Container Starts -->
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="contact-text section-header text-center">  
              <div>   
                <h2 class="section-title">Laporkan Bencana</h2>
                <div class="desc-text">
                  <p>Laporkan bencana yang teradi di sekitar anda, </p>  
                  <p>karena setiap laporan yang kami terima akan sangat berarti bagi kami.</p>
                </div>
              </div> 
            </div>
          </div>
        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row">
          <!-- Start Col -->
          <div class="col-lg-6 col-md-12">
          <form action="home/laporantemp/store" method="post">
            @csrf
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control @error('nama_pelapor') is-invalid @enderror" name="nama_pelapor" value="{{ old('nama_pelapor') }}" placeholder="Nama Lengkap" required>
                  @error ('nama_pelapor')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="help-block with-errors"></div>
                </div>                                 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control @error('nama_bencana') is-invalid @enderror" name="nama_bencana" value="{{ old('nama_bencana') }}" placeholder="Nama Bencana" required>
                  @error ('nama_bencana')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="help-block with-errors"></div>
                </div> 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control @error('email_pelapor') is-invalid @enderror" name="email_pelapor" value="{{ old('email_pelapor') }}" placeholder="Email" required>
                  @error ('email_pelapor')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="help-block with-errors"></div>
                </div>                                 
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" class="form-control @error('lokasi_bencana') is-invalid @enderror" name="lokasi_bencana" value="{{ old('lokasi_bencana') }}" placeholder="Lokasi Bencana" required>
                  @error ('lokasi_bencana')
                    <div class="invalid-feedback">{{ $message }} </div>
                  @enderror
                  <div class="help-block with-errors"></div>
                </div> 
              </div>
              <div class="col-md-12">
                <div class="form-group"> 
                  <textarea class="form-control @error('status_bencana') is-invalid @enderror" name="status_bencana" value="{{ old('status_bencana') }}" placeholder="Status Bencana" rows="4" required></textarea>
                  @error ('status_bencana')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                  <div class="help-block with-errors"></div>
                </div>
                <div class="submit-button">
                  <button class="btn btn-common" type="submit">Laporkan!</button>
                  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
                </div>
              </div>
            </div>            
          </form>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-1">
            
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-4 col-md-12">
            <div class="contact-img">
              <img src="img/contact/01.png" class="img-fluid" alt="">
            </div>
          </div>
          <!-- End Col -->
          <!-- Start Col -->
          <div class="col-lg-1">
          </div>
          <!-- End Col -->

        </div>
        <!-- End Row -->
      </div>
    </section>
    <!-- Contact Us Section End -->
    

    <!-- Footer Section Start -->  
    <section class="footer">      
      <div class="footer-social">
        <a href="javascript:void(0);" onclick="showInfo()"><i class="fab fa-instagram "></i></a>
        <a href="javascript:void(0);" onclick="showInfo()"><i class="fab fa-twitter"></i></a>
        <a href="javascript:void(0);" onclick="showInfo()"><i class="fab fa-whatsapp"></i></a>
      </div>
      <ul class="footer-list">
        <li>
          <a class="page-scroll" href="#home">Home</a>
        </li>
        <li>
          <a class="page-scroll" href="#about">Tentang</a>
        </li>
        <li>
          <a class="page-scroll" href="#team">Tim</a>
        </li>
        <li>
          <a class="page-scroll" href="#contact">Hubungi Kami</a>
        </li>
      </ul>
      <p class="footer-copyright">
        &copy; 2021 DisRep, Inc
      </p>
    </section>
    <!-- Footer Section End --> 


    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-chevron-up"></i>
    </a> 

    <!-- Preloader -->
    <div id="preloader">
      <div class="loader" id="loader-1"></div>
    </div>
    <!-- End Preloader -->

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="js/jquery-min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>      
    <script src="js/jquery.nav.js"></script>    
    <script src="js/scrolling-nav.js"></script>    
    <script src="js/jquery.easing.min.js"></script>     
    <script src="js/nivo-lightbox.js"></script>     
    <script src="js/jquery.magnific-popup.min.js"></script>      
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>   
    <script>
      function showInfo() {
        swal({
          icon: 'info',
          title: 'Info',
          text: 'Fitur ini akan segera hadir',
        });
      }
    </script>
    
  </body>
</html>



