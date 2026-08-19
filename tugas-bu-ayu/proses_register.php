<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Cek email
    $cek = mysqli_prepare(
        $conn,
        "SELECT id FROM users WHERE email = ?"
    );

    mysqli_stmt_bind_param($cek, "s", $email);
    mysqli_stmt_execute($cek);
    mysqli_stmt_store_result($cek);

    // Email sudah digunakan
    if (mysqli_stmt_num_rows($cek) > 0) {

        header("Location: login.php?error=registered");
        exit;
    }

    // Hash password
    $password_hash = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    // Masukkan data
    $query = mysqli_prepare(
        $conn,
        "INSERT INTO users (username, email, password)
         VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $query,
        "sss",
        $username,
        $email,
        $password_hash
    );

    if (mysqli_stmt_execute($query)) {

        header("Location: login.php?success=register");
        exit;

    } else {

        header("Location: login.php?error=register");
        exit;
    }
}

?>