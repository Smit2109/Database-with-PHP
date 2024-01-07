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
            <div class="topPageClassOrders">
            <p>Clientul cu cele mai multe comenzi primite într-un an</p>
                <form id="orderPageForm" action="includes/top_page_order.php" method="post">
                    <select id="orders_Top" name="orders_Top" style="background-color: #b2a67a;";>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option> 
                    </select>
                    <input type="submit" />
                </form>
            </div>
            <div id="topOrders" class="topOrdersShow"></div>

            <div class="topPageClassSpent">
            <p>Clientul care a cheltuit cel mai mult in anul selectat</p>
                <form id="spentPageForm" action="includes/top_page_spent.php" method="post">
                    <select id="spent_Top" name="spent_Top" style="background-color: #b2a67a;";>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option> 
                    </select>
                    <input type="submit" />
                </form>
            </div>
            <div id="topSpent" class="topSpentShow"></div>

            <div class="topPageClassAverage">
            <p>Clientul care a cheltuit peste medie in anul selectat</p>
                <form id="averagePageForm" action="includes/top_page_average.php" method="post">
                    <select id="average_Top" name="average_Top" style="background-color: #b2a67a;";>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option> 
                    </select>
                    <input type="submit" />
                </form>
            </div>
            <div id="topAverage" class="topAverageShow"></div>

            <div class="topPageClassNumber">
            <p>Clientul care are cel putin numarul de comenzi selectat in ultimii ani</p>
                <form id="numberPageForm" action="includes/top_page_number.php" method="post">
                    <select id="number_Top_orders" name="number_Top_orders" style="background-color: #b2a67a;";>
                        <option value="1">1 comandă</option>
                        <option value="2">2 comenzi</option>
                        <option value="3">3 comenzi</option>
                        <option value="4">4 comenzi</option>
                        <option value="5">5 comenzi</option>
                        <option value="6">6 comenzi</option>
                        <option value="7">7 comenzi</option>
                    </select>    
                    <input type="submit" />
                </form>
            </div>
            <div id="topNumber" class="topNumberShow"></div>
		</div>
        <script type="text/javascript">
            //comenzi pe an
            document.getElementById("orderPageForm").addEventListener("submit", function(event) {
                event.preventDefault();
                getOrderDetails();
            });

            function getOrderDetails() {
                var orderId = document.getElementById("orders_Top").value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/top_page_order.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Handle the response here
                        document.getElementById("topOrders").innerHTML = xhr.responseText;
                    }
                };
                xhr.send("orders_Top=" + orderId);
            }

            //cheltuieli pe an
            document.getElementById("spentPageForm").addEventListener("submit", function(event) {
                event.preventDefault();
                getOrderDetails2();
            });

            function getOrderDetails2() {
                var orderId = document.getElementById("spent_Top").value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/top_page_spent.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Handle the response here
                        document.getElementById("topSpent").innerHTML = xhr.responseText;
                    }
                };
                xhr.send("spent_Top=" + orderId);
            }

            //peste medie anual
            document.getElementById("averagePageForm").addEventListener("submit", function(event) {
                event.preventDefault();
                getOrderDetails3();
            });

            function getOrderDetails3() {
                var orderId = document.getElementById("average_Top").value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/top_page_average.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Handle the response here
                        document.getElementById("topAverage").innerHTML = xhr.responseText;
                    }
                };
                xhr.send("average_Top=" + orderId);
            }

            // peste nr de comenzi in ultimii x ani
            document.getElementById("numberPageForm").addEventListener("submit", function(event) {
                event.preventDefault();
                getOrderDetails4();
            });

            function getOrderDetails4() {
                var orderCount = document.getElementById("number_Top_orders").value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "includes/top_page_number.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Handle the response here
                        document.getElementById("topNumber").innerHTML = xhr.responseText;
                    }
                };
                xhr.send("number_Top_orders=" + orderCount);
            }

        </script>
        
	</body>
</html>