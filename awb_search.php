<!DOCTYPE html lang = "en">
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<script src="code.js"></script>
		<script src="searchCommand.js"></script>
		<title>Firma curierat - BD</title>
	</head>
	<body>
        <button id="homepageButton" class="float-left submit-button" >Homepage</button>
        <script type="text/javascript">
            document.getElementById("homepageButton").onclick = function () {
                location.href = "index.php";
            };
        </script>
		
		<form id="formSearchOrder" onsubmit="event.preventDefault(); getOrderDetails();" method="post">
			<h1>Search order</h1>
			<input type="text" name="id_comanda" id="id_comanda" placeholder="Order ID">
			<button id="submitDetailsOrder">Get Order Details</button>
		</form>
		<div id="orderDetails"></div>
	</body>
</html>