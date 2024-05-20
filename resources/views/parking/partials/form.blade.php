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