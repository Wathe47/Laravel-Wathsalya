<?php
require_once 'Database.php';
require_once 'Inventory.php';

// Create database connection
$dbObj = new Database();

// Create student object
$inventoryObj = new Inventoy($dbObj->conn);

// Fetch students
$allItems = $inventoryObj->getAllItems();

// Display data
foreach ($allItems as $item) {
    echo "Name: " . $item['name'] . ", Manufacturer Email: " . $item['manufacturer_email'] . "\n";
}
?>
