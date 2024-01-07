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

    <div class="higherOrder">    
        <form id="formHigherOrder">
            <h1>Caută comanda cu o valoare mai mare decât cea introdusă mai jos</h1>
            <input type="text" name="valueHigh" id="valueHigh" placeholder="Valoarea minimă a comenzii">
            <button id="submitDetailsOrder">Vezi comenzile</button>
        </form>
        <div id="higherDetails" class="higherShow"></div>
    </div>

    <script type="text/javascript">
        document.getElementById("formHigherOrder").addEventListener("submit", function(event) {
            event.preventDefault();
            getOrderDetails();
        });

        function getOrderDetails() {
            var orderValue = document.getElementById("valueHigh").value;

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "includes/higherOrder.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response here
                    document.getElementById("higherDetails").innerHTML = xhr.responseText;
                }
            };
            xhr.send("valueHigh=" + orderValue);
        }
    </script>
</body>
</html>
