<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Články') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col w-3/5 text-center m-auto">
            @forelse($posts as $post)
            <ul>
                <li class="bg-white m-2"><a href="{{ route('blog.show', ['blog' => $post]) }}">{{ ucfirst($post->title) }}</a></li>
            </ul>
            @empty
            <p class="text-warning">No Posts available</p>
            @endforelse
        </div>
    </div>
</x-app-layout>