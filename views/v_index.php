<?php

include_once "partials/header.php";

?>

<div class="lg:flex lg:items-center lg:justify-between mb-4">
    <div class="min-w-0 flex-1">
        <h2 class="text-2xl font-bold leading-7  sm:truncate sm:text-3xl sm:tracking-tight">Product List</h2>
    </div>

    <div class="mt-5 flex lg:ml-4 lg:mt-0">
        <span class="sm:ml-3">
            <a href="views/create.php" type="button" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Create New Product
            </a>
        </span>
    </div>
</div>

<?php require_once "productsList.php"; ?>


</div>

</body>

</html>
