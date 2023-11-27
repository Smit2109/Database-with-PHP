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

		<button id="buttonSign" onclick="showFormSign()">Add client</button>
		<form id="formSignup" style="display: none;" action="includes/formhandler.inc.php" method="post">
			<h1>Add client</h1>
			<input type = "text"     name = "username" placeholder="Full Name">
			<input type = "tel"      name = "phone"    pattern="[0]{1}[7]{1}[0-9]{2} [0-9]{3} [0-9]{3}" required placeholder="Phone number (07## ### ###)" />
			<input type = "E-Mail" name = "email"    placeholder="E-Mail" />
			<button id="submitAdd">Add</button>
		</form>

		<button id="buttonChange" onclick="showFormChange()">Modify client</button>
		<form id="formChange" style="display: none;" action="includes/userupdate.inc.php" method="post">
			<h1>Modify client</h1>
			<input type = "text"     name = "username" placeholder="Full Name">
			<input type = "tel"      name = "phone"    pattern="[0]{1}[7]{1}[0-9]{2} [0-9]{3} [0-9]{3}" required placeholder="Phone number (07## ### ###)" />
			<input type = "E-Mail" name = "email"    placeholder="E-Mail" />
			<button id="submitChange">Change</button>
		</form>

		<button id="buttonDelete" onclick="showFormDelete()">Delete client</button>
		<form id="formDelete" style="display: none;" action="includes/userdelete.inc.php" method="post">
			<h1>Delete client</h1>
			<input type = "text"     name = "username" placeholder="Full Name">
			<button id="submitDelete">Delete</button>
		</form>
	</body>
</html>