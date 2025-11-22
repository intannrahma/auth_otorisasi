@extends('layouts.app')

@section('content')
   
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Mahasiswa</a>  
    <form action="{{ route('mahasiswa.index') }}" method="GET" class="mb-3 d-flex">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari Mahasiswa" value="{{ $search }}">
        <button type="submit" class="btn btn-outline-primary">Cari</button>
    </form>


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="border-collapse border border-gray-400 w-full">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">ID</th>
                <th class="border p-2">Nama</th>
                <th class="border p-2">NIM</th>
                <th class="border p-2">Jurusan</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Alamat</th>
                <th class="border p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $mhs)
                <tr>
                    <td class="border p-2">{{ $mhs->id }}</td>
                    <td class="border p-2">{{ $mhs->nama }}</td>
                    <td class="border p-2">{{ $mhs->nim }}</td>
                    <td class="border p-2">{{ $mhs->jurusan }}</td>
                    <td class="border p-2">{{ $mhs->email }}</td>
                    <td class="border p-2">{{ $mhs->alamat }}</td>
                    <td class="border p-2">
                       
                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                            </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

{{-- Link pagination --}}
{{ $data->links() }}