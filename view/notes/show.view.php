<?php require base_path('view/partials/header.php') ?>
<div class="min-h-full">
<?php require base_path('view/partials/nav.php') ?>
<?php require base_path('view/partials/banner.php') ?>


    <main>

        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 text-white">


            <p class="mb-6">
                <a href="/notes" class="text-blue-500 underline">Go Back....</a>
            </p>

              <p>  <?= htmlspecialchars($note['body']); ?> </p>

            <footer class="mt-5">
                <a href="/note/edit?id=<?= $note['id']?>" class="text-gray-500 border border-current px-3 py-1 rounded">Edit</a>
            </footer>


            <form class="mt-4" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="text-red-500 mt-4">Delete</button>
            </form>

        </div>
    </main>
</div>

<?php require base_path("view/partials/footer.php") ?>



