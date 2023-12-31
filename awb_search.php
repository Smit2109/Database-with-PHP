<!DOCTYPE html lang="en">
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="code.js"></script>
    <title>Firma curierat - BD</title>
</head>
<body>
    <button id="homepageButton" class="float-left homeButton" >Pagina principală</button>
    <script type="text/javascript">
        document.getElementById("homepageButton").onclick = function () {
            location.href = "index.php";
        };
    </script>

    <div class="searchOrder">    
        <form id="formSearchOrder">
            <h1>Caută comanda</h1>
            <input type="text" name="AWB" id="AWB" placeholder="AWB-ul comenzii">
            <button id="submitDetailsOrder">Vezi detaliile comenzii</button>
        </form>
        <div id="orderDetails" class="orderShow"></div>
    </div>

    <script type="text/javascript">
        document.getElementById("formSearchOrder").addEventListener("submit", function(event) {
            event.preventDefault();
            getOrderDetails();
        });

        function getOrderDetails() {
            var orderId = document.getElementById("AWB").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "includes/searchOrder.inc.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response here
                    document.getElementById("orderDetails").innerHTML = xhr.responseText;
                }
            };
            xhr.send("AWB=" + orderId);
        }
    </script>
</body>
</html>
