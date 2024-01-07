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
		<div class ="generalClass">
			<button id="modifyClients" class="float-left clientsModify" >Modifică datele clienților</button>
			<script type="text/javascript">
				document.getElementById("modifyClients").onclick = function () {
					location.href = "client_modify.php";
				};		
			</script>
		</div>
	</body>
</html>