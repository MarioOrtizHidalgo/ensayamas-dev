<section>
    <div class="flex justify-end">
        <input
            type="text"
            wire:model.live="search"
            placeholder="Buscar por nombre..."
            class="px-4 py-2 border rounded mb-4"
        />
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    @foreach ($fields as $field)
                        <th class="px-6 py-3 capitalize">
                            {{ str_replace('_', ' ', $field) }}
                        </th>
                    @endforeach
                    <th class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($instruments as $instrument)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        @foreach ($fields as $field)
                            <td class="px-6 py-4">
                                @if (in_array($field, ['created_at', 'updated_at']))
                                    {{ $instrument->$field ? $instrument->$field->format('d/m/Y H:i') : '-' }}
                                @else
                                    {{ $instrument->$field }}
                                @endif
                            </td>
                        @endforeach
                        <td class="px-6 py-4 space-x-2">
                            <a href="{{ route('instrument.edit', $instrument->id) }}" class="text-blue-600 hover:underline">Edit</a>

                            <form
                                method="POST"
                                action="{{ route('instrument.destroy', $instrument->id) }}"
                                class="inline"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline bg-transparent border-none p-0 cursor-pointer">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="{{ count($fields) + 1 }}" class="px-6 py-4 text-center text-gray-500">
                            No hay resultados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $instruments->links() }}
    </div>
</section>
