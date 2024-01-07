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
			<form id="formDeleteOrder" action="includes/deleteOrder.php" method="post">
				<h1>Șterge comanda</h1>
				<input type = "text"     name = "username" placeholder="Nume complet">
                <input type = "text"     name = "AWB" placeholder="AWB-ul comenzii">
				<button id="submitDeleteOrder" class = "submitDeleteClassOrder">Șterge comanda</button>
			</form>
		</div>
	</body>
</html>