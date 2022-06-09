<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <ul class="p-6 bg-white border-b border-gray-200">
                @forelse($posts as $post)
                <li class="p-6 border-2 border-b-0 last:border-b-2 border-gray-200 text-center">
                    <a href="{{ route('blog.show', ['blog' => $post]) }}">{{ Str::limit(ucfirst($post->title), 100) }}</a>
                </li>
                @empty
                <p class="text-warning">Nejsou žádné články</p>
                @endforelse
            </ul>
        </div>
    </div>
</div>