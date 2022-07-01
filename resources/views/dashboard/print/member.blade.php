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
                                  $search = 0;
                                  $tempsearch = '';
                                  if(request('search')){
                                    $tempsearch = 'search='.request('search').'&';
                                    $cari = request('search');
                                  }
                                  $yer = 0;
                                  $tempyear = '';
                                  if(request('year')){
                                    $tempyear = 'year='.request('year').'&';
                                    $yer = request('year');
                                  }
                                  $mjr = 0;
                                  if(request('major')){
                                    $mjr = request('major');
                                  }
                              @endphp
                              <li><a class="dropdown-item" href="/panggota">Reset</a></li>
                              @foreach($majors as $major)
                                <li><a class="dropdown-item" href="/panggota?{{ $tempsearch }}{{ $tempyear }}major={{ $major->id }}">{{ $major->major }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="mb-3 col-md-12">
                            <form action="/panggota">
                                 @if (request('major'))
                                  <input type="hidden" name="major" value="{{ request('major') }}">
                                 @endif
                                 <div class="input-group">
                                    <input type="text" name="search" class="form-control w-50" placeholder="Pencarian" value="{{ request('search') }}" aria-label="Pencarian">
                                    <select class="form-select" name="year" aria-label="multiple select example">
                                        <option value="" selected>Semua</option>
                                        @for ($year = env('APP_YEAR_BEGIN'); $year <= date('Y'); $year++)
                                        @if($year == request('year'))
                                        <option value="{{ $year }}" selected>{{ $year }}</option>
                                        @else
                                        <option value="{{ $year }}">{{ $year }}</option>
                                        @endif
                                        @endfor                                       
                                    </select>
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i> Cari</button>
                                    <a href="/panggota" class="btn btn-info"><i class="bi bi-x-circle"></i> Reset</a>
                                    <a href="/panggota/cetak/{{ $mjr }}/{{ $yer }}/{{ $search }}" class="btn btn-primary" target="_blank"><i class="bi bi-printer"></i> Cetak Semua</a>
                                </div>
                            </form>
                        </div>
                        <div class="mb-3 col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Angkatan</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($members as $member )
                                    <tr>
                                        <td>{{ $members->firstItem()+$loop->index }}</td>
                                        <td>{{ $member->member_number }}</td>
                                        <td>{{ $member->member_name }}</td>
                                        <td>{{ $member->major->major }}</td>
                                        <td>{{ $member->year }}</td>
                                        <td>
                                            <a href="/panggota/cetak/{{ $member->id }}" class="badge bg-primary me-1" target="_blank"><i class="bi bi-printer"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            <div class="d-flex justify-content-end me-4">
                                                {{ $members->links() }}
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