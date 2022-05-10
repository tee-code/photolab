<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="grid w-full sm:grid-cols-2 md:grid-cols-3 lg:grids-cols-4 gap-3">

                        @foreach ($photos as $photo)
                            <div class="rounded-lg shadow-md relative group cursor-pointer">
                                <img src="{{ $photo->path }}" alt="{{ $photo->name }}" />
                                <div class="hidden absolute w-full h-full top-0 left-0 bg-secondary opacity-75 text-white group-hover:flex justify-end align-top">
                                    <form action="{{ route('photo.delete', $photo->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="h-16 p-3 text-3xl text-white rounded-lg">&times;</button>
                                    </form>
                                    
                                </div>
                            </div>
                        @endforeach

                        {{ $photos->links() }}

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
