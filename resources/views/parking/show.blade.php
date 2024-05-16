<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sistema de Identificação de Veículos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Dados do provável proprietário</h1>
                    <div class="flex gap-4 items-center">
                        <div class="w-1/4">
                            <x-input-label>
                                Matrícula
                            </x-input-label>
                            <x-text-input name="register" value="<retorno-api-triade>" readonly />
                        </div>
                       
                        <div class="w-1/4">
                            <x-input-label>
                                Nome
                            </x-input-label>
                            <x-text-input name="name" value="<retorno-api-triade>" readonly />
                        </div>
                        <div class="w-1/4">
                            <x-input-label>
                                Telefone
                            </x-input-label>
                            <x-text-input name="telephone" value="<retorno-api-triade>" readonly />
                        </div>
                        <div class="w-1/4">
                            <x-input-label>
                                Placa do Veículo
                            </x-input-label>
                            <x-text-input name="plate" value="{{ $plate }}" readonly />
                        </div>
                        {{-- <div class="w-1/4">
                            <x-input-label>
                                Horário de Entrada
                            </x-input-label>
                            <x-text-input name="plate" value="{{ $datetime }}" readonly />
                        </div> --}}

                        
                </div>
                <br>
                <hr>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($data as $item)
                    <div class="flex gap-4 items-center justify-center">
                            <img src="{{ asset('storage/' . $item['file']) }}" alt="">
                    </div>
                    @endforeach
                    <br>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
