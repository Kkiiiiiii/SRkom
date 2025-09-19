@extends('layout')
@section('content')
<style>
    .box-siswa .card {
        background: linear-gradient(135deg, #81c784, #4caf50);
        color: white;
        border: none;
    }
    .box-guru .card {
        background: linear-gradient(135deg, #ffb300, #fb8c00);
        color: white;
        border: none;
    }
    .carousel-berita {
        width: 100%;
        height: 400px;
    }
    .carousel-berita img {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }
    .carousel-caption {
        bottom: 20%;
    }
    .box-guru .card:hover{
            transform: translateY(-3px);          
        }
        .box-siswa .card:hover{
            transform: translateY(-3px);          
        }
</style>

<section>
    <div id="carousel-berita" class="carousel slide carousel-berita" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://lh3.googleusercontent.com/p/AF1QipPP-Nb412be8Ek6M_MxRuRzE7s2sNB9e__OIqX_=s1134-k-no" alt="Berita 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Berita</h5>
                    <p>Isi berita di sini</p>
                </div>
            </div>            
        </div>
        <a class="carousel-control-prev" href="#carousel-berita" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Sebelumnya</span>
        </a>
        <a class="carousel-control-next" href="#carousel-berita" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Berikutnya</span>
        </a>
    </div>
</section>

<div class="container-fluid pt-3 mb-3">
    <section class="container justify-content-evenly align-content-center d-flex pb-5">
        <div class="mt-5 w-25 box-siswa">
            <div class="card border-dark">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                      <h4 class="card-title">Jumlah Siswa</h4>
                      <p class="card-text">1.200</p>
                    </div>
                    <i class="fa-solid fa-graduation-cap fa-3x me-4"></i>
                </div>
            </div>
        </div>
        <div class="mt-5 w-25 box-guru">
            <div class="card border-dark">
                <div class="card-body d-flex justify-content-between align-items-center">
                  <div>
                      <h4 class="card-title">Jumlah Guru</h4>
                      <p class="card-text">900</p>
                    </div>
                    <i class="fa-solid fa-person-chalkboard fa-3x me-4"></i>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- <section class="galeri">
    <div class="row justify-content-center mt-3 pb-3 bg-light">
        <div class="col-md-4">
            <img src="{{ asset('assets/image/logo.webp') }}" alt="Galeri" class="img-fluid">
        </div>  
    </div>
</section> --}}

<section class="ekskul">
  <div class="row">

  </div>
</section>

<script>
    $('#carousel-berita').carousel({
        interval: 3000,
        wrap: true
    });
</script>
@endsection