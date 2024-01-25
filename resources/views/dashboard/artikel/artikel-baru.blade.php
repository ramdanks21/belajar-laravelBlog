@extends('dashboard.layout.main')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="ht-2 mb-4">Article Baru</h1>
                    <div class="mt-3"><a href="/dashboard/article" class="btn btn-transparent text-primary mb-2"><i
                                class="fa-solid fa-arrow-left"></i>Kembali</a>
                    </div>

                </div>
                <div class="col-lg">
                    @if (Session::get('info'))
                        <div class="alert alert-info">
                            {{ Session::get('info') }}
                        </div>
                    @elseif ($errors->any())
                        <div class="alert alert-danger">
                            {{ 'Input Artikel  Gagal..' }}
                        </div>
                    @endif

                    <form action="/dashboard/article" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">
                                Judul</label>

                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                value="{{ old('judul') }}" onkeyup=" getSlug() " name="judul">

                            @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">
                                Slug </label> <input type="text" class="form-control @error('slug') is-invaiid @enderror"
                                id="slug" value="{{ old('slug') }}" readonly>

                            @error('slug')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">
                                Kategori </label>
                            <select name="category_id" id=""
                                class="form-select @error('category_id') is-invaiid @enderror">
                                <option value="">--- Pilih kateogri ----</option>
                                @foreach ($categories as $category)
                                    @if (old('category_id') == $category->id)
                                        <option value="{{ $category->id }}" selected>
                                            {{ $category->nama }}
                                        </option>
                                    @else
                                        <option value="{{ $category->id }}">
                                            {{ $category->nama }}
                                        </option>
                                    @endif
                                @endforeach

                            </select>

                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">
                                Deskripsi </label>

                            @error('deskripsi')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror

                            <textarea name="deskripsi" class="form-control" value="">
                                {{ old('deskripsi') }}
                            </textarea>




                        </div>

                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-xmark"></i> Reset</button>

                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-save"></i> Save</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <script>
        function getSlug() {
            $.get('{{ url('/slug-artikel') }}', {
                    'judul': $('#judul').val()
                },
                function(data) {
                    $('#slug').val(data.slug)
                })
        }
    </script>
@endsection
