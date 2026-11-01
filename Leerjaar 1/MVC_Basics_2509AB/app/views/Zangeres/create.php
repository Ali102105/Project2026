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
            <form action="<?= URLROOT; ?>/ZangeresController/create" method="post">
                <div class="mb-3">
                    <label for="stagenaam" class="form-label">Stagenaam</label>
                    <input name="stagenaam" type="text"
                        class="form-control <?= isset($data['errors']['stagenaam']) ? 'is-invalid' : ''; ?>"
                        id="stagenaam" value="<?= $_POST['stagenaam'] ?? ''; ?>">
                    <?php if (isset($data['errors']['stagenaam'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['stagenaam']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="naam" class="form-label">Naam</label>
                    <input name="naam" type="text"
                        class="form-control <?= isset($data['errors']['naam']) ? 'is-invalid' : ''; ?>" id="naam"
                        value="<?= $_POST['naam'] ?? ''; ?>">
                    <?php if (isset($data['errors']['naam'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['naam']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="tussenvoegsel" class="form-label">Tussenvoegsel</label>
                    <input name="tussenvoegsel" type="text"
                        class="form-control <?= isset($data['errors']['tussenvoegsel']) ? 'is-invalid' : ''; ?>"
                        id="tussenvoegsel" value="<?= $_POST['tussenvoegsel'] ?? ''; ?>">
                    <?php if (isset($data['errors']['tussenvoegsel'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['tussenvoegsel']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="achternaam" class="form-label">Achternaam</label>
                    <input name="achternaam" type="text"
                        class="form-control <?= isset($data['errors']['achternaam']) ? 'is-invalid' : ''; ?>"
                        id="achternaam" value="<?= $_POST['achternaam'] ?? ''; ?>">
                    <?php if (isset($data['errors']['achternaam'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['achternaam']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="land" class="form-label">Land</label>
                    <input name="land" type="text"
                        class="form-control <?= isset($data['errors']['land']) ? 'is-invalid' : ''; ?>" id="land"
                        value="<?= $_POST['land'] ?? ''; ?>">
                    <?php if (isset($data['errors']['land'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['land']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="networth" class="form-label">Networth</label>
                    <input name="networth" type="number" min="0" max="999999999999" step="0.01"
                        class="form-control <?= isset($data['errors']['networth']) ? 'is-invalid' : ''; ?>"
                        id="networth" value="<?= $_POST['networth'] ?? ''; ?>">
                    <?php if (isset($data['errors']['networth'])): ?>
                        <div class="invalid-feedback"><?= $data['errors']['networth']; ?></div>
                    <?php endif; ?>
                </div>


                <div class="d-flex justify-content-between mt-3 mb-5">
                    <button type="submit" class="btn btn-primary">Verstuur</button>
                    <a href="<?= URLROOT; ?>/homepages/index" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Terug naar homepage
                    </a>
                </div>
            </form>

            <a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left"></i></a>
        </div>
    </div>
</div>

<!-- eind tabel -->
<?php require_once APPROOT . '/views/includes/footer.php'; ?>