<!DOCTYPE html lang = "en">
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<script src="code.js"></script>
		<script src="searchCommand.js"></script>
		<title>Firma curierat - BD</title>
	</head>
	<body>
		<button id="homepageButton" class="float-left homeButton" >Pagina principală</button>
        <script type="text/javascript">
            document.getElementById("homepageButton").onclick = function () {
                location.href = "index.php";
            };		
        </script>

		<div class = "add_order">
            <form id="formSignup" action="includes/addOrder.php" method="post">
				<h1>Plasează o comandă</h1>
				<input type = "text"     name = "nume" placeholder="Nume complet">
				<input type = "tel"      name = "produse"    placeholder="Produse" />
				<input type = "E-Mail" name = "adresalivrare"    placeholder="Adresa de livrare" />
				<button id="submitAdd" class ="submitAddClass">Add</button>
			</form>
		</div>
	</body>
</html>