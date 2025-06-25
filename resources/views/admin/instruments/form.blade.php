<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $isEdit ? 'Editar instrumento' : 'Crear instrumento' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form
                    method="POST"
                    action="{{ $isEdit ? route('instrument.update', $instrument->getId()) : route('instrument.store') }}"
                    class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6 space-y-6"
                >
                    @csrf
                    @if($isEdit)
                        @method('PUT')
                    @endif

                    @foreach ($fields as $field => $type)
                        <div>
                            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700 mb-1">{{ ucfirst($field) }}</label>
                            <input
                                type="{{ $type }}"
                                name="{{ $field }}"
                                id="{{ $field }}"
                                class="w-full border rounded p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                value="{{ old($field, method_exists($instrument, 'get'.ucfirst($field)) ? $instrument->{'get'.ucfirst($field)}() : '') }}"
                            >
                            @error($field)
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach

                    <div>
                        <x-button type="submit">
                            {{ $isEdit ? 'Actualizar' : 'Crear' }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
