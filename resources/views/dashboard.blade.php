<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moje články') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @forelse($posts as $post)
                <ul class="p-6 bg-white border-b border-gray-200">
                    <li class="m-2"><a href="{{ route('blog.show', ['blog' => $post]) }}">{{ ucfirst($post->title) }}</a></li>
                </ul>
                @empty
                <p class="text-warning">Nemáš žádné články</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>