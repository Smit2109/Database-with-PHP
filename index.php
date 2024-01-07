<!DOCTYPE html lang = "en">
<html>
	<head>
		<link rel="stylesheet" href="styles.css">
		<script src="code.js"></script>
		<script src="searchCommand.js"></script>
		<title>Firma curierat - BD</title>
	</head>
	<body>
        <div class = "indexPage">
            <button id="orderPageButton" class="float-left modifyOrderButton" >Opțiuni comandă</button>
            <script type="text/javascript">
                document.getElementById("orderPageButton").onclick = function () {
                    location.href = "order_modify.php";
                };
            </script>

            <button id="modifyPageButton" class="float-left modifyButton" >Opțiuni cont client</button>
            <script type="text/javascript">
                document.getElementById("modifyPageButton").onclick = function () {
                    location.href = "client_modify.php";
                };
            </script>

            <button id="topPageButton" class="float-left topButton">Topul clienților</button>
            <script type="text/javascript">
                document.getElementById("topPageButton").onclick = function () {
                    location.href = "top_page.php";
                };
            </script>

            <button id="upcomingOrderPageButton" class="float-left upcomingOrderButton" >Comenzi care urmeaza sa fie livrate</button>
            <script type="text/javascript">
                document.getElementById("upcomingOrderPageButton").onclick = function () {
                    location.href = "order_upcoming.php";
                };
            </script>

            <button id="higherOrderPageButton" class="float-left higherOrderButton" >Comenzi care valoreaza mai mult decat o valoare aleasa</button>
            <script type="text/javascript">
                document.getElementById("higherOrderPageButton").onclick = function () {
                    location.href = "order_higher.php";
                };
            </script>

            <button id="carsOrderPageButton" class="float-left carsOrderButton" >Numărul de comenzi livrate de fiecare mașină</button>
            <script type="text/javascript">
                document.getElementById("carsOrderPageButton").onclick = function () {
                    location.href = "cars_orders.php";
                };
            </script>
        </div>
	</body>
</html>