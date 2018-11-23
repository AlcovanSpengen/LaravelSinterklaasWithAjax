<?php


$con = mysqli_connect('localhost','root','','sinterklaas');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"sinterklaas");

$commentNewCount = $_POST['commentNewCount'];


$sql="SELECT * FROM comments LIMIT $commentNewCount";
$result = mysqli_query($con,$sql);


    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>";
            echo $row['name'];
            echo "<br>";
            echo $row['comment'];
            echo "</p>";
            
        }
    } else {
        echo "There are no comments!";
    }
?>