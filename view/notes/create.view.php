<?php require base_path("view/partials/header.php") ?>
<div class="min-h-full">
<?php require base_path("view/partials/nav.php") ?>
<?php require base_path("view/partials/banner.php") ?>


        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 ">

                <form method="POST" action="/notes">
                            <div class="col-span-full">

                                <div>
                                    <label for="title" class="block text-sm/6 font-medium text-white">title</label>
                                    <input type="text" id="title" name="title"
                                           class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                                    <?php if(isset($errors['title'])) :?>
                                    <p class="text-white mt-5 mb-5 text-sm"><?= $errors['title'] ?></p>
                                    <?php endif; ?>
                                </div>


                                    <label for="body" class="block text-sm/6 font-medium text-white">Body</label>
                                    <div class="mt-2">
                                        <textarea id="body" name="body"
                                                  class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"><?= isset($_POST['body']) ? $_POST['body'] : ''; ?></textarea>
                                        <?php if (isset($errors['body'])) : ?>
                                       <p class="text-white mt-5 mb-5 text-sm"> <?= $errors['body']; ?> </p>
                                        <?php endif; ?>

                                    </div>
                                </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">

                        <button type="submit"
                                class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                            Save
                        </button>

                    </div>

                </form>

            </div>
        </main>
    </div>

<?php require base_path("view/partials/footer.php") ?>