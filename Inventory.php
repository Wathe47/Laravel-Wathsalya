<?php
class Inventoy {
    private $db;

    // Accept database object from outside
    public function __construct($db) {
        $this->db = $db;
    }

    // Method to fetch all students
    public function getAllItems() {
        $query = "SELECT * FROM inventory";
        $result = $this->db->query($query);

        $inventory = [];

        while ($row = $result->fetch_assoc()) {
            $inventory[] = $row;
        }

        return $inventory;
    }
}
?>
