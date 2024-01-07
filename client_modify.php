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
			<button id="buttonSign" onclick="showFormSign()">Adaugă client</button>
			<form id="formSignup" style="display: none;" action="includes/addClient.inc.php" method="post">
				<h1>Adaugă client</h1>
				<input type = "text"     name = "username" placeholder="Nume complet">
				<input type = "tel"      name = "phone"    required placeholder="Numar de telefon" />
				<input type = "E-Mail" name = "email"    placeholder="E-Mail" />
				<button id="submitAdd" class ="submitAddClass">Adaugă</button>
			</form>

			<button id="buttonChange" onclick="showFormChange()">Modifică client</button>
			<form id="formChange" style="display: none;" action="includes/updateClient.inc.php" method="post">
				<h1>Modifică client</h1>
				<input type = "text"     name = "username" placeholder="Nume complet">
				<input type = "tel"      name = "phone"    required placeholder="Noul număr de telefon" />
				<input type = "E-Mail" name = "email"    placeholder="Noul e-mail" />
				<button id="submitChange" class = "submitChangeClass">Schimbă</button>
			</form>

			<button id="buttonDelete" onclick="showFormDelete()">Șterge client</button>
			<form id="formDelete" style="display: none;" action="includes/deleteClient.inc.php" method="post">
				<h1>Șterge client</h1>
				<input type = "text"     name = "username" placeholder="Nume complet">
				<button id="submitDelete" class = "submitDeleteClass">Șterge</button>
			</form>

			<button id="allClientsTable" class="float-left allClientsTable">Caută clienți</button>
                <script type="text/javascript">
                    document.getElementById("allClientsTable").onclick = function () {
                    location.href = "client_search.php";
                };
                </script>
		</div>
	</body>
</html>