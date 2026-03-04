<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>
</div>

<div class="row mt-3 d-flex justify-content-center">
    <div class="col-10">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Prijs</th>
                    <th>Verwijder</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['result'] as $horloge) : ?>
                    <tr>
                        <td><?= $horloge->Merk; ?></td>
                        <td><?= $horloge->Model; ?></td>
                        <td><?= $horloge->Prijs; ?></td>
                        <td class="text-center">
                            <a href="<?= URLROOT; ?>/HorlogeController/delete/<?= $horloge->Id; ?>"
                            onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                <i class="bi bi-trash3-fill text-danger"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>