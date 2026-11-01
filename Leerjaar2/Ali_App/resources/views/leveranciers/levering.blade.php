<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Levering product
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                    Levering product
                </h1>

                <div class="space-y-3 mb-8 text-gray-900 dark:text-gray-100">
                    <p>
                        <strong>Product:</strong>
                        {{ $product->ProductNaam }}
                    </p>

                    <p>
                        <strong>Leverancier:</strong>
                        {{ $product->LeverancierNaam }}
                    </p>

                    <p>
                        <strong>Contactpersoon:</strong>
                        {{ $product->ContactPersoon }}
                    </p>

                    <p>
                        <strong>Mobiel:</strong>
                        {{ $product->Mobiel }}
                    </p>
                </div>

                @if ($nietMeerGeproduceerd ?? false)
                    <div class="mb-6 rounded-md bg-red-100 p-4 text-red-800">
                        Het product {{ $product->ProductNaam }}
                        van de leverancier {{ $product->LeverancierNaam }}
                        wordt niet meer geproduceerd
                    </div>

                    <p class="mb-4 text-sm text-gray-600 dark:text-gray-300">
                        Je wordt over 4 seconden teruggestuurd.
                    </p>
                @endif

                @if ($errors->any())
                    <div class="mb-6 rounded-md bg-red-100 p-4 text-red-800">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form
                    method="POST"
                    action="{{ route('leveranciers.levering.opslaan', [
                        $product->LeverancierId,
                        $product->ProductId
                    ]) }}"
                >
                    @csrf

                    <div class="mb-5">
                        <label for="aantal"
                               class="block mb-2 font-semibold text-gray-900 dark:text-white">
                            Aantal producteenheden
                        </label>

                        <input
                            type="number"
                            id="aantal"
                            name="aantal"
                            min="1"
                            max="65535"
                            required
                            value="{{ old('aantal') }}"
                            class="w-full rounded-md border-gray-300 text-gray-900"
                        >
                    </div>

                    <div class="mb-6">
                        <label for="datum_eerst_volgende_levering"
                               class="block mb-2 font-semibold text-gray-900 dark:text-white">
                            Datum eerstvolgende levering
                        </label>

                        <input
                            type="date"
                            id="datum_eerst_volgende_levering"
                            name="datum_eerst_volgende_levering"
                            required
                            value="{{ old('datum_eerst_volgende_levering') }}"
                            class="w-full rounded-md border-gray-300 text-gray-900"
                        >
                    </div>

                    <div class="flex flex-wrap gap-3">
                        <button
                            type="submit"
                            @disabled($nietMeerGeproduceerd ?? false)
                            class="rounded-md bg-green-600 px-5 py-2 text-white hover:bg-green-700 disabled:opacity-50"
                        >
                            Sla op
                        </button>

                        <a
                            href="{{ route('leveranciers.producten', $product->LeverancierId) }}"
                            class="rounded-md bg-gray-600 px-5 py-2 text-white hover:bg-gray-700"
                        >
                            Terug
                        </a>

                        <a
                            href="{{ route('dashboard') }}"
                            class="rounded-md bg-indigo-600 px-5 py-2 text-white hover:bg-indigo-700"
                        >
                            Home
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    @if ($nietMeerGeproduceerd ?? false)
        <script>
            setTimeout(function () {
                window.location.href = @json(
                    route('leveranciers.producten', $product->LeverancierId)
                );
            }, 4000);
        </script>
    @endif
</x-app-layout>
