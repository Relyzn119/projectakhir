<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-700 leading-tight">
            Edit Kursus: {{ $course->title }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- Error Validation --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded shadow">
                    <strong>Ups! Ada kesalahan:</strong>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Form Edit Kursus --}}
            <div class="bg-white shadow rounded-lg p-6">
                <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700 mb-1">Judul Kursus</label>
                    <input type="text" name="title" value="{{ old('title', $course->title) }}"
                        class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">{{ old('description', $course->description) }}</textarea>
            </div>

            {{-- Harga --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Harga (Rp)</label>
                <input type="number" name="price" value="{{ old('price', $course->price) }}"
                    class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
            </div>

            {{-- Level --}}
            <div class="mb-4">
                <label class="block font-medium text-sm text-gray-700 mb-1">Tingkat Kesulitan</label>
                <select name="level"
                    class="w-full rounded border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                    <option value="Pemula" {{ $course->level == 'Pemula' ? 'selected' : '' }}>Pemula</option>
                    <option value="Menengah" {{ $course->level == 'Menengah' ? 'selected' : '' }}>Menengah</option>
                    <option value="Lanjutan" {{ $course->level == 'Lanjutan' ? 'selected' : '' }}>Lanjutan</option>
                </select>
            </div>

            {{-- Thumbnail --}}
            <div class="mb-6">
                <label class="block text-sm font-medium mb-1 text-gray-700">Thumbnail (Upload Gambar)</label>
                <input type="file" name="thumbnail"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white">
            </div>


            <div class="flex justify-end">
                <a href="{{ route('admin.courses') }}"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded mr-2 text-sm">
                    Batal
                </a>
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded text-sm font-semibold">
                    Simpan Perubahan
                </button>
            </div>
            </form>
        </div>
    </div>
    </div>
</x-admin-layout>
