<form class="bg-white overflow-hidden shadow-sm sm:rounded-lg" action="{{ route('comment.store', $post) }}" method="POST">
    @csrf
    <h3 class="font-bold p-6 pb-0">Napsat komentář</h3>
    <div class="m-auto p-6 bg-white border-b border-gray-200">
        <label class="sr-only" for="content">Obsah:</label>
        <textarea class="rounded-sm w-full bg-gray-100 border-1 p-2 h-22 flex" name="content" placeholder="Lorem ipsum..." value="{{ old('content') }}">{{ old('content') }}</textarea>
        <div class="flex justify-center">
            <button class="rounded-md border border-transparent bg-blue-800 mt-4 px-4 py-2 font-medium text-sm text-white shadow-sm hover:bg-blue-900" type="submit">
                Přidat
            </button>
        </div>
        @error('content')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
    </div>
</form>