<!DOCTYPE html lang="en">
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="code.js"></script>
    <title>Firma curierat - BD</title>
</head>
<body>
    <button id="homepageButton" class="float-left homeButton">Pagina principală</button>
    <script type="text/javascript">
        document.getElementById("homepageButton").onclick = function () {
            location.href = "index.php";
        };
    </script>

    <div class="upcomingOrder">    
        <button id="submitDetailsOrder" onclick="getOrdersDetails()">Vezi comenzile care urmează să fie livrate</button>
        <div id="orderUpcoming" class="orderUpcomingShow"></div>
    </div>

    <script type="text/javascript">
        function getOrdersDetails() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "includes/upcomingOrder.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response here
                    document.getElementById("orderUpcoming").innerHTML = xhr.responseText;
                }
            };
            xhr.send(""); // Send an empty payload
        }
    </script>
</body>
</html>
