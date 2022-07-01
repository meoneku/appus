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
                              <li><a class="dropdown-item" href="/pbuku">Reset</a></li>
                              @foreach($categories as $category)
                                <li><a class="dropdown-item" href="/pbuku?{{ $tempsearch }}category={{ $category->id }}">{{ $category->category }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="mb-3 col-md-12">
                          </div>
                            <form action="/pbuku">
                                 @if (request('category'))
                                  <input type="hidden" name="category" value="{{ request('category') }}">
                                 @endif
                                 <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Pencarian" value="{{ request('search') }}" aria-label="Pencarian">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i> Cari</button>
                                    <a href="/pbuku" class="btn btn-info"><i class="bi bi-x-circle"></i> Reset</a>
                                </div>
                            </form>
                        </div>
                        <div class="container p-1">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">IBSN</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book )
                                    <tr>
                                        <td>{{ $books->firstItem()+$loop->index }}</td>
                                        <td>{{ $book->isbn }}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->category->category }}</td>
                                        <td>{{ $book->stock }}</td>
                                        <td>
                                            <a href="/pbuku/cetak/{{ $book->id }}" class="badge bg-primary me-1" target="_blank"><i class="bi bi-printer"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            <div class="d-flex justify-content-end me-4">
                                                {{ $books->links() }}
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
    </div>
@endsection