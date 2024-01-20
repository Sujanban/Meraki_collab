<?php include "header.php";
if (isset($_SESSION['user_data'])) {
    $user_id = $_SESSION['user_data']['0'];
    $role = $_SESSION['user_data']['2'];
}
if ($role != 0) {

    $sql = "SELECT * FROM request LEFT JOIN food ON request.post_id = food.food_id LEFT JOIN user ON food.donor_id = user.user_id";
    $query = mysqli_query($conn, $sql);
} else {
    $sql = "SELECT * FROM request LEFT JOIN food ON request.post_id = food.food_id LEFT JOIN user ON food.donor_id = user.user_id WHERE user.user_id='$user_id'";
    $query = mysqli_query($conn, $sql);
}
?>


<h1>Manage User ></h1>
<div class="p-4">
  <!-- <table class="table-auto">
    <thead class="">
      <tr class="m-4">
        <th class="p-4">S.N</th>
        <th>Requesters Name</th>
        <th>Requested Product</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr class="">
        <td class="p-4">1</td>
        <td>Sam Sulek</td>
        <td>Rice and vegies</td>
        <td>
          <input class="py-2 px-4 bg-stone-800 text-white rounded-md" type="submit" name="edit" value="Edit" />
          <input class="py-2 px-4 bg-red-800 text-white rounded-md" type="submit" name="delete" value="Delete" />
        </td>
      </tr>
    </tbody>
  </table> -->
</div>
<div>
    <form action="" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">S.N</th>
                    <th scope="col">Request ID</th>
                    <th scope="col">Requester Name</th>
                    <th scope="col">Requester Contact</th>
                    <th scope="col">Requester email</th>
                    <th scope="col">Requester message</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                while (($row = mysqli_fetch_array($query))) {
                    $status = $row['status'];
                    if ($status == NULL) { ?>
                        <tr>
                            <td> <?= $count++ ?></td>
                            <td> <?= $row['request_id'] ?></td>
                            <td> <?= $row['client_name'] ?></td>
                            <td> <?= $row['client_phone'] ?></td>
                            <td> <?= $row['client_email'] ?></td>
                            <td> <?= $row['request_detail'] ?></td>
                            <td>
                                <input hidden type="text" name="client_name" value="<?= $row['client_name'] ?>">
                                <input hidden type="text" name="client_email" value="<?= $row['client_email'] ?>">

                                <div>
                                    <input hidden type="text" value="<?= $row['request_id'] ?>" name="request_id">
                                    <input class="btn btn-primary" type="submit" name="approve" value="Approve">
                                </div>
                                <form action="" method="POST" onsubmit="return confirm('Are you sure yo want to reject?')">
                                    <input type="hidden" value="" name="city_id">
                                    <input type="submit" class="btn btn-danger" value="Reject" name="reject">
                                </form>
                            <?php
                        }
                            ?>
                            </td>

                        </tr>

                    <?php }
                    ?>
            </tbody>
        </table>
    </form>
</div>
<?php include "footer.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['approve'])) {
    $request_id = $_POST['request_id'];

    $from_email = "bansujan@gmail.com";
    $subject = "Action Required";
    $body = "Your Request is Granted. Please arrive at a pickup place within 24 Hour.";
    $client_name = $_POST['client_name'];
    $client_email = $_POST['client_email'];

    $sql = "UPDATE request SET status = '1' WHERE request_id = $request_id";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        // echo "<script>
        // alert('Request Accepted');
        // </script>";




        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;             //Enable SMTP authentication
        $mail->Username   = 'bansujan@gmail.com';   //SMTP write your email
        $mail->Password   = 'xplqdnfajojuhmbt';      //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom($from_email, $client_name); // Sender Email and name
        $mail->addAddress($client_email);     //Add a recipient email  
        $mail->addReplyTo($from_email, $client_name); // reply to sender email

        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = $subject;   // email subject headings
        $mail->Body    = $body; //email message

        // Success sent message alert
        $mail->send();
        echo
        " 
        <script> 
         alert('Message was sent successfully!');
         document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "<script>
        alert('Request Rejected');
        </script>";
    }
}
if (isset($_POST['reject'])) {
    $request_id = $_POST['request_id'];

    $from_email = "bansujan@gmail.com";
    $subject = "Action Required";
    $body = "Your Request for food has been rejected";
    $client_name = $_POST['client_name'];
    $client_email = $_POST['client_email'];


    $sql = "UPDATE request SET status = '0' WHERE request_id = $request_id";
    $query = mysqli_query($conn, $sql);
    if ($query) {




        $mail = new PHPMailer(true);

        //Server settings
        $mail->isSMTP();                              //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;             //Enable SMTP authentication
        $mail->Username   = 'bansujan@gmail.com';   //SMTP write your email
        $mail->Password   = 'xplqdnfajojuhmbt';      //SMTP password
        $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom($from_email, $client_name); // Sender Email and name
        $mail->addAddress($client_email);     //Add a recipient email  
        $mail->addReplyTo($from_email, $client_name); // reply to sender email

        //Content
        $mail->isHTML(true);               //Set email format to HTML
        $mail->Subject = $subject;   // email subject headings
        $mail->Body    = $body; //email message

        // Success sent message alert
        $mail->send();
        echo
        " 
        <script> 
         alert('Message was sent successfully!');
         document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "nop";
    }
}
?>