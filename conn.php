<?php

$conn = new mysqli('localhost', 'root', '', 'block8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
