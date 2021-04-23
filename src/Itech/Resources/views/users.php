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
        <h1>Liste des utilisateurs</h1>
        <div class="card">
           <table>
            <thead>
                <tr>
                    <td>Nom</td><td>Prénom</td><td>email</td><td>actions</td>
                </tr>
            </thead>
            <tbody>
            <?php if(isset($data['users'])):?>
             <?php foreach ($data['users'] as $user): ?>
               <tr>
                 <td ><?= $user['firstName'] ?></td>
                 <td ><?= $user['lastName'] ?></td>
                 <td ><?= $user['email'] ?></td>
                 <td >
                  <span class="d-inline">
                  <form class="d-inline" action="/users/update" method="post">
                     <input type="hidden" class="form-control" id="id" name="Itech[User][id]" value=<?= $user['id'] ?>>
                     <button class="btn btn-primary" type="submit">Modifier</button>
                   </form>
                  </span>
                  <span class="d-inline">
                  <form class="d-inline" action="/users/delete" method="post">
                     <input type="hidden" class="form-control" id="id" name="Itech[User][id]" value=<?= $user['id'] ?>>
                     <button class="btn btn-danger" type="submit">Supprimer</button>
                   </form>
                  </span>
                   
             </td>
             </tr>
             <?php endforeach; ?>
            <?php else: ?>
                <tr class="list-group-item">
                 <td>Pas d'utilisateurs </td>
            </tr>
            <?php endif; ?>
            </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>