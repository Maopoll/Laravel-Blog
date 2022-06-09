<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg my-5">
    @forelse($comments as $comment)
    <ul class="m-auto p-6 bg-white border-b border-gray-200">
        <li class="text-red-600 m-3">{{ $comment->user->name }}</li>
        <li class="bg-white m-3">{{ $comment->content }}</li>
    </ul>

    @empty
    <div class="m-auto p-6 bg-white border-b border-gray-200">Zatím nejsou žádné komentáře</div>
    @endforelse
</div>