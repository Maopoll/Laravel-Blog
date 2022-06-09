<x-app-layout>
    <x-slot name="header">
        <h1 class="font-bold text-center text-gray-800 leading-tight">
            {{ __( 'Nový článek' ) }}
        </h1>
    </x-slot>

    <div>
        <x-post-form route="{{ route('blog.create') }}" />
    </div>
</x-app-layout>