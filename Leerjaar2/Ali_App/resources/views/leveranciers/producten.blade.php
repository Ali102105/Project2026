<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Geleverde producten
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Geleverde producten
                </h1>

                <div class="mb-6 space-y-2 text-gray-900 dark:text-gray-100">
                    <p>
                        <strong>Naam leverancier:</strong>
                        {{ $leverancier->Naam }}
                    </p>

                    <p>
                        <strong>Contactpersoon:</strong>
                        {{ $leverancier->ContactPersoon }}
                    </p>

                    <p>
                        <strong>Leverancier nr:</strong>
                        {{ $leverancier->LeverancierNummer }}
                    </p>

                    <p>
                        <strong>Mobiel:</strong>
                        {{ $leverancier->Mobiel }}
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-900 dark:text-gray-100">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-3">Naam product</th>
                                <th class="px-4 py-3">Aantal in magazijn</th>
                                <th class="px-4 py-3">Verpakkingseenheid</th>
                                <th class="px-4 py-3">Laatste levering</th>
                                <th class="px-4 py-3 text-center">Nieuwe levering</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse ($producten as $product)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-4 py-3">
                                        {{ $product->ProductNaam }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $product->AantalInMagazijn }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ number_format((float) $product->VerpakkingsEenheid, 2, ',', '') }} kg
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $product->LaatsteLevering
                                            ? date('d-m-Y', strtotime($product->LaatsteLevering))
                                            : 'Onbekend' }}
                                    </td>

                                    <td class="px-4 py-3 text-center">
                                        <span class="text-xl text-gray-400"
                                              title="Nieuwe levering wordt bij Userstory 2 toegevoegd">
                                            +
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5"
                                        class="px-4 py-6 text-center font-semibold text-red-600">
                                        Dit bedrijf heeft tot nu toe geen producten geleverd aan Jamin
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('leveranciers.index') }}"
                       class="rounded-md bg-gray-600 px-5 py-2 text-white hover:bg-gray-700">
                        Terug
                    </a>

                    <a href="{{ route('dashboard') }}"
                       class="rounded-md bg-indigo-600 px-5 py-2 text-white hover:bg-indigo-700">
                        Home
                    </a>
                </div>

            </div>
        </div>
    </div>

    @if (count($producten) === 0)
        <script>
            setTimeout(function () {
                window.location.href = @json(route('leveranciers.index'));
            }, 3000);
        </script>
    @endif
</x-app-layout>
