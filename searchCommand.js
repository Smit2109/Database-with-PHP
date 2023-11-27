function getOrderDetails() {
    var orderId = document.getElementById("id_comanda").value;

    // Create a new XMLHttpRequest object
    var xhttp = new XMLHttpRequest();

    // Define the callback function
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Update a specific div with the response text
            document.getElementById("orderDetails").innerHTML = this.responseText;
        }
    };

    // Specify the request method, URL, and set asynchronous to true
    xhttp.open("POST", "includes/searchOrder.inc.php", true);

    // Set the content type for POST requests
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with the order ID as data
    xhttp.send("id_comanda=" + orderId);
}
