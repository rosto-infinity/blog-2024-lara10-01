<x-layout>
    <div class="space-y-10 md:space-y-16 mb-5">

        <div class="mb-2"> Nombre d'article : {{ $total }} </div>

        @foreach ($posts as $post)
            {{-- <x-post :post="$post" /> --}}
            <x-post :$post list />
        @endforeach

    </div>
    {{ $posts->links() }}

</x-layout>
