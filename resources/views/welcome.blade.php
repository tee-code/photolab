
<x-app-layout>

    
<div id="gallery">
    <section class="overflow-hidden text-gray-700 ">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
          <div class="flex flex-wrap -m-1 md:-m-2">
                   
                @foreach ($photos as $photo)
                <div class="flex flex-wrap w-1/3">
                    <div class="w-full p-1 md:p-2 h-auto relative group cursor-pointer">
                        <img alt="gallery" 
                            class="block object-cover object-center w-full h-full rounded-lg"
                            src="{{ $photo->path }}">
                        <div 
                          class="absolute top-0 left-0 w-full h-full opacity-75 hidden group-hover:flex flex-col justify-center items-center gradient-bg text-white">
                            <p class="text-2xl">{{ $photo->name }}</p>
                            <p class="text-2xl">by {{ $photo->user->name }}</p>
                        </div>
                      </div>
                </div>
                    
                @endforeach
                {{ $photos->links() }}
            </div>
          </div>
        </div>
      </section>
</div>

</x-app-layout>


