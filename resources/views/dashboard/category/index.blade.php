@extends('dashboard.layout.main')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">
            <div class="card-body px-4">
                <div class="d-flex justify-content-between col-lg">
                    <h1 class="ht-2 mb-4">Kategori</h1>
                </div>
                @if (Session::get('info'))
                    <div class="alert alert-info">
                        {{ Session::get('info') }}
                    </div>
                @endif
                <a href="/dashboard/category/create" class="btn btn-outline-primary mb-3"><i cl fa-solid fa-plus></i>Kategori
                    Baru</a>

                <table class="table table-hover table-sm" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Category</th>
                            <th>Deskripsi</th>
                            <th>Operasi</th>
                        </tr>
                    </thead>
                    {{-- <tbody>


                        @foreach (categories as categori)
                            <tr>
                                <td>{{ $nomer++ }}</td>
                                <td>{{ $categori->nama }}</td>
                                <td>{{ $categori->deskripsi }}</td>
                                <td>{{ $categori->operasi }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm" id="edit"></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody> --}}
                </table>
            </div>
        </div>
    </div>
    <script>
        function getSlug() {
            $.get('{{ url('/slug-kategori') }}', {
                    'kategori': $('#kategori').val()
                },
                function(data) {
                    $('#slug').val(data.slug)
                })
        }
    </script>
@endsection
