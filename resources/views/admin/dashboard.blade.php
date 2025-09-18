    @extends('admin.layout')
    @section('content')
    <style>
        .box-siswa .card{
            background: linear-gradient(135deg,#81c784, #4caf50);
            color: white;
            border: none;
        }
        .box-guru .card{
            background: linear-gradient(135deg,#ffb300, #fb8c00);           
            color: white;
            border: none;
        }
    </style>
        <div class="container-fluid pt-3">
            <section class="container justify-content-evenly align-content-center d-flex pb-5">
                <div class="mt-5 w-25 box-siswa">
                    <div class="card border-dark">
                        <div class="card-body">
                            <h4 class="card-title">Jumlah Siswa</h4>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 w-25 box-guru">
                    <div class="card border-dark">
                        <div class="card-body">
                            <i class=""></i>
                            <h4 class="card-title">Jumlah Guru</h4>
                            <p class="card-text">Text</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @endsection
