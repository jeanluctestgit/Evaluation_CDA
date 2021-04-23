<?php
/**
 * Created by iKNSA.
 * User: Khalid Sookia <khalidsookia@gmail.com>
 * Date: 20/04/2021
 * Time: 09:58
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style>
       .container {
    width: 500px;
    height: auto;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: inline-flex;
}
    </style>

</head>
<body class="">

<div class="container card">
    <div class="card-header">
        <h1>Register</h1>
    </div>
    <div class="row">
        <div>
            <form action="/register" method="post">
                <div class="mb-3">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" name="Itech[User][firstName]" placeholder="John">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="Itech[User][lastName]" placeholder="Doe">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="Itech[User][email]" placeholder="john@doe.con">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="Itech[User][password]" placeholder="Paris">
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Sign up</button>
                    <a href="\login">Login</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>

