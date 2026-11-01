<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Overzicht leveranciers
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Overzicht leveranciers
                </h1>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm text-gray-900 dark:text-gray-100">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3">Naam</th>
                                <th class="px-4 py-3">Contactpersoon</th>
                                <th class="px-4 py-3">Leveranciernummer</th>
                                <th class="px-4 py-3">Mobiel</th>
                                <th class="px-4 py-3">Aantal verschillende producten</th>
                                <th class="px-4 py-3 text-center">Toon producten</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($leveranciers as $leverancier)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-3">
                                        {{ $leverancier->Naam }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $leverancier->ContactPersoon }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $leverancier->LeverancierNummer }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $leverancier->Mobiel }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $leverancier->AantalVerschillendeProducten }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        <a
                                            href="{{ route('leveranciers.producten', $leverancier->Id) }}"
                                            class="inline-flex items-center justify-center rounded-md bg-indigo-600 px-3 py-2 text-white hover:bg-indigo-700"
                                            title="Toon producten"
                                            aria-label="Toon producten van {{ $leverancier->Naam }}"
                                        >
                                            📦
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-6 text-center">
                                        Geen leveranciers gevonden.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-end">
                    <a href="{{ route('dashboard') }}"
                       class="rounded-md bg-gray-600 px-5 py-2 text-white hover:bg-gray-700">
                        Home
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
