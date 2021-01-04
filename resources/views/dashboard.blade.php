<x-app-layout>

    <div class="py-12">
        @foreach($images as $image)
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 pt-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <!-- Imagen y nombre del usuario -->
                    <div class="p-6 bg-white border-b border-gray-200 flex items-center px-4">

                        <div class="flex-shrink-0">
                            <img class="h-8 w-8 rounded-full" src="{{ asset($image->user->image_path) }}" alt="">
                                
                        </div>

                        <div class="ml-3">
                            <div class="font-medium text-base text-gray-800">{{ $image->user->name.' '.$image->user->surname.' | @'.$image->user->nick }}</div>
                        </div>
                        
                    </div>

                    <!-- Imagen -->
                    <div class="bg-white border-b border-gray-200">

                        <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                            <img class="object-fill h-150 w-full" src="{{ asset($image->image_path) }}" />
                        </a>
                    </div>

                    <!-- Description -->
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ '@'.$image->user->nick }}
                        {{' | '.\FormatTime::LongTimeFilter($image->created_at) }}
                        <p>{{ $image->description }}</p>
                    </div>

                    <a href="" class="p-6 bg-blue-600 text-white px-4 py-2 font-bold uppercase rounded-xl tracking-wider"> Commentarios ({{count($image->comments)}}) </a>

                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
