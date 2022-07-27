@extends('layouts.main')

@section('container')
    <div class="row mt-4">
        {{-- alert success login --}}
        @if (session()->has('success_login_a'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_login_a') }}
                </div>
            </div>
        @endif
        @if (session()->has('success_login_u'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_login_u') }}
                </div>
            </div>
        @endif

        {{-- alert condition create --}}
        @if (session()->has('success_c'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_c') }}
                </div>
            </div>
        @endif
        @if (session()->has('failed_c'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    {{ session('failed_c') }}
                </div>
            </div>
        @endif

        {{-- alert condition update --}}
        @if (session()->has('success_u'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_u') }}
                </div>
            </div>
        @endif
        @if (session()->has('failed_u'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    {{ session('failed_u') }}
                </div>
            </div>
        @endif

        {{-- alert condition delete --}}
        @if (session()->has('success_d'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                    <use xlink:href="#check-circle-fill" />
                </svg>
                <div>
                    {{ session('success_d') }}
                </div>
            </div>
        @endif
        @if (session()->has('failed_d'))
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                    <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                    {{ session('failed_d') }}
                </div>
            </div>
        @endif

        {{-- dashboard info card --}}
        <div class="col">
            <div class="container-fluid">
                <div class="row">
                    <h3>User Activity</h3>
                    <!-- total user -->
                    <div class="col-xl-4 col-md-6 mb-4 mt-3">
                        <div class="card border-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">User Logged in
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $userLoggedIn }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300" style="color:red; opacity:60%;"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- tabel data --}}
    <div class="row mt-4">
        <div class="col">
            <h3>Data produk</h3>
            <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#tambah"><i
                    class="fa fa-plus"></i>
                Tambah data
            </button>
            <div class="table-responsive">
                <table id="tb_ktp" class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">NIK</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Tempat/Tgl Lahir</th>
                            <th scope="col">Jenis kelamin</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($data as $d) --}}
                        <tr>
                            {{-- <td scope="row">{{ $loop->iteration }}</td> --}}
                            {{-- <td><img src="https://source.unsplash.com/100x120/?man" alt=""></td> --}}
                            <td><img src="img/SD-default-image.png" width="100" height="110" alt="">
                            </td>
                            {{-- <td>{{ $d->NIK }}</td> --}}
                            {{-- <td>{{ $d->nama }}</td> --}}
                            {{-- <td>{{ $d->tm_lahir }}, {{ $d->tgl_lahir }}</td> --}}
                            {{-- <td>{{ $d->jk }}</td> --}}
                            {{-- <td>{{ $d->add }}, RT {{ $d->rt }}/ RW {{ $d->rw }}, --}}
                            {{-- {{ $d->kel }}, {{ $d->kec }}, {{ $d->kab }}</td> --}}
                            <td>
                                <div class="d-flex">
                                    <a data-bs-toggle="modal" data-bs-target="#edit"><span
                                            class="badge bg-warning text-dark"><i class="fa fa-pencil"></i></span></a>
                                    <a data-bs-toggle="modal" class="mx-1" data-bs-target="#hapus"><span
                                            class="badge bg-danger"><i class="fa fa-trash"></i></span></a>
                                    <a data-bs-toggle="modal" data-bs-target="#detail"><span class="badge bg-info"><i
                                                class="fa-solid fa-info mx-1"></i></span></a>
                                </div>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tb_ktp').DataTable();
        });
    </script>
@endsection
