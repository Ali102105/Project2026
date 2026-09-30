<!DOCTYPE html>
<html lang="nl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Magazijn Overzicht</title>

  @vite(['resources/css/bootstrap.css', 'resources/js/app.js'])
</head>

<body class="bg-light">

  <div class="container py-5">

    <div class="mb-4">
      <h1 class="fw-bold">Magazijn Overzicht</h1>
      <p class="text-muted">
        Overzicht van alle producten in het magazijn
      </p>
    </div>

    <div class="card shadow-sm border-0">
      <div class="card-body">

        <div class="table-responsive">
          <table class="table table-hover align-middle mb-0 text-center">

            <thead class="table-light">
              <tr>
                <th>Barcode</th>
                <th>Naam</th>
                <th>Verpakkingseenheid</th>
                <th>Aantal aanwezig</th>
                <th>Allergenen Info</th>
                <th>Leverantie Info</th>
              </tr>
            </thead>

            <tbody>

              @forelse ($magazijnen as $magazijn)

                <tr>
                  <td>
                    {{ $magazijn->Barcode }}
                  </td>

                  <td class="fw-semibold">
                    {{ $magazijn->Naam }}
                  </td>

                  <td>
                    {{ $magazijn->VerpakkingsEenheid }}
                  </td>

                  <td>
                    {{ $magazijn->AantalAanwezig }}
                  </td>

                  <td>
                    <a href="{{ route('magazijn.allergenen', $magazijn->ProductId) }}"
                      class="btn btn-outline-primary btn-sm">
                      ?
                    </a>
                  </td>

                  <td>
                    <a href="{{ route('magazijn.leverantie', $magazijn->ProductId) }}"
                      class="btn btn-outline-primary btn-sm">
                      ?
                    </a>
                  </td>
                </tr>

              @empty

                <tr>
                  <td colspan="6" class="text-center text-muted py-4">
                    Geen magazijngegevens gevonden.
                  </td>
                </tr>

              @endforelse

            </tbody>

          </table>
        </div>

      </div>
    </div>

  </div>

</body>

</html>