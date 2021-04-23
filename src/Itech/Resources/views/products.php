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
        <form action="/products/add" method="post">
                <div class="mb-3">
                    <label for="titre" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="titre" name="Itech[Product][titre]"  placeholder="Jeans">
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="text" class="form-control" id="lastName" name="Itech[Product][prix]"  placeholder="65.0">
                </div>
                
                <div class="mb-3">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </div>
            </form>
        </div>

    </div>

    <div class="row">
        <h1>Liste des produits</h1>
        <div class="card">
           <ul class="list-group">
            <?php if(isset($data['products'])):?>
             <?php foreach ($data['products'] as $product): ?>
               <li class="list-group-item">
                 <span class="d-flex justify-content-start"><?= $product['titre'] ?></span>
                 <span class="d-flex justify-content-end"><?= $product['prix'] ?></span>
                 <span class="d-flex justify-content-end">
                   <form  action="/products/update" method="post">
                     <input type="hidden" class="form-control" id="id" name="Itech[Product][id]" value=<?= $product['id'] ?>>
                     <button class="btn btn-primary" type="submit">Modifier</button>
                   </form>
                   <form  action="/products/delete" method="post">
                     <input type="hidden" class="form-control" id="id" name="Itech[Product][id]" value=<?= $product['id'] ?>>
                     <button class="btn btn-danger" type="submit">Supprimer</button>
                   </form>
                 </span>
               </li>
             <?php endforeach; ?>
            <?php else: ?>
                <li class="list-group-item">
                 Pas de produits
               </li>
            <?php endif; ?>
           </ul>
        </div>
    </div>
</div>

</body>
</html>