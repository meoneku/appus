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
                                @php
                                $month = 0;
                                $tempmonth = '';
                                if(request('month')){
                                  $tempmonth = 'month='.request('month').'&';
                                  $month = request('month');
                                }
                                $yer = 0;
                                $tempyear = '';
                                if(request('year')){
                                  $tempyear = 'year='.request('year').'&';
                                  $yer = request('year');
                                }
                                $majr = 0;
                                if(request('major')){
                                  $majr = request('major');
                                }
                                $months = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                            @endphp
                              </li>
                              <li><a class="dropdown-item" href="/rkembali">Reset</a></li>
                              @foreach($majors as $major)
                                <li><a class="dropdown-item" href="/rkembali?{{ $tempmonth.$tempyear }}major={{ $major->id }}">{{ $major->major }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="mb-3 col-md-12">
                            <form action="/rkembali">
                                @if (request('major'))
                                 <input type="hidden" name="major" value="{{ request('major') }}">
                                @endif
                                <div class="input-group">
                                   {{-- <input type="text" name="month" class="form-control w-50" placeholder="Pencarian" value="{{ request('month') }}" aria-label="Pencarian"> --}}
                                   <select class="form-select w-50" name="month" aria-label="multiple select example">
                                    <option value="" selected>Semua</option>
                                    @for ($i = 1; $i <= 12; $i++)
                                    @if($i == request('month'))
                                    <option value="{{ $i }}" selected>{{ $months[$i] }}</option>
                                    @else
                                    <option value="{{ $i }}">{{ $months[$i] }}</option>
                                    @endif
                                    @endfor                                       
                                    </select>
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
                                   <a href="/rkembali" class="btn btn-info"><i class="bi bi-x-circle"></i> Reset</a>
                               </div>
                           </form>
                       </div>
                       <div class="mb-3 col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Jurusan</th>
                                    <th scope="col">Tanggal Kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($backs as $back )
                                <tr>
                                    <td>{{ $backs->firstItem()+$loop->index }}</td>
                                    <td>{{ $back->borrow->borrow_number }}</td>
                                    <td>{{ $back->member->member_name }}</td>
                                    <td>{{ $back->member->major->major }}</td>
                                    <td>{{ $back->return_date }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">
                                        <div class="d-flex justify-content-end me-4">
                                            {{ $backs->links() }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">
                                        @php
                                        $cat = '0';
                                        if(request('major')){
                                            $cat = request('major');
                                        }
                                        @endphp
                                        <form method="POST" action="/rkembali/{{ $majr }}/{{ $month }}/{{ $yer }}" class="form-control blok" enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success"><i class="bi bi-file-excel"></i> Eksport</button>&nbsp;&nbsp;
                                                <a href="/rkembali/{{ $majr }}/{{ $month }}/{{ $yer }}" class="btn btn-primary" target="_blank"><i class="bi bi-printer"></i> Cetak</a>
                                            </div>
                                        </form>
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
