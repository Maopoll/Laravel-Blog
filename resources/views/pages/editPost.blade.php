<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-center text-gray-800 leading-tight">
            {{ __( 'Upravit článek' ) }}
        </h1>
    </x-slot>

    <div>
        <x-post-form :post="$post" route="{{ route('blog.edit', $post) }}" />
    </div>
</x-app-layout>