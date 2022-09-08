<?php 
    $name = $_REQUEST["name"];
    $conn = mysqli_connect("localhost", "root", "", "ProductsDb") or die("Could not establish connection");

    $query = "SELECT * FROM products WHERE name ='" . $name . "';";
    $result = mysqli_query($conn, $query);
    $i = 0;
    while($row = mysqli_fetch_array($result)){
        echo "

                <p>".++$i.".</p>

                <p> ".$row["name"]." </p>

                <p> ".$row["image"]." </p>

                <p> ".$row["description"]." </p>";
    }

?>