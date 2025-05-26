@extends('layouts.app')

@section('title', 'Tambah Catatan')

@section('content')
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Tambah Catatan</h1>
        <form action="/notes" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Judul</label>
                <input type="text" name="title" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>
            <div>
                <label class="block text-sm font-medium">Isi</label>
                <textarea name="content" rows="4" class="w-full mt-1 p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
            </div>
            <div class="flex justify-between items-center">
                <a href="/" class="text-blue-500 hover:underline">← Kembali</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
@endsection
