<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $instrument->exists ? 'Edit Instrument' : 'Create Instrument' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <form
                    class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6 space-y-6"
                    method="POST"
                    action="{{ $instrument->exists ? route('instruments.update', $instrument) : route('instruments.store') }}"
                >
                    @csrf
                    @if($instrument->exists)
                        @method('PUT')
                    @endif

                    @foreach ($fields as $field => $type)
                        <div>
                            <label for="{{ $field }}" class="block text-sm font-medium text-gray-700 mb-1">{{ ucfirst($field) }}</label>
                        <input
                            type="{{ $type }}"
                            name="{{ $field }}"
                            id="{{ $field }}"
                            class="w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ old($field, $instrument->$field) }}"
                        >
                        @error($field)
                            <x-validation-errors>
                                {{ $message }}
                            </x-validation-errors>
                        @enderror
                    </div>
                    @endforeach
                    
                    <!-- Botón -->
                    <div>
                        <x-button>
                            {{ $instrument->exists ? 'Update Instrument' : 'Create Instrument' }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>