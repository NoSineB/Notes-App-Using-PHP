<?php require base_dir('views/partials/head.php') ?>
<?php require base_dir('views/partials/nav.php') ?>
<?php require base_dir('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">go back...</a>
        </p>

        <p><?= htmlspecialchars($note['body']) ?></p>
    </div>
</main>


<?php require base_dir('views/partials/footer.php') ?>
