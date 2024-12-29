<?php
if (isset($_POST['phpCode'])) {
    // Capture the PHP code from the frontend
    $phpCode = $_POST['phpCode'];

    // Save the PHP code to a temporary file
    $file = 'temp.php';
    file_put_contents($file, $phpCode);

    // Execute the PHP code and capture the output
    ob_start();
    include($file);
    $output = ob_get_clean();

    // Return the output to the frontend
    echo $output;

    // Optionally delete the temporary PHP file
    unlink($file);
}
?>
