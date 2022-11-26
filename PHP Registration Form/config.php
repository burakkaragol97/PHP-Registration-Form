<?php
    session_start();
    $conn = mysqli_connect("localhost", "burak", "1234", "reglog");
    mysqli_set_charset($conn, "utf8");
?>