@extends('dashboard.layout.main')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="ht-2 mb-4">Slide Edit</h1>
                    <div class="mt-3"><a href="/dashboard/slide" class="btn btn-transparent text-primary mb-2"><i
                                class="fa-solid fa-arrow-left"></i>Kembali</a>
                    </div>

                </div>
                <div class="col-lg">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ 'update Slide Gagal...' }}
                        </div>
                    @endif
                    <form action="/dashboard/slide/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="judul" class="form-label">Headline</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" value="{{ old('judul', $data->judul) }}">

                            @error('judul')
                                <div class="invalid-feedback  ps-3">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <br>
                            <input type="hidden" value="{{ $data->gambar }}">
                            @if ($data->gambar)
                                <img src="{{ asset('image/' . $data->gambar) }}" width="500px" alt=""
                                    class="img-fluid tampil-gambar mb-3">
                            @else
                                <img src="" width="500px" alt="" class="img-fluid tampil-gambar mb-3">
                            @endif
                            <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar"
                                name="gambar" onchange="tampilGambar()">

                            @error('gambar')
                                <div class="invalid-feedback  ps-3">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="kutipan" class="form-label">Kutipan</label>
                            @error('kutipan')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <textarea name="kutipan" id="editor" class="form-control">
                                {{ old('kutipan', $data->kutipan) }}
                            </textarea>

                        </div>


                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa-solid fa-save"></i>
                            Update</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
@endsection
