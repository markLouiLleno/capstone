<?php
include 'assets/php/functions.php';

$rated_user = $_POST['rated_user'];
$sql = "SELECT AVG(rating) AS avg_rating FROM ratings WHERE rated_user = $rated_user";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avg_rating = $row['avg_rating'];
} else {
    $avg_rating = 0;
}

function displayStarRatings($rating) {
    $whole = floor($rating);
    $fraction = $rating - $whole;
    $stars = "";

    // Whole stars
    for ($i = 0; $i < $whole; $i++) {
        $stars .= "<span class='stared'>&#9733;</span>";
    }

    // Half star
    if ($fraction >= 0.5) {
        $stars .= "<span class='stared'>&#9733;</span>";
        $whole++;
    }

    // Empty stars (to make 5 stars total)
    for ($i = $whole; $i < 5; $i++) {
        $stars .= "<span class='stared'>&#9734;</span>";
    }

    return $stars;
}

echo displayStarRatings($avg_rating);
?>
