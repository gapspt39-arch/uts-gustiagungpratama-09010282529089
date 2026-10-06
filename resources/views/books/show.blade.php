@extends('layouts.app')

@section('title', 'Detail Buku')

@section('content')

<div class="fade-up">

    <div class="mb-4">

        <a href="{{ route('books.index') }}"
            class="text-decoration-none text-muted">
            ← Kembali ke daftar buku
        </a>

    </div>

    <div class="card p-4">

        <div class="d-flex justify-content-between">

            <div>

                <span class="badge text-bg-secondary mb-2">
                    {{ $book->category->name }}
                </span>

                <h2 class="fw-bold">
                    {{ $book->title }}
                </h2>

                <p class="text-muted">
                    Detail informasi buku
                </p>

            </div>

            <div>
                📚
            </div>

        </div>

        <hr>

        <div class="row g-4">

            <div class="col-md-6">

                <small class="text-muted">
                    Penulis
                </small>

                <h5>
                    {{ $book->author }}
                </h5>

            </div>

            <div class="col-md-6">

                <small class="text-muted">
                    Penerbit
                </small>

                <h5>
                    {{ $book->publisher }}
                </h5>

            </div>

            <div class="col-md-6">

                <small class="text-muted">
                    Tahun Terbit
                </small>

                <h5>
                    {{ $book->year }}
                </h5>

            </div>

            <div class="col-md-6">

                <small class="text-muted">
                    Stok
                </small>

                <h5>
                    {{ $book->stock }} buku
                </h5>

            </div>

        </div>

        <hr>

        <div>

            <a href="{{ route('books.edit', $book) }}"
                class="btn btn-primary">
                <i class="bi bi-pencil"></i>
                Edit Buku
            </a>

            <a href="{{ route('books.index') }}"
                class="btn btn-light">
                Kembali
            </a>

        </div>

    </div>

</div>

@endsection