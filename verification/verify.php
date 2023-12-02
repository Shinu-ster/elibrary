<?php
include '../database/dbconnect.php';
session_start();
if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    $profile = $_SESSION['id'];
    // Allow to use this page only if the session exists
} else {
    header('location:http://localhost/4thsemProj/login/login.php');
    exit; // Add exit after the header to stop script execution
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/global.css">
</head>

<body>
    <?php
    include_once '../components/navbar.php';
    // $sql = "SELECT COUNT(is_verify) AS count
    // FROM pdf
    // WHERE is_verify = 0 AND id = $profile";
    // $res = mysqli_query($conn, $sql);

    // if ($res) {
    //     $row = mysqli_fetch_assoc($res);
    //     // echo $profile;
    //     $count = $row['count'];

    //     echo "Count <sup>" . $count. "</sup>";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
// echo "Profile" .$profile;
// $sql = "SELECT * FROM pdf where id = profile ";
// $result = mysqli_query($conn, $sql);
// $num = mysqli_num_rows($result);
// if ($num > 0) {
//     while ($row = mysqli_fetch_assoc($result)) {
// // echo $num;
// // echo $profile;
// // echo $count;
    

    ?>
   
    <table border=1>
        <tr>
       
            <th>Name</th>
            <th>Description</th>
            <th>Cover</th>
            <th>Status</th>
        </tr>
       <tr>
            <td>
            <?php
        // echo "Profile" .$profile;
        $sql = "SELECT * FROM pdf where id = $profile AND is_verify = 0";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <?php
        echo $row['name'];
    ?>
            </td>
            <td><?php
            echo $row['description']
            ?></td>
            <td>
                <img src=" <?php
                    echo $row['cover']
                ?>" alt="" srcset="" height="20px" width="20px">
               
            </td>
            <td>
                <?php
                    echo $row['is_verify']
                ?>
            </td>
       </tr>    
    </table>
    <?php
    }
}
    ?>
</body>

</html>