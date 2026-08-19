<?php

session_start();
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $query = mysqli_prepare(
        $conn,
        "SELECT id, username, email, password
         FROM users
         WHERE email = ?"
    );

    mysqli_stmt_bind_param($query, "s", $email);
    mysqli_stmt_execute($query);

    $result = mysqli_stmt_get_result($query);

    // Email tidak ditemukan
    if (mysqli_num_rows($result) == 0) {

        header("Location: login.php?error=email");
        exit;
    }

    $user = mysqli_fetch_assoc($result);

    // Password salah
    if (!password_verify($password, $user["password"])) {

        header("Location: login.php?error=password");
        exit;
    }

    // Login berhasil
    $_SESSION["login"] = true;
    $_SESSION["id"] = $user["id"];
    $_SESSION["username"] = $user["username"];
    $_SESSION["email"] = $user["email"];

    header("Location: login.php?success=login");
    exit;
}

?>