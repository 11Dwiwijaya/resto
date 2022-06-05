<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Signin Template · Bootstrap v5.1</title>


    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <img width=100 src="<?= base_url('assets/cafe.png') ?>" alt="">

        <form id="loginform" method="POST" action="<?php echo base_url() ?>login/auth">
            <h1 class="h3 mb-3 fw-normal"></h1>

            <div class="form-floating">
                <input autocomplete="off" type="text" class="form-control" id="username" name="username"
                    placeholder="username" required>
                <label ">Username</label>
    </div>
    <div class=" form-floating mt-2">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Sign in</button>
            <?= $this->session->flashdata('message'); ?>
            <p class="mt-5 mb-3 text-muted">Code by : Dwi Wijaya</p>
        </form>
    </main>

</body>

</html>