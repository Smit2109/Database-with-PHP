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
			<form id="updateOrderForm" action="includes/updateOrder.php" method="post">
				<h1>Modifică comandă</h1>
                <h2>Detaliile comenzii</h2>
				<input type = "text"     name = "username" placeholder="Nume complet">
				<input type = "text"      name = "AWB"    required placeholder="AWB-ul comenzii" />
                <h2>Modificări</h2>
				<input type = "E-Mail" name = "produse"    placeholder="Produse"/>
                <input type = "text" name = "adresa_livrare"    placeholder="Adresa de livrare"/>
				<button id="updateOrder" class = "submitUpdateOrder">Schimbă</button>
            </form>
		</div>
	</body>
</html>