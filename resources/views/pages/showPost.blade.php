<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-center text-gray-800 leading-tight">
            {{ __( $post->title ) }}
        </h1>
    </x-slot>

    <div>
        <div class="flex flex-col w-4/6 m-auto">
            <h2 class="m-2 text-lg">Autor: {{ $post->user->name }}</h2>
            <div class="bg-white">{{ $post->content }}</div>
            <button class="bg-blue-400"><a href="{{ route('blog.edit', ['blog' => $post]) }}">Editovat</a></button>
        </div>
        <div>
            <ul>
                @foreach($comments as $comment)
                <li class="text-red-600 m-3">{{ $comment->user->name }}</li>
                <li class="bg-white m-3">{{ $comment->content }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>