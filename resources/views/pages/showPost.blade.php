<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-center text-gray-800 leading-tight">
            {{ __( ucfirst($post->title) ) }}
        </h1>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="m-2 text-lg">Autor: <span class="font-bold">{{ $post->user->name }}</span></h2>
                    <div class="mx-4 bg-white">{{ $post->content }}</div>
                </div>
            </div>
            @can('update', $post)
            <div class="flex justify-center gap-4 my-3">
                <a href="{{ route('blog.edit', ['blog' => $post]) }}">
                    <button class="rounded-md border border-transparent bg-blue-800 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-blue-900">
                        Editovat
                    </button>
                </a>
                <form action="{{ route('blog.destroy', ['blog' => $post]) }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="rounded-md border border-transparent bg-red-800 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-red-900">
                        Smazat
                    </button>
                </form>
            </div>
            @endcan
        </div>
        <div class="max-w-6xl mx-auto sm:px-8 lg:px-10 mb-3">
            <h3 class="m-3 font-bold">Komentáře:</h3>
            @auth
            <x-comment-form :post="$post" />
            @endauth
            <x-comment-list :comments="$comments" />
        </div>
    </div>
</x-app-layout>