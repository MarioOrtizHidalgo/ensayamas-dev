<x-guest-layout>
    <form method="POST" action="{{ route('band.store') }}" class="max-w-xl mx-auto mt-10 space-y-6">
        @csrf

        <!-- Nombre -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la banda</label>
            <input id="name" name="name" type="text" required autofocus class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" value="{{ old('name') }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Localización -->
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700">Localización</label>
            <input id="location" name="location" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" value="{{ old('location') }}">
            @error('location')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Código de invitación -->
        <div>
            <label for="invite_code" class="block text-sm font-medium text-gray-700">Código de invitación</label>
            <input id="invite_code" name="invite_code" type="text" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2" value="{{ old('invite_code') }}">
            @error('invite_code')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón -->
        <div>
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md transition">
                Crear Banda
            </button>
        </div>
    </form>
</x-guest-layout>
