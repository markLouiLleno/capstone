<?php

include '../assets/php/functions.php';

$search_query = isset($_POST['search_query']) ? $_POST['search_query'] : '';

if (!empty($search_query)) {
    // Prepare the SQL query to search for users
    $sql = "SELECT id, first_name, last_name, profession FROM users WHERE first_name LIKE ? OR last_name LIKE ? OR profession LIKE ?";

    $stmt = $db->prepare($sql);

    // Use wildcard characters for the search
    $like_search_query = '%' . $search_query . '%';

    // Bind the parameters
    $stmt->bind_param('sss', $like_search_query, $like_search_query, $like_search_query);

    // Execute the query
    $stmt->execute();

    // Get the result set
    $result = $stmt->get_result();

    // Check if any results were returned
    if ($result->num_rows > 0) {
        echo "<ul class='search-output shadow-sm bg-white p-0'>";
        while ($row = $result->fetch_assoc()) {
            $profession = !empty($row['profession']) ? " - " . htmlspecialchars($row['profession']) : '';
            echo "
                 <li class='d-flex' style='list-style: none;'><a  class='w-100 border border-bottom-1 p-2 text-decoration-none text-secondary' href='works.php?user_id=" . htmlspecialchars($row['id']) . "'>" . htmlspecialchars($row['first_name']) . " " . htmlspecialchars($row['last_name']) . $profession . "</a></li>
                 ";
        }
        echo "</ul>";
    } else {
        echo"
            <ul class='search-output shadow-sm bg-white'>
                <li>No results found.</li>
            </ul>
            ";
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$db->close();
?>
