<?php require_once APPROOT . '/views/includes/header.php'; ?>

<div class="container">
    <div class="row mt-3 d-flex justify-content-center">

        <div class="col-10">

            <h3><?php echo $data['title']; ?></h3>

        </div>

    </div>

<div class="row mt-3 d-flex justify-content-center">
    <div class="col-10">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Prijs</th>
                    <th>Geheugen</th>
                    <th>Besturingssysteem</th>
                    <th>Schermgrootte</th>
                    <th>Releasedatum</th>
                    <th>MegaPixels</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['result'] as $smartphone) : ?>
                    <tr>
                        <td><?= $smartphone->Merk; ?></td>
                        <td><?= $smartphone->Model; ?></td>
                        <td><?= $smartphone->Prijs; ?></td>
                        <td><?= $smartphone->Geheugen; ?></td>
                        <td><?= $smartphone->Besturingssysteem; ?></td>
                        <td><?= $smartphone->Schermgrootte; ?></td>
                        <td><?= $smartphone->Releasedatum; ?></td>
                        <td><?= $smartphone->MegaPixels; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
    </div>
</div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>