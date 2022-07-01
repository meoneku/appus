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
                              <li><a class="dropdown-item" href="/rbuku">Reset</a></li>
                              @foreach($categories as $category)
                                <li><a class="dropdown-item" href="/rbuku?category={{ $category->id }}">{{ $category->category }}</a></li>
                              @endforeach
                            </ul>
                        </div>
                        <div class="mb-3 col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ISBN</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book )
                                <tr>
                                    <td>{{ $books->firstItem()+$loop->index }}</td>
                                    <td>{{ $book->isbn }}</td>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->category->category }}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4">
                                        <div class="d-flex justify-content-end me-4">
                                            {{ $books->links() }}
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        @php
                                        $cat = '0';
                                        if(request('category')){
                                            $cat = request('category');
                                        }
                                        @endphp
                                        <form method="POST" action="/rbuku/{{ $cat }}" class="form-control blok" enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success"><i class="bi bi-file-excel"></i> Eksport</button>&nbsp;&nbsp;
                                                <a href="/rbuku/{{ $cat }}" class="btn btn-primary" target="_blank"><i class="bi bi-printer"></i> Cetak</a>
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
