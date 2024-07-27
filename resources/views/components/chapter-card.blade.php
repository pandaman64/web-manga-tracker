@php use App\Models\Chapter; @endphp
@php /** @var Chapter $chapter */ @endphp
@php /** @var bool $viewed */ @endphp

<a href="{{ url()->query('/view', ['chapter_id' => $chapter->id]) }}" target="_blank" rel="noopener noreferrer">
    <div class="w-full border-2 border-black rounded-lg p-2 lg:p-4 shadow-md bg-white flex flex-row gap-2">
        <div class="w-2/5">
            <img src="{{ $chapter->enclosure_url }}" alt="{{ $chapter->title }}">
        </div>
        <div>
            <p class="text-sm text-gray-400">{{ $chapter->feed_updated_at }}</p>
            <h2 class="md:text-xl font-bold">{{ $chapter->title }}</h2>
            <p class="text-sm text-gray-400">{{ $chapter->publisher->display_name }} - {{ $chapter->work_title }}</p>
            <div class="flex flex-row items-center mt-2">
                @if($viewed)
                    <span class="px-1 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">既読</span>
                @endif
            </div>
        </div>
    </div>
</a>
