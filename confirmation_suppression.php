<?php include_once(__DIR__ . '/include/header.php'); ?>

<main>
    <h1>Confirmation de suppression</h1>
    <a href="administration_module_personnel.php">Retour à la liste</a>
    
    <?php if(isset($_GET['message'])): ?>
        <p><?= $_GET['message'] ?></p>
    <?php endif; ?>
</main>

<?php include_once(__DIR__ . '/include/footer.php'); ?>
