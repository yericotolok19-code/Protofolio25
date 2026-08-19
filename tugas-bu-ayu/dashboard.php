<?php

session_start();

/*
|--------------------------------------------------------------------------
| CEK LOGIN
|--------------------------------------------------------------------------
*/

if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
    header("Location: login.php");
    exit;
}


/*
|--------------------------------------------------------------------------
| AMBIL DATA USER
|--------------------------------------------------------------------------
*/

$username = htmlspecialchars($_SESSION["username"]);
$email = htmlspecialchars($_SESSION["email"]);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard</title>

    <style>

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f5f7;
            color: #222;
        }

        header {
            background: #16213E;
            color: #F5F1E8;
            padding: 16px 32px;

            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            font-size: 18px;
            margin: 0;
        }

        .logout-btn {
            background: #C9A227;
            color: #16213E;

            border: none;

            padding: 8px 16px;

            border-radius: 6px;

            font-weight: bold;

            text-decoration: none;

            font-size: 13px;
        }

        main {
            max-width: 800px;

            margin: 40px auto;

            background: #fff;

            padding: 32px;

            border-radius: 10px;

            box-shadow:
                0 2px 10px rgba(0,0,0,0.06);
        }

        main h2 {
            margin-top: 0;
        }

        main p {
            color: #555;
            line-height: 1.6;
        }

    </style>

</head>


<body>


<header>

    <h1>Dashboard</h1>

    <a
        href="logout.php"
        class="logout-btn"
    >
        Keluar
    </a>

</header>


<main>

    <h2>
        Halo, <?php echo $username; ?> 👋
    </h2>

    <p>
        Selamat datang!
        Kamu berhasil login dan halaman ini hanya bisa
        dilihat oleh user yang sudah login.
    </p>

    <p>
        Email kamu:
        <strong><?php echo $email; ?></strong>
    </p>

</main>


</body>

</html>