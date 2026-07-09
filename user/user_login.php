<?php

session_start();

include '../config/koneksi.php';

if(isset($_POST['login'])){

    $username = mysqli_real_escape_string(
        $conn,
        $_POST['username']
    );

    $password = $_POST['password'];

    $query = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE username='$username'"
    );

    $user = mysqli_fetch_assoc($query);

    if(
        $user &&
        password_verify(
            $password,
            $user['password']
        )
    ){

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header("Location: ../index.php");
        exit;

    }else{

        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login User</title>

    <link rel="stylesheet"
    href="../assets/css/style.css">

</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <h2>Login Akun</h2>

        <p class="auth-subtitle">
            Masuk untuk mulai berbelanja
        </p>

        <?php
        if(isset($error)){
            echo "
            <div style='
            background:#fee2e2;
            color:#b91c1c;
            padding:12px;
            border-radius:10px;
            margin-bottom:15px;
            '>
            $error
            </div>
            ";
        }
        ?>

        <form method="POST">

            <input
            type="text"
            name="username"
            placeholder="Username"
            required>

            <input
            type="password"
            name="password"
            placeholder="Password"
            required>

            <button
            type="submit"
            name="login"
            class="btn auth-btn">
                Login
            </button>

        </form>

        <p class="auth-link">

            Belum punya akun?

            <a href="register.php">
                Daftar Sekarang
            </a>

        </p>

        <br>

        <a href="../index.php"
        class="btn btn-back">

            Kembali ke Home

        </a>

    </div>

</div>

</body>
</html>