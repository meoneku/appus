@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Master <span>| Data Jurusan</span></h5>
                        <div class="d-flex flex-row-reverse mb-3">
                            <a href="{{ url('/jurusan/create') }}" class="btn btn-success right-block"><i
                                    class="bi bi-plus"></i> Tambah</a>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                          </div>
                        @endif
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Sebutan</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($majors as $major)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $major->major }}</td>
                                    <td>{{ $major->designation }}</td>
                                    <td>
                                        <a href="/jurusan/{{ $major->id }}/edit" class="badge bg-warning me-1"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/jurusan/{{ $major->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Akan Di Hapus?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                    </div>
                </div>

            </div><!-- End Main Card -->

        </div>
    </div><!-- End Left side columns -->
@endsection
