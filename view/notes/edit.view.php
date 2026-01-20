<?php require base_path("view/partials/header.php") ?>
<div class="min-h-full">
    <?php require base_path("view/partials/nav.php") ?>
    <?php require base_path("view/partials/banner.php") ?>


    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">

            <form method="POST" action="/note">

                <div class="col-span-full">
                    <label for="body" class="block text-sm/6 font-medium text-white">Body</label>
                    <div class="mt-2">
                    <textarea id="body" name="body" class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"><?= $note['body'] ?></textarea>
                    </div>
                </div>
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?php echo $note['id'] ?>">

                <div class="mt-6 flex items-center justify-end gap-x-6">

                    <a href="/notes" class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">cancel</a>

                    <button type="submit" class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Save</button>

                </div>

            </form>

        </div>
    </main>
</div>

<?php require base_path("view/partials/footer.php") ?>



̉̉