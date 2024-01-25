@extends('dashboard.layout.main')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <h1 class="mt-2 mb-4">Slide Baru</h1>
                @if (Session::get('info'))
                    <div class="alert alert-info">
                        {{ Session::get('info') }}
                    </div>
                @endif
                <a href="/dashboard/slide/create" class="btn btn-outline-primary mb-2" title="tambah slide">
                    Slide Baru
                </a>
                <table class="table table-hover table-sm">
                    <thead>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Headline</th>
                        <th>Operasi</th>
                    </thead>

                    <tbody>
                        {{-- diambil dari model slideController nama {slides} --}}
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($slides as $slide)
                            <tr>


                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('image/' . $slide->gambar) }}" alt="slide" width="250px">
                                </td>
                                <td class="col-7">
                                    {{ $slide->judul }}
                                </td>
                                <td class="col-1">
                                    <a href="/dashboard/slide/{{ $slide->id }}/edit" class="btn btn-warning "
                                        title="edit slide">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="/dashboard/slide/{{ $slide->id }}/edit" method="post" class="d-inline"
                                        onsubmit="return confirm('anda yakin mau menghapus')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ">
                                            <i class="fa-solid fa-trash"></i> </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
