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
                              <li><a class="dropdown-item" href="/buku">Reset</a></li>
                              @foreach($categories as $category)
                                <li><a class="dropdown-item" href="/buku?{{ $tempsearch }}category={{ $category->id }}">{{ $category->category }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="mb-3 col-md-12">
                          @if(session()->has('success'))
                              <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                              </div>
                          @endif
                          </div>
                            <form action="/buku">
                                 @if (request('category'))
                                  <input type="hidden" name="category" value="{{ request('category') }}">
                                 @endif
                                 <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Pencarian" value="{{ request('search') }}" aria-label="Pencarian">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i> Cari</button>
                                    <a href="/buku" class="btn btn-info"><i class="bi bi-x-circle"></i> Reset</a>
                                    <a href="/buku/create" class="btn btn-success"><i class="bi bi-plus"></i> Tambah</a>
                                    <a href="/import/buku" class="btn btn-primary"><i class="bi bi-file-earmark-code"></i> Import</a>
                                </div>
                            </form>
                        </div>
                        <div class="container p-1">
                            <div class="row">
                                @foreach($books as $book)
                                <div class="col-xxl-6 col-md-12">
                                    <div class="card info-card sales-card">
                      
                                      <div class="card-body">
                                        <h5 class="card-title">{{ $book->author }} | <span>{{ $book->publisher }}</span></h5>
                      
                                        <div class="d-flex align-items-center">
                                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <img src="{{ url('uploads').'/'.$book->cover }}" alt="Foto" width="64px" height="86px">
                                          </div>
                                          <div class="ps-3 mt-0">
                                            <span class="small pt-1 fw-bold">{{ $book->title }}</span><br>
                                            <span class="text-danger pt-1 fw-bold">{{ $book->category->category }}</span><br>
                                            <span class="text-success small pt-1 fw-bold">{{ $book->publisher }}</span><br><span class="text-primary small pt-1">Rak {{ $book->rack }}</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex justify-content-end pe-3">
                                        <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#details-modal" data-book="{{ $book->id }}"><i class="bi bi-eye"></i><small> Detail</small></button>
                                        <a href="/buku/{{ $book->id }}/edit" class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil-square"></i><small> Edit</small></a>
                                        <form action="/buku/{{ $book->id }}" method="post" class="d-inline">
                                          @method('delete')
                                          @csrf
                                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akan Di Hapus?')"><i class="bi bi-trash"></i><small> Hapus</small></button>
                                        </form>
                                      </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                </div>

                <div class="d-flex justify-content-end me-4">
                    {{ $books->links() }}
                </div>
            </div><!-- End Main Card -->

            <div class="modal fade" id="details-modal" tabindex="-1" aria-labelledby="details-modal" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body" id="isi00">

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div><!-- End Left side columns -->
    <script src="{{ url('assets/vendor/jquery/jquery.js') }}"></script>

    <script>
        $('#details-modal').on('show.bs.modal', event => {
          var book = $(event.relatedTarget).data('book');
          $.ajax({
            url: `/buku/${book}`, // the url for your show method
            method: 'get'
          })
          .done(data => $('.modal-body').html(data));
        });
    </script>
@endsection