<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $orderDetails = $_POST["order-details"];
    $pickupTime = $_POST["date"];
    $selectedFoods = isset($_POST["foods"]) ? $_POST["foods"] : [];

    // Calculate total price
    $totalPrice = 0;
    foreach ($selectedFoods as $food) {
        // Extract the price from the selected option
        $price = explode(" - ", $food)[1];
        // Remove "P" and convert to an integer
        $totalPrice += intval(substr($price, 1));
    }

    // Display confirmation message
    echo "<h2>Order Confirmation</h2>";
    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Order Details:</strong> $orderDetails</p>";
    echo "<p><strong>Pickup Time:</strong> $pickupTime</p>";
    echo "<p><strong>Selected Foods:</strong></p>";
    echo "<ul>";
    foreach ($selectedFoods as $food) {
        echo "<li>$food</li>";
    }
    echo "</ul>";
    echo "<p><strong>Total Price:</strong> P$totalPrice</p>";
} else {
    // If the form is not submitted, redirect to the form page
    header("Location: your-form-page.php");
    exit();
}
?>
