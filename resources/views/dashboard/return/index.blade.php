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
                              <li><a class="dropdown-item" href="/kembali">Reset</a></li>
                              @foreach($majors as $major)
                                <li><a class="dropdown-item" href="/kembali?{{ $tempsearch }}major={{ $major->id }}">{{ $major->major }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="mb-3 col-md-12">
                            <form action="/kembali">
                            @if (request('major'))
                                <input type="hidden" name="major" value="{{ request('major') }}">
                            @endif
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Pencarian" value="{{ request('search') }}" aria-label="Pencarian">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i> Cari</button>
                                    <a href="/kembali" class="btn btn-info"><i class="bi bi-x-circle"></i> Reset</a>
                                    <a href="/kembali/tambah" class="btn btn-success"><i class="bi bi-plus"></i> Pengembalian</a>
                                </div>
                            </form>
                        </div>
                        @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }} <a href="/kembali/cetak/{{ session('dataid') }}" target="_blank"> Cetak</a> Tanda Terima
                          </div>
                        @endif
                        @if(session()->has('delete'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('delete') }}
                          </div>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Peminjam</th>
                                    <th scope="col">Tanggal Kembali</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reversions as $reversion )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $reversion->member->member_name }}</td>
                                    <td>{{ date('d-m-Y', strtotime($reversion->return_date)) }}</td>
                                    <td>{{ $reversion->member->major->major }}</td>
                                    <td>
                                        <a href="/kembali/cetak/{{ $reversion->id }}" class="badge bg-info me-1" target="_blank"><i class="bi bi-printer"></i></a>
                                        <form action="/kembali/{{ $reversion->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="badge bg-danger border-0" onclick="return confirm('Yakin Akan Di Batalkan?')"><i class="bi bi-x-circle"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex justify-content-end me-4">
                                            {{ $reversions->links() }}
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
