<!DOCTYPE html lang = "en">
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<script src="code.js"></script>
		<script src="searchCommand.js"></script>
		<title>Firma curierat - BD</title>
	</head>
	<body>
        <button id="modifyPageButton" class="float-left submit-button" >Modify</button>
        <script type="text/javascript">
            document.getElementById("modifyPageButton").onclick = function () {
                location.href = "modify.php";
            };
        </script>

        <button id="searchOrder" class="float-left submit-button" >Search order</button>
        <script type="text/javascript">
            document.getElementById("searchOrder").onclick = function () {
                location.href = "awb_search.php";
            };
        </script>

        <button id="myButton" class="float-left submit-button" >Home</button>
        <button id="myButton" class="float-left submit-button" >Home</button>
	</body>
</html>