<?php
session_start();

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: dashboard.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Login</title>

    <link rel="stylesheet" href="styles.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet"
    />

    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,1,0"
    />

    <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
    />

    <script src="https://unpkg.com/akar-icons-fonts"></script>
</head>

<body>

    <div class="card">

        <ul class="card-nav">

            <li>
                <img src="logo.svg" />
                <span class="active-bar"></span>
            </li>

            <li>
                <button
                    type="button"
                    class="signin active"
                    onclick="selectView('signin')"
                >
                    <i class="ai-person-check"></i>
                    <span>Sign In</span>
                </button>
            </li>

            <li>
                <button
                    type="button"
                    class="signup"
                    onclick="selectView('signup')"
                >
                    <i class="ai-person-add"></i>
                    <span>Sign Up</span>
                </button>
            </li>

        </ul>


        <div class="card-hero">

            <div class="card-hero-inner">

                <div class="card-hero-content signin">

                    <div>
                        <h2>Welcome Back.</h2>
                        <h3>Please enter your credentials.</h3>
                    </div>

                    <img src="signin.svg" />

                </div>


                <div class="card-hero-content signup">

                    <div>
                        <h2>Sign Up Now.</h2>
                        <h3>Join the crowd and get started.</h3>
                    </div>

                    <img src="signup.svg" />

                </div>

            </div>

        </div>


        <div class="card-form">

            <div class="forms">


                <!-- ========================= -->
                <!-- FORM LOGIN -->
                <!-- ========================= -->

                <form
                    id="signin"
                    class="active"
                    action="proses_login.php"
                    method="POST"
                >

                    <p>
                        Don't have an account?
                        <a href="#" onclick="selectView('signup'); return false;">
                            Sign Up
                        </a>.
                    </p>


                    <label>Email</label>

                    <div class="control">

                        <input
                            type="email"
                            name="email"
                            autocomplete="off"
                            placeholder="youremail@gmail.com"
                            required
                        />

                        <i class="ai-envelope"></i>

                    </div>


                    <label>Password</label>

                    <div class="control">

                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            required
                        />

                        <i class="ai-lock-on"></i>

                    </div>


                    <p class="footer">
                        By clicking Sign In you agree to our terms and conditions,
                        privacy policy and reusability rules.
                    </p>


                    <button type="submit">
                        Sign In
                    </button>

                </form>



                <!-- ========================= -->
                <!-- FORM REGISTER -->
                <!-- ========================= -->

                <form
                    id="signup"
                    action="proses_register.php"
                    method="POST"
                >

                    <p>
                        Already have an account?
                        <a href="#" onclick="selectView('signin'); return false;">
                            Sign In
                        </a>.
                    </p>


                    <label>Username</label>

                    <div class="control">

                        <input
                            type="text"
                            name="username"
                            placeholder="myusername"
                            required
                        />

                        <i class="ai-person"></i>

                    </div>


                    <label>Email</label>

                    <div class="control">

                        <input
                            type="email"
                            name="email"
                            autocomplete="off"
                            placeholder="youremail@gmail.com"
                            required
                        />

                        <i class="ai-envelope"></i>

                    </div>


                    <label>Password</label>

                    <div class="control">

                        <input
                            type="password"
                            name="password"
                            placeholder="Password"
                            required
                        />

                        <i class="ai-lock-on"></i>

                    </div>


                    <button type="submit">
                        Sign Up
                    </button>

                </form>

            </div>

        </div>

    </div>

    <?php if (isset($_GET['success'])): ?>

    <?php if ($_GET['success'] == 'login'): ?>

        <div class="popup success">
            <div class="popup-icon">✓</div>

            <div>
                <strong>Berhasil Login!</strong>
                <p>Selamat datang kembali.</p>
            </div>
        </div>

        <script>
            setTimeout(function() {
                window.location.href = "dashboard.php";
            }, 1500);
        </script>

    <?php elseif ($_GET['success'] == 'register'): ?>

        <div class="popup success">
            <div class="popup-icon">✓</div>

            <div>
                <strong>Registrasi Berhasil!</strong>
                <p>Akun kamu berhasil dibuat.</p>
            </div>
        </div>

        <script>
            setTimeout(function() {
                window.location.href = "login.php";
            }, 2000);
        </script>

    <?php endif; ?>

<?php endif; ?>


<?php if (isset($_GET['error'])): ?>

    <?php if ($_GET['error'] == 'email'): ?>

        <div class="popup error">
            <div class="popup-icon">!</div>

            <div>
                <strong>Email Tidak Ditemukan</strong>
                <p>Silakan periksa kembali email kamu.</p>
            </div>
        </div>

    <?php elseif ($_GET['error'] == 'password'): ?>

        <div class="popup error">
            <div class="popup-icon">!</div>

            <div>
                <strong>Password Salah</strong>
                <p>Silakan periksa kembali password kamu.</p>
            </div>
        </div>

    <?php elseif ($_GET['error'] == 'registered'): ?>

        <div class="popup error">
            <div class="popup-icon">!</div>

            <div>
                <strong>Email Sudah Terdaftar</strong>
                <p>Gunakan email lain.</p>
            </div>
        </div>

    <?php elseif ($_GET['error'] == 'register'): ?>

        <div class="popup error">
            <div class="popup-icon">!</div>

            <div>
                <strong>Registrasi Gagal</strong>
                <p>Terjadi kesalahan saat membuat akun.</p>
            </div>
        </div>

    <?php endif; ?>

<?php endif; ?>


    <script src="main.js"></script>

</body>

</html>