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
                <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                    
                    <h1 class="data-car-title">
                        Dados do Acesso
                    </h1>
                    <div class="row">
                        <div class="col">
                            <div class="data-car">
                                <div class="data-car-label">
                                    Placa
                                </div>
                                <div class="data-car-value">
                                    {{ $car['plate'] }}
                                </div>
                            </div>
                           

                        </div>
                        <div class="col">
                            <div class="data-car">
                                <div class="data-car-label">
                                    Cor do carro
                                </div>
                                <div class="data-car-value">
                                    {{ $car['color'] ?? 'Não identificado' }}
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="data-car">
                                <div class="data-car-label">
                                    Quantidade de acessos
                                </div>
                                <div class="data-car-value">
                                    {{ count($data) }}
                                </div>
                            </div>
                        </div>
                    </div>


                

                </div>
                <hr>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @foreach ($data as $item)
                    <div class="row">
                        <div class="col-4">
                            <div class="flex items-center justify-center data-car-container">
                                <div class="text-block">
                                    <p>{{ $item['entry_date'] }}</p>
                                </div>
                                <img src="{{ asset('storage/' . $item['file']) }}" style="width: 50%, height:50%" alt="">
                            </div>
                        </div>
                        <div class="col-8">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700" style="width: 100%">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <th scope="col" class="py-2  text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400" style="width:10%">
                                        Cód.
                                    </th>
                                    <th scope="col" class="py-2 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Nome
                                    </th>
                                    <th scope="col" class="py-2 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                        Telefone
                                    </th>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($item['access'] as $access)
                                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                            <td class="py-2 px-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $access['Barcode'] }}
                                            </td>
                                            <td class="py-2 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                                                {{ $access['Name'] }} 
                                                @if ($access['Titular'] == 1)
                                                    <t style="color:red">(TITULAR)</t>
                                                @endif
                                            </td>
                                            <td class="py-2 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $access['MobilePhone'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>           
                            </table>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                    @endforeach
                    <br>
                </div>
            </div>
            </div>
        </div>
    </div>
</x-app-layout>
