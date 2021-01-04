<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuración de mi cuenta') }}
        </h2>
    </x-slot>

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

        <form method="POST" action="{{ route('auth.update') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus />
            </div>

            <!-- Surname -->
            <div>
                <x-label for="surname" :value="__('Apellidos')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" value="{{ Auth::user()->surname }}" required autofocus />
            </div>

            <!-- Nick -->
            <div>
                <x-label for="nick" :value="__('Nick')" />

                <x-input id="nick" class="block mt-1 w-full" type="text" name="nick" value="{{ Auth::user()->nick }}" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email }}" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                @if(Auth::user()->image_path)
                    <img class="object-scale-down h-48 w-full" src="{{ asset(Auth::user()->image_path) }}" />
                @endif
                <x-label for="image_path" :value="__('Avatar')" />

                <x-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" />
            </div>

            

            <div class="flex items-center justify-end mt-4">
               

                <x-button class="ml-4">
                    {{ __('Actualizar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

</x-app-layout>