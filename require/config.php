<?php

$conn = mysqli_connect("localhost", "root", "", "jpams");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}