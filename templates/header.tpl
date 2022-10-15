<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="inicio">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="artistas">Artistas</a>
        </li>
        {if !isset($smarty.session.user)}
        <li class="nav-item">
          <a class="nav-link" href="login">Login</a>
        </li>
        {else}
        <li class="nav-item">
          <a class="nav-link" href="logout">Logout ({$smarty.session.user})</a>
        </li>
        {/if}
      </ul>
    </div>
  </div>
</nav>