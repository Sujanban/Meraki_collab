<?php include 'header.php';
if (isset($_SESSION['user_data'])) {
  $user_id = $_SESSION['user_data']['0'];
  $role = $_SESSION['user_data']['2'];
}
if ($role == 1) {

  $sql = "SELECT * FROM request LEFT JOIN food ON request.post_id = food.food_id LEFT JOIN user ON food.donor_id = user.user_id WHERE request.status = 1 OR request.status = 0";
  $query = mysqli_query($conn, $sql);
}
if ($role == 0) {
  $sql = "SELECT * FROM request LEFT JOIN food ON request.post_id = food.food_id LEFT JOIN user ON food.donor_id = user.user_id WHERE user.user_id='$user_id' AND request.status = 1 OR user.user_id='$user_id' AND request.status = 0";
  $query = mysqli_query($conn, $sql);
}
?>
<h1>Manage User ></h1>
<div class="p-4">
  <table class="table-auto">
    <thead class="">
      <tr class="m-4">
        <th class="p-4">S.N</th>
        <th>Requesters Name</th>
        <th>Requesters Contact</th>
        <th>Requesters message</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      while (($row = mysqli_fetch_array($query))) { ?>
        <tr class="">
          <td class="p-4"><?= $count++ ?></td>
          <td><?= $row['client_name'] ?></td>
          <td><?= $row['client_phone'] ?></td>
          <td><?= $row['request_detail'] ?></td>
          <td> <?php
                $status = $row['status'];
                if ($status == 1) {
                  echo "Approved!";
                } elseif ($status == 0) {
                  echo "Rejected!";
                ?>

            <?php
                }
            ?>
          </td>
        </tr>
      <?php }
      ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
</body>

</html>