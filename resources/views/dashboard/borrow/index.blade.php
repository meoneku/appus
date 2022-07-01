@extends('dashboard.template')
@section('container')
    <!-- Left side columns -->
    <div class="col-lg-12">
        <div class="row">

            <!-- Main Card -->
            <div class="col-xxl-12 col-xl-12">

                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Filter <span>| {{ $sFilter }}</span></h5>
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                              </li>
                              @php
                                  $tempsearch = '';
                                  if(request('search')){
                                    $tempsearch = 'search='.request('search').'&';
                                  }
                              @endphp
                              <li><a class="dropdown-item" href="/pinjam">Reset</a></li>
                              @foreach($majors as $major)
                                <li><a class="dropdown-item" href="/pinjam?{{ $tempsearch }}major={{ $major->id }}">{{ $major->major }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="mb-3 col-md-12">
                            <form action="/pinjam">
                            @if (request('major'))
                                <input type="hidden" name="major" value="{{ request('major') }}">
                            @endif
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Pencarian" value="{{ request('search') }}" aria-label="Pencarian">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i> Cari</button>
                                    <a href="/pinjam" class="btn btn-info"><i class="bi bi-x-circle"></i> Reset</a>
                                    <a href="/pinjam/add" class="btn btn-success"><i class="bi bi-plus"></i> Pinjam</a>
                                </div>
                            </form>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                          </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($borrows as $borrow )
                                <tr>
                                    <td>{{ $borrows->firstItem()+$loop->index }}</td>
                                    <td>{{ $borrow->member->member_name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($borrow->borrow_date)) }}</td>
                                    <td>{{ $borrow->major->major }}</td>
                                    <td>
                                        <a href="/pinjam/{{ $borrow->id }}/edit" class="badge bg-warning me-1"><i class="bi bi-pencil-square"></i></a>
                                        <form action="/pinjam/{{ $borrow->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Akan Di Batalkan?')"><i class="bi bi-trash"></i></button>
                                        </form>
                                        <a href="/pinjam/cetak/{{ $borrow->id }}" class="badge bg-primary me-1" target="_blank"><i class="bi bi-printer"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex justify-content-end me-4">
                                            {{ $borrows->links() }}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div><!-- End Main Card -->

        </div>
    </div><!-- End Left side columns -->
@endsection
