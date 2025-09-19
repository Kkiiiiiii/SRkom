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
        .box-guru .card:hover{
            transform: translateY(-3px);          
        }
        .box-siswa .card:hover{
            transform: translateY(-3px);          
        }
    </style>
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
    @endsection
