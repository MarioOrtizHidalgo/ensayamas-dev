<x-app-layout>
    <section class="container mx-auto">
        <div class="my-4 text-end">
            <a href="{{ route($routePrefix . '.create') }}">
                <x-button>
                    {{ 'Create ' . $routePrefix }}
                </x-button>
            </a>
        </div>

        <livewire:instrument-table />
    </section>
</x-app-layout>