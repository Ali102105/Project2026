<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Allergenen Overzicht</title>

    @vite(['resources/css/bootstrap.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="mb-4">
        <h1 class="fw-bold">Allergenen Overzicht</h1>

        @if(count($allergenen) > 0)
            <p class="text-muted">
                Allergeneninformatie van {{ $allergenen[0]->ProductNaam }}
            </p>
        @endif
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">

            @if(count($allergenen) > 0)

                <div class="mb-4">
                    <p>
                        <strong>Naam:</strong>
                        {{ $allergenen[0]->ProductNaam }}
                    </p>

                    <p>
                        <strong>Barcode:</strong>
                        {{ $allergenen[0]->Barcode }}
                    </p>
                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0 text-center">

                    <thead class="table-light">
                        <tr>
                            <th>Naam</th>
                            <th>Omschrijving</th>
                        </tr>
                    </thead>

                    <tbody>

                    @forelse($allergenen as $allergeen)

                        <tr>
                            <td class="fw-semibold">
                                {{ $allergeen->AllergeenNaam }}
                            </td>

                            <td>
                                {{ $allergeen->Omschrijving }}
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="2" class="text-muted py-4">
                                Geen allergenen gevonden.
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