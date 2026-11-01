<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-2xl font-bold mb-3">
                        Welkom bij Jamin
                    </h1>

                    <p class="mb-6">
                        Je bent ingelogd als {{ Auth::user()->name }}.
                    </p>

                    @if (
                            Auth::user()->rolenaam === 'Admin' ||
                            Auth::user()->rolenaam === 'Magazijnmedewerker'
                        )
                        <a href="{{ route('leveranciers.index') }}"
                            class="inline-block rounded-md bg-indigo-600 px-5 py-3 text-white hover:bg-indigo-700">
                            Overzicht Leveranciers
                        </a>
                    @endif

                </div>
            </div>

        </div>
    </div>
</x-app-layout>