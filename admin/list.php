<?php
session_start();
include ('.././connection.php');

$query = "SELECT * from users";

$result = mysqli_query($connection, $query);

$data = [];
while ($output = mysqli_fetch_assoc($result)) {
    $data[] = $output;
}


$text = 'block';


if (isset($_SESSION['text'])) {
    $text = $_SESSION['text'];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/chat_app/assest/vender/bootstrap/css/bootstrap.min.css">
    <title>Admin List</title>
</head>

<body>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id </th>
                <th scope="col">email</th>
                <th scope="col">Password</th>
                <th scope="col">First_name</th>
                <th scope="col">Last_name</th>
                <th scope="col">Phone</th>
                <th scope="col">Pincode</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <?php foreach ($data as $k => $v) { ?>
            <tbody>
                <tr>
                    <td><?= $v['id'] ?></td>
                    <td><?= $v['email'] ?></td>
                    <td><?= $v['password'] ?></td>
                    <td><?= $v['first_name'] ?></td>
                    <td><?= $v['last_name'] ?></td>
                    <td><?= $v['phone'] ?></td>
                    <td><?= $v['pin_code'] ?></td>

                    <td> 
                        <a class="btn btn-primary text-data" onclick="changeText()"
                            href="http://localhost/chat_app/admin/server/block.php?id=<?= $v['id'] ?>">
<?=$text?>
                        </a>
                    </td>

                </tr>
            </tbody>
        <?php } ?>
    </table>
    <?php
// function changeText($text){
//     if ($text == 'block'){
//         return "block";
//     }else{
//         return "unblock";
//     }
// }

?>
</body>

</html>