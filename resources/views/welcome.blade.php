
<x-app-layout>

    
<div id="gallery">
    <section class="overflow-hidden text-gray-700 ">
        <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
          <div class="flex flex-wrap -m-1 md:-m-2">
                   
                @foreach ($photos as $photo)
                <div class="flex flex-wrap w-1/3">
                    <div class="w-full p-1 md:p-2">
                        <img alt="gallery" 
                            class="block object-cover object-center w-full h-full rounded-lg"
                            src="{{ $photo->path }}">
                            <p class="text-2xl">{{ $photo->name }}</p>
                            <p class="text-2xl">by {{ $photo->user->name }}</p>
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


