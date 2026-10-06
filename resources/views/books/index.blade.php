@extends('layouts.app')

@section('title', 'Daftar Buku')

@section('content')

<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1">
                <i class="bi bi-book"></i>
                Daftar Buku
            </h2>

            <p class="text-muted mb-0">
                Kelola data buku perpustakaan
            </p>
        </div>

        <a href="{{ route('books.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i>
            Tambah Buku
        </a>
    </div>


    {{-- Pesan sukses --}}
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">

        <i class="bi bi-check-circle"></i>
        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>
    @endif


    {{-- Search & Filter --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form
                action="{{ route('books.index') }}"
                method="GET">

                <div class="row g-2">

                    {{-- Search --}}
                    <div class="col-md-6">

                        <div class="input-group">

                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari berdasarkan judul atau penulis..."
                                value="{{ $search ?? '' }}">

                        </div>

                    </div>


                    {{-- Filter Kategori --}}
                    <div class="col-md-4">

                        <select
                            name="category"
                            class="form-select">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach($categories as $cat)

                            <option
                                value="{{ $cat->id }}"
                                {{ (string)($category ?? '') === (string)$cat->id ? 'selected' : '' }}>

                                {{ $cat->name }}

                            </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- Tombol --}}
                    <div class="col-md-2 d-flex gap-2">

                        <button
                            type="submit"
                            class="btn btn-primary flex-grow-1">

                            <i class="bi bi-search"></i>
                            Cari

                        </button>


                        @if(!empty($search) || !empty($category))

                        <a
                            href="{{ route('books.index') }}"
                            class="btn btn-secondary"
                            title="Reset filter">

                            <i class="bi bi-x-lg"></i>

                        </a>

                        @endif

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- Informasi Filter --}}
    @if(!empty($search) || !empty($category))

    <div class="mb-3">

        <span class="text-muted">
            Menampilkan
        </span>

        <strong>
            {{ $books->total() }}
        </strong>

        <span class="text-muted">
            buku
        </span>

        @if(!empty($search))

        <span class="text-muted">
            untuk pencarian
        </span>

        <strong>
            "{{ $search }}"
        </strong>

        @endif


        @if(!empty($category))

        @php
        $selectedCategory = $categories->firstWhere('id', $category);
        @endphp

        @if($selectedCategory)

        <span class="text-muted">
            dalam kategori
        </span>

        <strong>
            "{{ $selectedCategory->name }}"
        </strong>

        @endif

        @endif

    </div>

    @endif


    {{-- Tabel Buku --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="px-4">
                                No
                            </th>

                            <th>
                                Judul Buku
                            </th>

                            <th>
                                Penulis
                            </th>

                            <th>
                                Penerbit
                            </th>

                            <th>
                                Tahun
                            </th>

                            <th>
                                Kategori
                            </th>

                            <th>
                                Stok
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($books as $book)

                        <tr>

                            <td class="px-4">
                                {{ $books->firstItem() + $loop->index }}
                            </td>


                            <td>

                                <div class="fw-semibold">
                                    {{ $book->title }}
                                </div>

                            </td>


                            <td>
                                {{ $book->author }}
                            </td>


                            <td>
                                {{ $book->publisher }}
                            </td>


                            <td>
                                {{ $book->year }}
                            </td>


                            <td>

                                <span class="badge bg-primary-subtle text-primary">
                                    {{ $book->category->name }}
                                </span>

                            </td>


                            <td>

                                @if($book->stock > 0)

                                <span class="badge bg-success">
                                    {{ $book->stock }}
                                </span>

                                @else

                                <span class="badge bg-danger">
                                    Habis
                                </span>

                                @endif

                            </td>


                            <td class="text-center">

                                <div class="btn-group">

                                    {{-- Detail --}}
                                    <a
                                        href="{{ route('books.show', $book) }}"
                                        class="btn btn-sm btn-outline-info"
                                        title="Detail">

                                        <i class="bi bi-eye"></i>

                                    </a>


                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('books.edit', $book) }}"
                                        class="btn btn-sm btn-outline-warning"
                                        title="Edit">

                                        <i class="bi bi-pencil"></i>

                                    </a>


                                    {{-- Hapus --}}
                                    <form
                                        action="{{ route('books.destroy', $book) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus buku ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            title="Hapus">

                                            <i class="bi bi-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td
                                colspan="8"
                                class="text-center py-5">

                                <div class="mb-3">

                                    <i
                                        class="bi bi-book"
                                        style="font-size: 3rem;">
                                    </i>

                                </div>

                                <h5 class="fw-semibold">
                                    Tidak ada buku ditemukan
                                </h5>

                                <p class="text-muted">
                                    Tidak ada buku yang sesuai dengan
                                    pencarian atau filter yang dipilih.
                                </p>

                                <a
                                    href="{{ route('books.index') }}"
                                    class="btn btn-secondary">

                                    <i class="bi bi-arrow-counterclockwise"></i>
                                    Reset Filter

                                </a>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Pagination --}}
        @if($books->hasPages())

        <div class="card-footer bg-white border-0 py-3">

            {{ $books->links() }}

        </div>

        @endif

    </div>

</div>

@endsection