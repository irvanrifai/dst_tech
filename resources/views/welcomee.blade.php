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
                            <th scope="col">UUID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $d->uuid }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->type }}</td>
                                <td>{{ $d->price }}</td>
                                <td>{{ $d->quantity }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a data-bs-toggle="modal" data-bs-target="#edit<?= $d['id'] ?>"><span
                                                class="badge bg-warning text-dark"><i class="fa fa-pencil"></i></span></a>
                                        <a data-bs-toggle="modal" class="mx-1"
                                            data-bs-target="#hapus<?= $d['id'] ?>"><span class="badge bg-danger"><i
                                                    class="fa fa-trash"></i></span></a>
                                        <a data-bs-toggle="modal" data-bs-target="#detail<?= $d['id'] ?>"><span
                                                class="badge bg-info"><i class="fa-solid fa-info mx-1"></i></span></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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

    <!-- modal untuk tambah data -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah data baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form novalidate action="/PendudukController" role="form" method="POST"
                    enctype="multipart/form-data" id="form_tambah" class="needs-validation">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="row mb-2 g-3">
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="uuid" class="form-label">uuid</label><span
                                        class="text-danger">*</span>
                                    <input type="number" class="form-control @error('uuid') is-invalid @enderror"
                                        name="uuid" id="uuid" placeholder="Nomor Induk Kependudukan" required
                                        maxlength="16" value="{{ old('uuid') }}">
                                    @error('uuid')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="name" class="form-label">name</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="name lengkap" required
                                        value="{{ old('name') }}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="type" class="form-label">Type</label><span
                                        class="text-danger">*</span>
                                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                                        name="type" id="type" placeholder="Jakarta" required
                                        value="{{ old('type') }}">
                                    @error('type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-3 form-group">
                                    <label for="price" class="form-label">Price</label><span
                                        class="text-danger">*</span>
                                    <input type="date" class="form-control @error('price') is-invalid @enderror"
                                        name="price" id="price" value="{{ old('price') }}">
                                    @error('price')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-2 form-group">
                                    <label for="quantity" class="form-label">Quantity</label><span
                                        class="text-danger">*</span>
                                    <select class="form-select @error('quantity') is-invalid @enderror" id="quantity"
                                        name="quantity">
                                        <option value="{{ old('quantity') ? old('quantity') : '' }}" selected disabled>
                                            Pilih
                                        </option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                        <option value="Tidak diketahui">Tidak diketahui</option>
                                    </select>
                                    @error('quantity')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                        <button type="submit" class="bi bi-plus-square btn btn-primary" id="btn_tambah"><i
                                class="fa fa-plus"></i> Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal untuk edit data -->
    @foreach ($data as $d)
        <div class="modal fade" id="edit<?= $d['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editLabel">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel">Edit data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/PendudukController/{{ $d->id }}" method="POST" role="form"
                        enctype="multipart/form-data" class="needs-validation">
                        @method('PUT')
                        {{-- @method('PATCH') --}}
                        @csrf
                        <input type="hidden" name="berlaku" id="berlaku" value="Seumur Hidup">
                        {{-- <input type="hidden" name="uuid" id="uuid" value="{{ $d->uuid }}"> --}}
                        <div class="modal-body">
                            <div class="row">
                                <div class="row mb-2 g-3">
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="uuid" class="form-label">uuid</label><span
                                            class="text-danger">*</span>
                                        <input type="number" class="form-control @error('uuid') is-invalid @enderror"
                                            name="uuid" id="uuid" placeholder="Nomor Induk Kependudukan" required
                                            maxlength="16" value="{{ old('uuid', $d->uuid) }}">
                                        @error('uuid')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="name" class="form-label">name</label><span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name" placeholder="name lengkap" required
                                            value="{{ old('name', $d->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="type" class="form-label">Type</label><span
                                            class="text-danger">*</span>
                                        <input type="text" class="form-control @error('type') is-invalid @enderror"
                                            name="type" id="type" placeholder="Jakarta" required
                                            value="{{ old('type', $d->type) }}">
                                        @error('type')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3 col-md-3 form-group">
                                        <label for="price" class="form-label">Price</label><span
                                            class="text-danger">*</span>
                                        <input type="date" class="form-control @error('price') is-invalid @enderror"
                                            name="price" id="price" value="{{ old('price', $d->price) }}">
                                        @error('price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-2 form-group">
                                        <label for="quantity" class="form-label">Quantity</label><span
                                            class="text-danger">*</span>
                                        <select class="form-select @error('quantity') is-invalid @enderror" id="quantity"
                                            name="quantity">
                                            <option value="{{ old('quantity', $d->quantity) }}" selected disabled>
                                                {{ old('quantity', $d->quantity) }}</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Tidak diketahui">Tidak diketahui</option>
                                        </select>
                                        @error('quantity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                            <button type="submit" class="bi bi-plus-square btn btn-primary" id="btn_tambah">
                                Update</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    @endforeach

    <!-- modal untuk hapus data -->
    @foreach ($data as $d)
        <div class="modal fade" id="hapus<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/PendudukController/{{ $d->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('delete')
                            @csrf
                            <div class="modal-body modal-lg">
                                <h6 class="text-uppercase fs-5">uuid : {{ $d->uuid }}</h6>
                                <h6 class="text-uppercase fs-6">name : {{ $d->name }}</h6>
                                <hr>
                                <div id="emailHelp" class="form-text">Apakah anda yakin akan menghapus data KTP atas name
                                    {{ $d->name }}?</div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="bi bi-close btn btn-secondary" data-bs-dismiss="modal">Batal</button> -->
                                <button name="delete" class="bi bi-trash btn btn-danger"> Hapus</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
