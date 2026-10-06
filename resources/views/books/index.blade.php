@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

<div class="fade-up">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Daftar Buku
            </h2>

            <p class="text-muted mb-0">
                Kelola koleksi buku perpustakaan.
            </p>
        </div>

        <a href="{{ route('books.create') }}"
            class="btn btn-dark">
            <i class="bi bi-plus-lg"></i>
            Tambah Buku
        </a>

    </div>

    <div class="card p-3 mb-4">

        <form method="GET"
            action="{{ route('books.index') }}"
            class="row g-2">

            <div class="col-md-10">

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari judul atau penulis..."
                    value="{{ $search }}">

            </div>

            <div class="col-md-2">

                <button class="btn btn-dark w-100">
                    <i class="bi bi-search"></i>
                    Cari
                </button>

            </div>

        </form>

    </div>

    <div class="card p-3">

        <div class="table-responsive">

            <table class="table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Tahun</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($books as $book)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <strong>
                                {{ $book->title }}
                            </strong>
                        </td>

                        <td>
                            {{ $book->author }}
                        </td>

                        <td>
                            <span class="badge text-bg-secondary">
                                {{ $book->category->name }}
                            </span>
                        </td>

                        <td>
                            {{ $book->year }}
                        </td>

                        <td>
                            {{ $book->stock }}
                        </td>

                        <td>

                            <div class="d-flex gap-1">

                                <a href="{{ route('books.show', $book) }}"
                                    class="btn btn-sm btn-outline-dark">
                                    <i class="bi bi-eye"></i>
                                </a>

                                <a href="{{ route('books.edit', $book) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form
                                    action="{{ route('books.destroy', $book) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="7"
                            class="text-center py-5 text-muted">
                            Buku tidak ditemukan.
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection