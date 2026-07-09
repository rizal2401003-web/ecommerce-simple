<?php

include '../config/koneksi.php';

if(isset($_POST['daftar'])){

    $username = mysqli_real_escape_string(
        $conn,
        $_POST['username']
    );

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    // Cek username sudah ada atau belum
    $cek = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE username='$username'"
    );

    if(mysqli_num_rows($cek) > 0){

        $error = "Username sudah digunakan!";

    }else{

        mysqli_query(
            $conn,
            "INSERT INTO users
            (username,email,password)
            VALUES
            ('$username','$email','$password')"
        );

        header("Location:user_login.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Daftar Akun</title>

    <link rel="stylesheet"
    href="../assets/css/style.css">

</head>

<body>

<div class="auth-container">

    <div class="auth-card">

        <h2>Daftar Akun</h2>

        <p class="auth-subtitle">
            Buat akun untuk mulai berbelanja
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
            type="email"
            name="email"
            placeholder="Email"
            required>

            <input
            type="password"
            name="password"
            placeholder="Password"
            required>

            <button
            type="submit"
            name="daftar"
            class="btn auth-btn">
                Daftar
            </button>

        </form>

        <p class="auth-link">

            Sudah punya akun?

            <a href="user_login.php">
                Login
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