<x-guest-layout>
    @foreach ($posts as $post)
        <div>
            <h1>{{ $post->title }}</h1>
        </div>
    @endforeach
</x-guest-layout>