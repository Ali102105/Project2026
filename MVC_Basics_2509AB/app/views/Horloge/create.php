<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?php echo $data['display']; ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['color'] ?? 'success'; ?>" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>


    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/HorlogeController/create" method="post">
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>" id="merk"
                        value="<?= $_POST['merk'] ?? ''; ?>">
                    <?php if (isset($data['errors']['merk'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>" id="model"
                        value="<?= $_POST['model'] ?? ''; ?>">
                    <?php if (isset($data['errors']['model'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" max="4000"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>" id="prijs"
                        value="<?= $_POST['prijs'] ?? ''; ?>">
                    <?php if (isset($data['errors']['prijs'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['prijs']; ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- eind tabel -->
<?php require_once APPROOT . '/views/includes/footer.php'; ?>