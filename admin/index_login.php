<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <a href="../index.php" class="btn btn-back">
    Kembali ke Home
</a>

<div class="container">

<h2 class="title">Login</h2>

<form action="login.php" method="POST">

    <input type="text"
    name="username"
    placeholder="Username">

    <input type="password"
    name="password"
    placeholder="Password">

    <button type="submit" class="btn">
        Login
    </button>

</form>

</div>

</body>
</html>