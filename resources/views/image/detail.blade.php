<x-app-layout>

    <div class="py-12">

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

                        <img class="object-fill h-150 w-full" src="{{ asset($image->image_path) }}" />

                    </div>

                    <!-- Description -->
                    <div class="p-6 bg-white border-b border-gray-200">
                        {{ '@'.$image->user->nick }}
                        <p>{{ $image->description }}</p>
                    </div>

                    <div class="my-8"> 
                        <h2> Comentarios ({{count($image->comments)}}) </h2>
                        <hr>

                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <form action="{{ route('comment.save') }}" method="post">
                            @csrf

                            <input type="hidden" name="image_id" value="{{ $image->id }}">
                            <div>
                                <x-label for="content" :value="__('Comentario')" />
                
                                <x-input id="content" class="block mt-1 w-full" type="text" name="content" required autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">               
                                <x-button class="ml-4">
                                    {{ __('Enviar') }}
                                </x-button>
                            </div>
                        </form>
                    </div>

                    <hr>
                    @foreach ($image->comments as $comment)
                    <div class="p-6 bg-white border-b border-gray-200">

                        {{ '@'.$comment->user->nick }}
                        {{' | '.\FormatTime::LongTimeFilter($comment->created_at) }}
                        <p>{{ $comment->content }}</p>

                        @if (Auth::check() && ($comment->user_id === Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                           <a href="{{ route('comment.delete', ['id' => $comment->id]) }}" class="flex items-center justify-end mt-4 ml-4"> Eliminar</a> 
                        @endif
                        
                    </div>
                    @endforeach


                </div>
            </div>
       
    </div>
</x-app-layout>