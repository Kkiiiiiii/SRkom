    @extends('admin.layout')
    @section('content')
        <style>
            .stat-card {
                border: none;
                color: white;
                transition: transform 0.3s ease;
            }

            .stat-card:hover {
                transform: translateY(-5px);
            }

            .box-siswa .card {
                background: linear-gradient(135deg, #81c784, #4caf50);
            }

            .box-guru .card {
                background: linear-gradient(135deg, #ffb300, #fb8c00);
            }

            .stat-card i {
                font-size: 2.5rem;
                margin-bottom: 10px;
            }

            .stat-number {
                font-size: 1.8rem;
                font-weight: bold;
                margin: 0;
            }
        </style>
       <h3 class="mt-4">Dashboard</h3>
       <hr>
        <section class="container justify-content-evenly align-content-center d-flex pb-5 mt-5">
            <div class="d-flex">
                <div class="col-md-6">
                    <div class="row g-4">
                        <div class="col-md-6 box-siswa">
                            <div class="card stat-card p-3 text-center">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <h5>Jumlah Siswa</h5>
                                <p class="stat-number">1200</p>
                            </div>
                        </div>
                        <div class="col-md-6 box-guru">
                            <div class="card stat-card p-3 text-center">
                                <i class="fa-solid fa-person-chalkboard"></i>
                                <h5>Jumlah Guru</h5>
                                <p class="stat-number">{{ $guru->count() }}</p>
                            </div>
                        </div>
                          <div class="col-md-6 box-guru">
                            <div class="card stat-card p-3 text-center">
                                <i class="fa-solid fa-newspaper"></i>
                                <h5>Jumlah Berita</h5>
                                <p class="stat-number">19</p>
                            </div>
                        </div>
                          <div class="col-md-6 box-guru">
                            <div class="card stat-card p-3 text-center">
                                <i class="fa-solid fa-photo-film"></i>
                                <h5>Jumlah Galeri</h5>
                                <p class="stat-number">12</p>
                            </div>
                        </div>
                          <div class="col-md-6 box-guru">
                            <div class="card stat-card p-3 text-center">
                                <i class="fa-solid fa-sitemap"></i>
                                <h5>Jumlah Ekstrakurikuler</h5>
                                <p class="stat-number">25</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
