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

    <div class="carsOrder">    
        <form id="orderUpcoming" action="includes/top_page_average.php" method="post">
            <h1>Numărul de colete duse cu fiecare mașină</h1>
            <select id="cars_Order" name="cars_Order" style="background-color: #b2a67a;">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option> 
            </select>
            <input type="submit" />
        </form>
        <div id="orderUpcomingResult" class="orderUpcomingResultShow"></div>

    </div>

    <script type="text/javascript">
        document.getElementById("orderUpcoming").addEventListener("submit", function(event) {
            event.preventDefault();
            getOrderDetails();
        });

        function getOrderDetails() {
            var orderCount = document.getElementById("cars_Order").value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "includes/carsOrder.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response here
                    document.getElementById("orderUpcomingResult").innerHTML = xhr.responseText;

                }
            };
            xhr.send("cars_Order=" + orderCount);
        }
    </script>
</body>
</html>
