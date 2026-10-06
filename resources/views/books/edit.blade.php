@extends('layouts.app')

@section('title', 'Edit Buku')

@section('content')

<div class="fade-up">

    <div class="mb-4">

        <h2 class="fw-bold">
            Edit Buku
        </h2>

        <p class="text-muted">
            Perbarui informasi buku.
        </p>

    </div>

    <div class="card p-4">

        @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form
            action="{{ route('books.update', $book) }}"
            method="POST">

            @csrf
            @method('PUT')

            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Judul Buku
                    </label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title', $book->title) }}"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Penulis
                    </label>

                    <input
                        type="text"
                        name="author"
                        class="form-control"
                        value="{{ old('author', $book->author) }}"
                        required>

                </div>

                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Penerbit
                    </label>

                    <input
                        type="text"
                        name="publisher"
                        class="form-control"
                        value="{{ old('publisher', $book->publisher) }}"
                        required>

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Tahun
                    </label>

                    <input
                        type="number"
                        name="year"
                        class="form-control"
                        value="{{ old('year', $book->year) }}"
                        required>

                </div>

                <div class="col-md-3 mb-3">

                    <label class="form-label">
                        Stok
                    </label>

                    <input
                        type="number"
                        name="stock"
                        class="form-control"
                        value="{{ old('stock', $book->stock) }}"
                        min="0"
                        required>

                </div>

                <div class="col-md-12 mb-4">

                    <label class="form-label">
                        Kategori
                    </label>

                    <select
                        name="category_id"
                        class="form-select"
                        required>

                        @foreach($categories as $category)

                        <option
                            value="{{ $category->id }}"
                            @selected(old('category_id', $book->category_id) == $category->id)
                            >
                            {{ $category->name }}
                        </option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('books.index') }}"
                    class="btn btn-light">
                    Batal
                </a>

                <button class="btn btn-primary">
                    <i class="bi bi-save"></i>
                    Simpan Perubahan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection