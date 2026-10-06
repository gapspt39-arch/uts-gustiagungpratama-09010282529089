@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="fade-up">

    <div class="mb-4">
        <h2 class="fw-bold">
            Dashboard
        </h2>

        <p class="text-muted">
            Selamat datang di sistem perpustakaan.
        </p>
    </div>

    <div class="row g-4 mb-4">

        <div class="col-md-4">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">
                            Total Buku
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ $totalBooks }}
                        </h2>
                    </div>

                    <div class="stat-icon">
                        📚
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">
                            Kategori
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ $totalCategories }}
                        </h2>
                    </div>

                    <div class="stat-icon">
                        🗂️
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-4">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <p class="text-muted mb-1">
                            Total Stok
                        </p>

                        <h2 class="fw-bold mb-0">
                            {{ $totalStock }}
                        </h2>
                    </div>

                    <div class="stat-icon">
                        📦
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="card p-4">

        <h5 class="fw-bold">
            Kelola Buku
        </h5>

        <p class="text-muted">
            Tambahkan, ubah, lihat detail, atau hapus data buku.
        </p>

        <a href="{{ route('books.index') }}"
            class="btn btn-dark">
            <i class="bi bi-arrow-right"></i>
            Lihat Daftar Buku
        </a>

    </div>

</div>

@endsection