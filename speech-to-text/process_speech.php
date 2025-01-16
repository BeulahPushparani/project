<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the text from the form
    $speechText = $_POST['speechText'];
    
    // Process the speech text (you can save it to a database, file, etc.)
    // For example, we'll just display it on the page
    echo "<h2>Speech Text Received:</h2>";
    echo "<p>" . htmlspecialchars($speechText) . "</p>";
} else {
    echo "No speech text received!";
}
?>
