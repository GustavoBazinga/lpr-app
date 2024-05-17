<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistema de Identificação de Veículos') }}
        </h2>
    </x-slot>

    <x-slot name="css">
        <link rel="stylesheet" href="{{ asset('css/card-counter.css') }}">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{-- <div class="flex gap-2 items-center justify-center">
                                <div class="w-1/2 counter text-center flex flex-col items-center"> 
                                    <div class="counter-number">{{ $todayParkingCount }}</div>
                                    <div class="counter-label text-center">
                                        Total de Veículos hoje 
                                    </div>
                                </div>
                                <div class="w-1/2 counter text-center flex flex-col items-center"> 
                                    <div class="counter-number">{{ $todayParkingNoPlate }}</div>
                                    <div class="counter-label text-center">
                                        Total de veículos não identificados hoje 
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="col counter">  
                                    <div class="counter-number">
                                        {{ $todayParkingCount }}
                                    </div>
                                    <div class="counter-label text-center">
                                        Total de Veículos hoje 
                                    </div>
                                    </div>
                                <div class="col">
                                    <div class="counter-number">
                                        {{ $todayParkingNoPlate }}
                                    </div>
                                    <div class="counter-label text-center">
                                        Total de veículos não identificados hoje 
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                        <form action="{{ route('parking.show') }}" method="POST">
                            @csrf
                            <div class="flex gap-4 items-center">
                                <div class="w-1/4"> 
                                    <x-input-label>
                                        Placa do veículo
                                    </x-input-label>
                                  <x-text-input label="Placa" name="plate" required/> 
                                </div>
                                <div class="w-1/4">
                                    <x-input-label>
                                        Data
                                    </x-input-label>
                                  <x-datetime-input label="Data e Hora" name="datetime" /> 
                                </div>
                              </div>
                            <br>
                            <x-primary-button>Buscar</x-primary-button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
