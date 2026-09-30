<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Leveringsinformatie</title>

    @vite(['resources/css/bootstrap.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold">Leveringsinformatie</h1>

        @if(count($leveringen) > 0)
            <p class="text-muted">
                Leveringsinformatie van {{ $leveringen[0]->ProductNaam }}
            </p>
        @endif
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            @if(count($leveringen) > 0)

                <div class="mb-4">

                    <p>
                        <strong>Naam leverancier:</strong>
                        {{ $leveringen[0]->LeverancierNaam }}
                    </p>

                    <p>
                        <strong>Contactpersoon leverancier:</strong>
                        {{ $leveringen[0]->ContactPersoon }}
                    </p>

                    <p>
                        <strong>Leverancier nummer:</strong>
                        {{ $leveringen[0]->LeverancierNummer }}
                    </p>

                    <p>
                        <strong>Mobiel:</strong>
                        {{ $leveringen[0]->Mobiel }}
                    </p>

                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0 text-center">

                    <thead class="table-light">
                        <tr>
                            <th>Naam Product</th>
                            <th>Datum laatste levering</th>
                            <th>Aantal</th>
                            <th>Eerstvolgende levering</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($leveringen as $levering)

                        <tr>

                            <td class="fw-semibold">
                                {{ $levering->ProductNaam }}
                            </td>

                            <td>
                                {{ $levering->DatumLevering }}
                            </td>

                            <td>
                                {{ $levering->Aantal }}
                            </td>

                            <td>
                                {{ $levering->DatumEerstVolgendeLevering ?? 'Geen datum bekend' }}
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="4" class="text-muted py-4">
                                Geen leveringsinformatie gevonden.
                            </td>
                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>

    <a href="/Magazijn"
       class="btn btn-outline-secondary mt-4">
        Terug naar magazijn
    </a>

</div>

</body>
</html>