<x-app-layout>

    <x-auth-card>

        @if(session('message'))
            <div class="colors.emerald">
              {{ session('message') }}
            </div>
        @endif

        <x-slot name="logo">
            <a href="/">
               
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
            @csrf

            <div class="mt-4">

                <x-label for="image_path" :value="__('Imagen')" />
                <x-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" />
            </div>

            <!-- Description -->
            <div>
                <x-label for="description" :value="__('Descripción')" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" required autofocus />
            </div>

            

            <div class="flex items-center justify-end mt-4">
               

                <x-button class="ml-4">
                    {{ __('Subir') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

</x-app-layout>