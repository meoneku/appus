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
                              <li><a class="dropdown-item" href="/anggota">Reset</a></li>
                              @foreach($majors as $major)
                                <li><a class="dropdown-item" href="/anggota?{{ $tempsearch }}major={{ $major->id }}">{{ $major->major }}</a></li>
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
                            <form action="/anggota">
                                 @if (request('major'))
                                  <input type="hidden" name="major" value="{{ request('major') }}">
                                 @endif
                                 <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Pencarian" value="{{ request('search') }}" aria-label="Pencarian">
                                    <button class="btn btn-danger" type="submit"><i class="bi bi-search"></i> Cari</button>
                                    <a href="/anggota" class="btn btn-info"><i class="bi bi-x-circle"></i> Reset</a>
                                    <a href="/anggota/create" class="btn btn-success"><i class="bi bi-plus"></i> Tambah</a>
                                    <a href="/import/anggota" class="btn btn-primary"><i class="bi bi-file-earmark-code"></i> Import</a>
                                </div>
                            </form>
                        </div>
                        <div class="container p-1">
                            <div class="row">
                                @foreach($members as $member)
                                <div class="col-xxl-4 col-md-4">
                                    <div class="card info-card sales-card">
                      
                                      <div class="card-body">
                                        <h5 class="card-title">{{ $member->member_name }} <span>| {{ $member->member_number }}</span></h5>
                      
                                        <div class="d-flex align-items-center">
                                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <img src="{{ url('uploads').'/'.$member->photo }}" alt="Foto" width="64px" height="64px" class="rounded-circle">
                                          </div>
                                          <div class="ps-3 mt-0">
                                            <h6>{{ $member->major->designation.$member->year }}</h6>
                                            <span class="text-success small pt-1 fw-bold">{{ $member->phonenumber }}</span> <span class="text-muted small pt-2 ps-1">{{ $member->gender }}</span>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="d-flex justify-content-end pe-3">
                                        <button type="button" class="btn btn-sm btn-info me-1" data-bs-toggle="modal" data-bs-target="#details-modal" data-member="{{ $member->id }}"><i class="bi bi-eye"></i><small> Detail</small></button>
                                        <a href="/anggota/{{ $member->id }}/edit" class="btn btn-sm btn-warning me-1"><i class="bi bi-pencil-square"></i><small> Edit</small></a>
                                        <form action="/anggota/{{ $member->id }}" method="post" class="d-inline">
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
                    {{ $members->links() }}
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
          var member = $(event.relatedTarget).data('member');
          $.ajax({
            url: `/anggota/${member}`, // the url for your show method
            method: 'get'
          })
          .done(data => $('.modal-body').html(data));
        });
    </script>
@endsection