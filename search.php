<?php

$searchVal = $_REQUEST["name"];
$conn = mysqli_connect("localhost", "root", "", "ProductsDb") or die("Could not establish connection");

$query = "SELECT * FROM products WHERE name LIKE '%" . $searchVal . "%' OR description LIKE '%" . $searchVal . "%';";
$results = mysqli_query($conn, $query);
echo "<ul>";
while ($row =  mysqli_fetch_array($results)) {
    echo "<li onclick='searchProduct(this.innerHTML)'>" . $row[1] . "</li>";
}
echo "</ul>";
mysqli_close($conn);
?>
<html>

<head>
    <title>Produktet</title>
</head>

<body>
<div id="product-info"></div>
    <script>
        
        function searchProduct(word) {
            console.log(word)
            var xmlhttp;
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            } else {
                alert("Your browser does not support XMLHTTPREQUEST");
            }
            console.log(xmlhttp)
            xmlhttp.onreadystatechange = function() {

                if (xmlhttp.readyState == 4) {

                    var div = document.getElementById("product-info");

                    div.innerHTML = xmlhttp.responseText;

                }

            }

            url = 'products.php?name=' + word;

            xmlhttp.open("POST", url, true);

            xmlhttp.send(null);
        }
    </script>
</body>

</html>