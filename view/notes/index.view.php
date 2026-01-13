<?php require base_path("view/partials/header.php") ?>
<?php require base_path("view/partials/nav.php") ?>
<?php require base_path("view/partials/banner.php") ?>


<div class="min-h-full">
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">

        <ul class="mb-5">

            <?php foreach ($notes as $note) : ?>

            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">

                <?= HTMLSPECIALCHARS($note['body']); ?>

                </a>
            </li>

        <?php endforeach; ?>

        </ul>

            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </div>
    </main>
</div>

<?php require base_path("view/partials/footer.php") ?>



