<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg,#667eea,#764ba2);
            height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
            font-family: Arial, sans-serif;
        }

        .login-card{
            width:100%;
            max-width:400px;
            padding:35px;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,0.2);
            background:#fff;
        }

        .login-title{
            font-weight:600;
            text-align:center;
            margin-bottom:25px;
        }

        .form-control{
            border-radius:10px;
            padding:10px;
        }

        .btn-login{
            border-radius:10px;
            font-weight:600;
        }

        .logo{
            font-size:28px;
            font-weight:bold;
            text-align:center;
            margin-bottom:10px;
            color:#764ba2;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="logo">🛒 Admin Panel</div>

    <h4 class="login-title">Login to Dashboard</h4>

    <form method="post">

        <input type="email" name="email" class="form-control mb-3" placeholder="Enter Email" required>

        <input type="password" name="password" class="form-control mb-3" placeholder="Enter Password" required>

        <button class="btn btn-primary w-100 btn-login">Login</button>

    </form>

    <?php if(isset($error)) : ?>
        <div class="alert alert-danger mt-3 text-center">
            <?= $error ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>
