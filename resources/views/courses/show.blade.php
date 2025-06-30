<div class="mt-6">
    @auth
        @if ($alreadyBought)
            <div class="text-green-600 font-semibold">Kamu sudah membeli kursus ini.</div>
        @else
            <form action="{{ route('checkout', $course->id) }}" method="POST">
                @csrf
                <p class="mt-2 text-sm text-gray-500">Level: {{ $course->level }}</p>
                <p class="text-lg font-semibold text-gray-800">Harga: Rp {{ number_format($course->price, 0, ',', '.') }}</p>
              <button type="submit" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">
    Checkout Sekarang
</button>

            </form>
        @endif
    @else
        <p class="text-sm text-gray-600">Silakan <a href="{{ route('login') }}" class="text-indigo-500 underline">login</a>
            untuk membeli kursus ini.</p>
    @endauth
</div>
