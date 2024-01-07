<!DOCTYPE html lang = "en">
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<script src="code.js"></script>
		<script src="searchCommand.js"></script>
		<title>Firma curierat - BD</title>
	</head>
	<body>
		<button id="homepageButton" class="float-left homeButton" >Homepage</button>
        <script type="text/javascript">
            document.getElementById("homepageButton").onclick = function () {
                location.href = "index.php";
            };		
        </script>

		<div class = "form_modify">
        <button id="addOrderSection" class="float-left addOrderPage">Plasează o comandă</button>
            <script type="text/javascript">
                document.getElementById("addOrderSection").onclick = function () {
                    location.href = "order_add.php";
                };
            </script>

            <button id="updateOrderSection" class="float-left updateOrderPage">Modifică o comandă</button>
            <script type="text/javascript">
                document.getElementById("updateOrderSection").onclick = function () {
                    location.href = "order_update.php";
                };
            </script>

            <button id="deleteOrderSection" class="float-left deleteOrderPage">Șterge o comandă</button>
            <script type="text/javascript">
                document.getElementById("deleteOrderSection").onclick = function () {
                    location.href = "order_delete.php";
                };
            </script>

            <button id="searchOrder" class="float-left searchButton" >Caută comanda</button>
            <script type="text/javascript">
                document.getElementById("searchOrder").onclick = function () {
                    location.href = "awb_search.php";
                };
            </script>
		</div>
	</body>
</html>