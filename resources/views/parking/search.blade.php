<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistema de Identificação de Veículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
