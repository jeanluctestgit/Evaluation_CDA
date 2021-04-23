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
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body class="">

<div class="container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="\">Home</a>
    <div class="float-right">
      
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
    <a  class="nav-link" href="\products">Products</a>
      </li>
      <li class="nav-item">
    <a  class="nav-link" href="\profile">Profile</a>
      </li>
      <?php if($_SESSION['security']['isAdmin']): ?>
      <li class="nav-item">
    <a  class="nav-link" href="\users">Gestion Utilisateurs</a>
      </li>
    <?php endif; ?>
      <li class="nav-item">
    <a  class="nav-link" href="\logout">Logout</a>
      </li>
    </ul>  
    </div>
    
  </div>
</nav>
    <div class="row">
        <div>
        <form action="/users/update_user" method="post">
        <div class="mb-3">
                    
                <input type="hidden" class="form-control" id="id" name="Itech[User][id]" value=<?= $data['user']['id'] ?> placeholder="John">
                </div>
                <div class="mb-3">
                    <label for="firstName" class="form-label">First name</label>
                    <input type="text" class="form-control" id="firstName" name="Itech[User][firstName]" value=<?= $data['user']['firstName'] ?> placeholder="John">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="lastName" name="Itech[User][lastName]" value=<?= $data['user']['lastName'] ?> placeholder="Doe">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="Itech[User][email]" value=<?= $data['user']['email'] ?> placeholder="john@doe.con">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" id="role" name="Itech[User][role_id]">
                      <?php foreach ($data['roles'] as $role) : ?>
                        <option 
                                <?php if($data['user']['role_id'] === $role['id']) : ?>
                                  <?php echo ' selected="selected" ' ?>
                                <?php endif; ?>
                                value = <?= $role['id'] ?>>
                                <?= $role['role'] ?>
                        </option>
                      <?php endforeach; ?>
                     </select>
                </div>
                
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>