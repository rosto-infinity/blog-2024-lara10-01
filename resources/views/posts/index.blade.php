<x-default-layout>
    <div class="space-y-10 md:space-y-16 mb-5">

        {{-- <div class="mb-2"> Nombre d'article : {{ $total }} </div> --}}

        @forelse ($posts as $post)
            {{-- <x-post :post="$post" /> --}}
            <x-post :$post list />
            @empty
            <!-- component -->
<!-- component -->
<!-- This is an example component -->
<div class="h-screen w-screen bg-gray-50 flex items-center">
    <div class="container flex flex-col md:flex-row items-center justify-between px-5 text-gray-700">
            <div class="w-full lg:w-1/2 mx-8">
                <div class="text-7xl text-green-300 font-dark font-extrabold mb-8"> Oup's</div>
            <p class="text-2xl md:text-3xl font-light leading-normal mb-8">
                Désolé, nous n'avons pas trouvé d'occurence pour votre recherchez
            </p>
            
            <a href="{{ route('index') }}" class="px-5 inline py-3 text-sm font-medium leading-5 shadow-2xl text-white transition-all duration-400 border border-transparent rounded-lg focus:outline-none bg-green-300 active:bg-green-950 hover:bg-green-950">retour à la page d'accueil</a>
    </div>
        <div class="w-full lg:flex lg:justify-end lg:w-1/2 mx-5 my-12">
        <img src="https://user-images.githubusercontent.com/43953425/166269493-acd08ccb-4df3-4474-95c7-ad1034d3c070.svg" class="" alt="Page not found">
        </div>
    
    </div>
</div>

        @endforelse

    </div>
    {{ $posts->links() }}

</x-default-layout>
