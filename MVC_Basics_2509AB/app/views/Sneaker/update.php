<?php require_once APPROOT . '/views/includes/header.php'; ?>

<?php //var_dump($_POST); ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-6">
            <h3 class="text-success"><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?= $data['display'] ?> justify-content-center">
        <div class="col-6">
            <div class="alert alert-<?= $data['color'] ?> success" role="alert">
                <h2><?= $data['message'] ?></h2>
            </div>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-6">
            <form action="<?= URLROOT; ?>/SneakerController/update" method="post">

                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input name="merk" type="text"
                        class="form-control <?= isset($data['errors']['merk']) ? 'is-invalid' : ''; ?>" id="merk"
                        value="<?= $_POST['merk'] ?? $data['smartphone']->Merk ?>">
                    <?php if (isset($data['errors']['merk'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['merk']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input name="model" type="text"
                        class="form-control <?= isset($data['errors']['model']) ? 'is-invalid' : ''; ?>" id="model"
                        value="<?= $_POST['model'] ?? $data['smartphone']->Model ?>">
                    <?php if (isset($data['errors']['model'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['model']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <input name="type" type="text"
                        class="form-control <?= isset($data['errors']['type']) ? 'is-invalid' : ''; ?>" id="type"
                        value="<?= $_POST['type'] ?? $data['smartphone']->Type ?>">
                    <?php if (isset($data['errors']['type'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['type']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="prijs" class="form-label">Prijs</label>
                    <input name="prijs" type="number" min="0" max="9999" step="0.01"
                        class="form-control <?= isset($data['errors']['prijs']) ? 'is-invalid' : ''; ?>" id="prijs"
                        value="<?= $_POST['prijs'] ?? $data['smartphone']->Prijs ?>">
                    <?php if (isset($data['errors']['prijs'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['prijs']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="materiaal" class="form-label">Materiaal</label>
                    <input name="materiaal" type="text"
                        class="form-control <?= isset($data['errors']['materiaal']) ? 'is-invalid' : ''; ?>" id="materiaal"
                        value="<?= $_POST['materiaal'] ?? $data['smartphone']->Materiaal ?>">
                    <?php if (isset($data['errors']['materiaal'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['materiaal']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="gewicht" class="form-label">Gewicht</label>
                    <input name="gewicht" type="text"
                        class="form-control <?= isset($data['errors']['gewicht']) ? 'is-invalid' : ''; ?>" id="gewicht"
                        value="<?= $_POST['gewicht'] ?? $data['smartphone']->Gewicht ?>">
                    <?php if (isset($data['errors']['gewicht'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['gewicht']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="releasedatum" class="form-label">Releasedatum</label>
                    <input name="releasedatum" type="date"
                        class="form-control <?= isset($data['errors']['releasedatum']) ? 'is-invalid' : ''; ?>"
                        id="releasedatum" value="<?= $_POST['releasedatum'] ?? $data['smartphone']->Releasedatum ?>">
                    <?php if (isset($data['errors']['releasedatum'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['releasedatum']; ?></div>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="id" value="<?= $_POST['id'] ?? $data['smartphone']->Id ?>">

                <button type="submit" class="btn btn-primary">Verstuur</button>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- eind tabel -->
<?php require_once APPROOT . '/views/includes/footer.php'; ?>