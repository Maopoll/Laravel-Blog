<form class="w-3/5 m-auto" action="{{ route('blog.store') }}" method="POST">
    @csrf
    @if($route == route('blog.edit', $post->id ?? ''))
    @method('PATCH')
    @endif
    <div class="m-4">
        <label for="title">Titulek</label>
        <input class="rounded-lg w-full bg-gray-100 border-2 p-2" type="text" id="title" placeholder="Lorem ipsum..." name="title" value="{{ old('title', $post->title ?? '') }}">

        @error('title')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="m-4">
        <label for="content">Obsah</label>
        <textarea class="rounded-lg w-full bg-gray-100 border-2 p-2 h-52 flex" id="content" placeholder="Lorem ipsum ..." name="content" value="{{ old('content', $post->content ?? '') }}">{{ old('content', $post->content ?? '') }}</textarea>

        @error('content')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="flex justify-center">
        <button class="rounded-md border border-transparent bg-blue-800 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-900" type="submit">
            @if($route == route('blog.edit', $post->id ?? ''))
            Uložit
            @else
            Přidat
            @endif
        </button>
    </div>
</form>