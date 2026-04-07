<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3 d-flex justify-content-center">
    <div class="col-10 text-begin text-danger">
        <a href="<?= URLROOT; ?>/ZangeresController/create" class="btn btn-warning" role="button">Nieuwe Zangeres
        </a>
    </div>
</div>

<div class="row mt-3 d-flex justify-content-center">
    <div class="col-10">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Stagenaam</th>
                    <th>Naam</th>
                    <th>Tussenvoegsel</th>
                    <th>Achternaam</th>
                    <th>Land</th>
                    <th>Networth</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['result'] as $zangeres): ?>
                    <tr>
                        <td><?= $zangeres->Stagenaam; ?></td>
                        <td><?= $zangeres->Naam; ?></td>
                        <td><?= $zangeres->Tussenvoegsel; ?></td>
                        <td><?= $zangeres->Achternaam; ?></td>
                        <td><?= $zangeres->Land; ?></td>
                        <td><?= $zangeres->Networth; ?></td>
                        <td class="text-center">
                            <a href="<?= URLROOT; ?>/ZangeresController/update/<?= $zangeres->Id; ?>">
                                <i class="bi bi-pencil-fill text-success"></i>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="<?= URLROOT; ?>/ZangeresController/delete/<?= $zangeres->Id; ?>"
                                onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                <i class="bi bi-trash3-fill text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Terug naar homepage
        </a>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>