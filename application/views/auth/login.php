<!DOCTYPE html>
<html>
<head>
    <title>Login Nusa Auto</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <b>Nusa Auto</b>
    </div>

    <div class="card">
        <div class="card-body login-card-body">

            <p class="login-box-msg">Silakan login</p>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('index.php/auth/login') ?>" method="post">

                <div class="input-group mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Login
                </button>

            </form>

        </div>
    </div>
</div>

</body>
</html>