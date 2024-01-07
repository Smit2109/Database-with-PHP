<!DOCTYPE html lang="en">
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="code.js"></script>
    <script src="searchCommand.js"></script>
    <title>Firma curierat - BD</title>
    
</head>
<body>
    <div class="searchClient">
    <button id="homepageButton" class="float-left homeButton" >Homepage</button>
    <script type="text/javascript">
        document.getElementById("homepageButton").onclick = function () {
            location.href = "index.php";
        };
    </script>

    <div class="searchOrder">    
            <form id="formSearchClient">
                <h1>Caută un client</h1>
                <input type="text" name="numele_clientului" id="numele_clientului" placeholder="Numele complet al clientului">
                <button id="submitClientInfo">Vezi detalii despre client</button>
            </form>
            <div id="clientDetails" class="clientShow"></div>
        </div>

    <div class="viewAllPage">
        <script type="text/javascript">
                document.getElementById("formSearchClient").addEventListener("submit", function(event) {
                    event.preventDefault();
                    getOrderDetails();
                });

                function getOrderDetails() {
                    var orderId = document.getElementById("numele_clientului").value;

                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "includes/searchInDb.inc.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState == 4 && xhr.status == 200) {
                            // Handle the response here
                            document.getElementById("clientDetails").innerHTML = xhr.responseText;
                        }
                    };
                    xhr.send("numele_clientului=" + orderId);
                }
            </script>
        </div>
    </div>
    
</body>

</html>
