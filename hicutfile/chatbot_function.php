<?php
include 'assets/php/functions.php'; // Assuming this file contains your database connection setup

// Check if the 'value' parameter is set in the GET request
if (isset($_GET['value'])) {
    $value = $_GET['value'];

    // Check if the database connection is successful before proceeding
    if ($db) {
        // Prepare the SQL statement with named placeholder
        $sql = "SELECT *, u.id, u.username, SUM(r.rating) as total_rating 
                FROM ratings AS r 
                INNER JOIN users AS u ON u.id = r.rated_user 
                WHERE u.profession = ?
                GROUP BY u.id 
                ORDER BY total_rating DESC 
                LIMIT 3";

        // Prepare and execute the statement
        $stmt = $db->prepare($sql);
        $stmt->bind_param('s', $value); // Use bind_param for named placeholders
        $stmt->execute();

        // Fetch the result set
        $result = $stmt->get_result();

        // Check if there are rows in the result set
        if ($result->num_rows > 0) {
            echo "We recommend these photographers that you can hire:<br>";

            // Fetch rows from the result set
            while ($row = $result->fetch_assoc()) {
                ?>
                <a href="myinfo.php?user_id=<?php echo htmlspecialchars($row['id']); ?>" class="d-flex align-items-center column-gap-2 mb-1 border border-secondary-subtle p-1 rounded-2 text-decoration-none text-dark" role="button">
                    <img src="upload/profile.png" width="30" height="30" alt="Profile Picture">
                    <strong><?php echo htmlspecialchars($row['first_name'] . " " . $row['last_name']); ?></strong>
                </a>
                <?php
            }
        } else {
            echo "Sorry, there are no freelancers available for the job you are looking for.";
        }

        // Close the prepared statement and result set
        $stmt->close();
        $result->close();
    } else {
        echo "Database connection error.";
    }
} else {
    echo "Value parameter is missing.";
}
?>
