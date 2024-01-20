<?php include('header.php');
include('config.php');
if (isset($_POST['submit'])) {
    $search_term = $_POST['search_term'];

    $sql = "SELECT * FROM food WHERE food_name LIKE '%$search_term%' ";
    $query = mysqli_query($conn, $sql);
}

?>
<h1>All the available foods</h1>



<!-- product search -->
<div class="py-16 search_product bg-slate-200">
    <div class="max-w-5xl mx-auto">
        <div class="md:grid grid-cols-3 gap-4">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <div class="grid rounded-md bg-white">
                    <div class="p-2">
                        <img class="mx-h-[250px]" src="admin/upload/<?= $row['food_image'] ?>" alt="">
                    </div>
                    <div class="p-2">
                        <h1 class="font-medium text-lg py-1"> <?= $row['food_name'] ?></h1>
                        <p class="text-sm text-gray-500"><?= $row['food_description'] ?></p>
                        <li class="py-4"><a class="text-xs px-4 py-2 rounded-full bg-[#1A956E] text-white" href="product.php?id=<?= $row['food_id'] ?>">View Details</a></li>
                    </div>
                </div>

            <?php
            }
            ?>
        </div>
    </div>

</div>

<?php include('footer.php') ?>