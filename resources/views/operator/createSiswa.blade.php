@extends('operator.layout')
@section('content')
<div class="container my-5">
    <h3>Tambahkan data Siswa</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif


</div>
@endsection
