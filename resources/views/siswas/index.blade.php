@extends('layouts.index')
@section('content')
<div>
    <h1>CRUD Siswa</h1>
    <table>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Umur</th>
        </tr>
        @foreach ($siswas as $siswa)
        <tr>
        <td>{{$siswa->nama}}</td>
        <td>{{$siswa->alamat}}</td>
        <td>{{$siswa->umur}} tahun</td>
        </tr>
        @endforeach

    </table>
</div>

@endsection
