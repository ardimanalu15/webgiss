<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="{{ asset('AdminLTE') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE') }}/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE') }}/dist/js/adminlte.min.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>Sistem Informasi Geografis</title>
  </head>
  <body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="background-color: #fff">
      <div class="container">
        <a class="navbar-brand" href="/">
          <img src="img/Logo.png" alt="" width="100" height="40" />
        </a>
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link"> <b> Beranda </b></a>
                        </li>
                        <li class="nav-item">
                            <a href="/web" class="nav-link"> <b> Pemetaan</b></a>
                        </li>                       
                    </ul>

                    <!-- SEARCH FORM 
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->
                </div>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <!-- Messages Dropdown Menu -->
                    <!-- Notifications Dropdown Menu -->

                    <li class="nav-item" style="background-color:rgba(23, 101, 157, 1)">
                        <a class="nav-link" href="{{ route('login') }}" style="color:white"><i class="fas fa-user"></i>Login</a>
                    </li>
                </ul>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center">
      <h1 class="display-6">
        SELAMAT DATANG DI <br />
        SISTEM INFORMASI GEOGRAFIS PENYEBARAN <br />
        FASILITAS PENDIDIKAN MENENGAH-TINGGI DI <br />
        PROVINSI SUMATERA SELATAN
      </h1>
    </section>
    <!-- Akhir Jumbotron -->

    <!-- InfoPendek -->
    <section id="InfoPendek ">
      <div class="containerIP shadow">
        <div class="row text-center">
          <div class="col">
            <h2>Data Fasilitas Pendidikan Di Provinsi Sumatera Selatan</h2>
          </div>
        </div>
        <div class="row text-center justify-content-center fs-5">
          <div class="col-4">
            <p>
              Sekolah Menengah Atas / Sederajat <br>
              {{ $sekolah }} Sekolah                         
            </p>        
          </div>
          <div class="col-4">
            <p>
              Perguruan Tinggi <br />
              {{ $perguruantinggi }}   Perguruan Tinggi
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir InfoPendek -->

    <!-- Info -->
    <section id="Info ">
      <div class="containerI">
        <div class="row text-center mb-3">
          <div class="col">
            <h2>Apa Itu SDGs?</h2>
          </div>
        </div>
        <div class="row justify-content-center ms-5">
          <div class="col-4">
            <img src="img/SDGs.png" alt="" width="300" height="300" style="margin-top:-100px;" />
          </div>
          <div class="col-6">
            <p>
              SDGs Desa adalah upaya terpadu mewujudkan Desa tanpa kemiskinan dan kelaparan, Desa ekonomi tumbuh merata, Desa peduli kesehatan, Desa peduli lingkungan, Desa peduli pendidikan, Desa ramah perempuan, Desa berjejaring, dan Desa
              tanggap budaya untuk percepatan pencapaian Tujuan Pembangunan Berkelanjutan. Dalam bahasa kerennya Sustainable Development Goals disingkat SDGs. SDGs Desa merupakan role pembangunan berkelanjutan yang akan masuk dalam program
              prioritas penggunaan Dana Desa Tahun 2021.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir Info -->

    <!-- Footer -->
    <section class="Footer text-center fs-6 mt-5">
      <hr class="my-1" />
      <p>Institut Teknologi Sumatera</p>
    </section>
    <!-- Akhir Footer -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>