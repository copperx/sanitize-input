<?php
    // Part 1: Grab the values from the form and save them
    //         to a file.

    // Create a variable with the name of the file
    $file = 'guestbook.txt';
    // Create a variable that stores the comment submitted
    // (with a newline at the end)
    $comment = $_GET['comment'] . PHP_EOL;
    // Write the line into the file (by appending, not overwriting)
    file_put_contents($file, $comment, FILE_APPEND);
?>
<h1>Thank you for your comment!</h1>
<h2>All users' comments:</h2>
<?php
    $lines = file($file);
    foreach($lines as $line) {
        // VULNERABILITY!!! WE'RE USING $line DIRECTLY!
        echo "<p>" . $line . "</p>";
    }
?>