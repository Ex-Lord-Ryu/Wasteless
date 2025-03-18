@extends('layouts.app')

@section('title', 'Daftar Mitra')

@section('content')
<div class="container-fluid p-0">
    <div class="row g-0 justify-content-center align-items-center">
        <div class="col-11 col-md-9 bg-white rounded-4 shadow-sm overflow-hidden">
            <div class="row g-0">
                <div class="col-md-6 p-4">
                    <div class="login-form-container" style="max-width: 100%;">
                        <div class="mb-4">
                            <a href="{{ url('/') }}" class="d-inline-block mb-4">
                                <img src="{{ asset('img/logo/logo_auth.svg') }}" alt="Logo" height="24" class="me-2">
                            </a>
                            <h2 class="fw-bold mb-2">Daftar Mitra</h2>
                            <p class="text-muted">Welcome! Please create your partner account.</p>
                        </div>

                        <form method="POST" action="{{ route('mitra.register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_bisnis" class="form-label">Nama Bisnis</label>
                                <input id="nama_bisnis" type="text" class="form-control @error('nama_bisnis') is-invalid @enderror"
                                    name="nama_bisnis" value="{{ old('nama_bisnis') }}" required autocomplete="nama_bisnis" autofocus
                                    placeholder="Masukkan Nama Bisnis">
                                @error('nama_bisnis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_pic" class="form-label">Nama PIC</label>
                                <input id="nama_pic" type="text" class="form-control @error('nama_pic') is-invalid @enderror"
                                    name="nama_pic" value="{{ old('nama_pic') }}" required autocomplete="nama_pic"
                                    placeholder="Masukkan Nama PIC">
                                @error('nama_pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="Masukkan Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                                <input id="jenis_makanan" type="text" class="form-control @error('jenis_makanan') is-invalid @enderror"
                                    name="jenis_makanan" value="{{ old('jenis_makanan') }}" required
                                    placeholder="Masukkan Jenis Makanan">
                                @error('jenis_makanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_telepon" class="form-label">No. Telephone</label>
                                <input id="no_telepon" type="tel" class="form-control @error('no_telepon') is-invalid @enderror"
                                    name="no_telepon" value="{{ old('no_telepon') }}" required
                                    placeholder="Masukkan No. Telephone">
                                @error('no_telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea id="alamat" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" required rows="2"
                                    placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="banyak_penjualan" class="form-label">Banyak penjualan sehari</label>
                                <select id="banyak_penjualan" class="form-control @error('banyak_penjualan') is-invalid @enderror"
                                    name="banyak_penjualan" required placeholder="Pilih jumlah penjualan">
                                    <option value="" selected disabled>Pilih jumlah penjualan</option>
                                    <option value="< 50" {{ old('banyak_penjualan') == '< 50' ? 'selected' : '' }}>Kurang dari 50</option>
                                    <option value="50-100" {{ old('banyak_penjualan') == '50-100' ? 'selected' : '' }}>50 - 100</option>
                                    <option value="100-150" {{ old('banyak_penjualan') == '100-150' ? 'selected' : '' }}>100 - 150</option>
                                    <option value="150-200" {{ old('banyak_penjualan') == '150-200' ? 'selected' : '' }}>150 - 200</option>
                                    <option value="> 200" {{ old('banyak_penjualan') == '> 200' ? 'selected' : '' }}>Lebih dari 200</option>
                                </select>
                                @error('banyak_penjualan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <button type="submit" class="btn btn-success py-2 w-100">
                                    Daftar
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="mb-0">Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block p-0">
                    <div class="h-100 d-flex align-items-center justify-content-center rounded-end-4">
                        <img src="{{ asset('img/Picture-Auth.png') }}" alt="Fresh vegetables" class="img-fluid p-4" style="object-fit: cover; max-height: 100%; border-radius: 25px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection