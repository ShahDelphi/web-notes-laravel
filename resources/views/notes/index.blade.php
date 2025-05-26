@extends('layouts.app')

@section('title', 'Daftar Catatan')

@section('content')
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Daftar Catatan</h1>
            <a href="/notes/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Tambah Catatan</a>
        </div>
        <div class="space-y-4">
            @foreach ($notes as $note)
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-xl font-semibold">{{ $note->title }}</h2>
                    <p class="text-gray-700">{{ $note->content }}</p>
                    <div class="mt-4 flex gap-3">
                        <a href="/notes/{{ $note->id }}/edit" class="text-blue-500 hover:underline">Edit</a>
                        <form action="/notes/{{ $note->id }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus catatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
