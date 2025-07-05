<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-700 leading-tight">
            Kelola Kursus
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Flash Message --}}
            @if (session('message'))
                <div class="mb-6 p-4 bg-green-100 text-green-800 rounded shadow">
                    {{ session('message') }}
                </div>
            @endif

            {{-- Tombol Tambah Kursus --}}
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.courses.create') }}"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-4 py-2 rounded">
                    + Tambah Kursus
                </a>
            </div>
            <!-- Modal Konfirmasi Hapus -->
            <div id="deleteModal"
                class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                <div class="bg-white p-6 rounded shadow-lg max-w-sm w-full text-center">
                    <h3 class="text-lg font-semibold mb-4 text-red-600">Yakin ingin menghapus kursus ini?</h3>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-between mt-6">
                            <button type="button" onclick="closeModal()"
                                class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 text-sm">Batal</button>
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Ya,
                                Hapus</button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Tabel Kursus --}}
            <div class="bg-white shadow rounded-lg overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-indigo-100 text-indigo-800">
                        <tr>
                            <th class="px-6 py-3 text-left font-bold">Thumbnail</th>
                            <th class="px-6 py-3 text-left font-bold">Judul</th>
                            <th class="px-6 py-3 text-left font-bold">Level</th>
                            <th class="px-6 py-3 text-left font-bold">Harga</th>
                            <th class="px-6 py-3 text-left font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($courses as $course)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    @if ($course->thumbnail)
                                        <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}"
                                            class="w-20 h-14 object-cover rounded shadow border">
                                    @else
                                        <span class="text-gray-400 text-xs italic">Tidak ada gambar</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">{{ $course->title }}</td>
                                <td class="px-6 py-4">{{ $course->level }}</td>
                                <td class="px-6 py-4">Rp {{ number_format($course->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('admin.courses.edit', $course->id) }}"
                                        class="inline-block px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded text-xs">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('admin.courses.delete', $course->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="confirmDelete({{ $course->id }})"
                                            class="text-red-500 hover:text-red-700 font-medium text-sm">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada kursus
                                    tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
<script>
    function confirmDelete(courseId) {
        const form = document.getElementById('deleteForm');
        form.action = '/admin/courses/' + courseId;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
