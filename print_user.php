<?php
require ('connection.inc.php');
require ('functions.inc.php');

$result = mysqli_query($con, "SELECT * FROM `user`");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/favicon.png">
    <title>Users Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body{
            margin: 0;
        }
        .print-area{
        width: 1100px;
        height: 1050px;
        margin: auto;
        box-sizing: border-box;
        page-break-after: always;
        }
        .data-info{

        }
        .data-info table{
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table th,
        .data-info table td{
            border: 1px solid #555;
            padding: 4px;
            line-height: 1em;
        }
    </style>
</head>
<body onload="window.print()">
    <?php 
        $sl = 1;
        $page = 1;
        $total = mysqli_num_rows($result);
        $par_page = 25;
        while($row = mysqli_fetch_assoc($result)){

        if($sl % $par_page == 1){
            echo page_header();
        }
        ?>
            <tr>
                <td><?= $sl; ?></td>
                <td><?= ucwords($row['fname'].' '.$row['lname']) ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['phone'] ?></td>
                <td><?= date('d-M-Y', strtotime($row['datetime'])) ?></td>
            </tr>
        <?php
        if($sl % $par_page == 0 || $total == $par_page){
            echo page_footer($page++);
        }
        $sl++;
        }
    ?>        
</body>
</html>
<?php

function page_header(){
    $data = '
    <div class="print-area">
        <div class="mt-5 mb-4">
            <div class="d-flex justify-content-center mb-1">
                <h4>Users Details</h4>
            </div>
        </div>
        <div class="data-info">
            <table>
                <tr>
                    <th>Sl No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Added on</th>
                </tr>
    ';
    return $data;
}
function page_footer($page){
    $data = '
    </table>
            <div class="page-info">Page :- '.$page.'</div>
        </div>
    </div>
    ';
    return $data;
}

?>