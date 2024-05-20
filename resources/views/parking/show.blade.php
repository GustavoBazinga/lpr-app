<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistema de Identificação de Veículos') }}
        </h2>
    </x-slot>

    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/result-cars.css') }}">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @include('parking.partials.infoAccess')
                <hr>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($data as $item)
                        @include('parking.partials.dataItemAccess')  
                    @endforeach
                    <br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
