
    <x-app-layout>

        <div class="flex justify-center items-center p-5 text-secondary w-100 h-64 text-center border-2 border-dashed border-secondary">
   
            <form action="{{ route('photos.upload') }}" method="post" enctype="multipart/form-data" id="image-upload" class="dropzone text-2xl font-bold border-2">
                @csrf
                <div>
                    <h3>Upload Multiple Image By Click On Box</h3>
                </div>
            </form>
        </div>
    
    </x-app-layout>