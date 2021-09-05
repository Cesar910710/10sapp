<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tablero de Vuelos
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button wire:click="create()" class="bg-blue-500  border-t-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Agregar Vuelo</button>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Procedencia</th>
                        <th class="px-4 py-2">Aerolinea</th>
                        <th class="px-4 py-2">Vuelo</th>
                        <th class="px-4 py-2">Creado por:</th>
                        <th class="px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($flights as $flight)
                    @if($flight->arrival ==! 0)
                    <tr>
                        <td class="border px-4 py-2">{{ $flight->id }}</td>
                        <td class="border px-4 py-2">{{ $flight->city }}</td>
                        <td class="border px-4 py-2">{{ $flight->airline }}</td>
                        <td class="border px-4 py-2">{{ $flight->flight_id }}</td>
                        <td class="border px-4 py-2">{{ auth('sanctum')->user()->name }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $flight->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                            <button wire:click="delete({{ $flight->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>   
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Destino</th>
                        <th class="px-4 py-2">Aerolinea</th>
                        <th class="px-4 py-2">Vuelo</th>
                        <th class="px-4 py-2">Creado por:</th>
                        <th class="px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($flights as $flight)
                    @if($flight->arrival ==! 1)
                    <tr>
                        <td class="border px-4 py-2">{{ $flight->id }}</td>
                        <td class="border px-4 py-2">{{ $flight->city }}</td>
                        <td class="border px-4 py-2">{{ $flight->airline }}</td>
                        <td class="border px-4 py-2">{{ $flight->flight_id }}</td>
                        <td class="border px-4 py-2">{{ auth('sanctum')->user()->name }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $flight->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Editar</button>
                            <button wire:click="delete({{ $flight->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>