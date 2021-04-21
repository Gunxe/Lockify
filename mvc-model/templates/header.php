<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" >
    <?php
      echo ((isset($style) && $style == 'default') ? '<link rel="stylesheet" href="/css/start_page.css" >' : '');
    ?>
    <script src="/js/passwort.js"></script>
    

    <title><?= $title; ?> | Lockify</title>
  </head>
  <body>

    <header>
      <nav class="">
        <ul class="nav justify-content-center">
          <li class="nav-item">
            <a class="nav-link active" href="/"><span class="logo blue">&lt;/&gt;</span><span class="logo2 red">Lockify</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Function</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Passwort</a>
          </li>
          <li class="nav-item justify-content-end">
          <?php
          echo ((isset($login) && $login) ? '<a class="nav-link" href="/login/logout"><span class="login">Logout</span></a>' : '<a class="nav-link" href="/login"><span class="login">Login</span></a>');
          ?>
          </li>
        </ul>
      </nav>
    </header>

    <main class="container">

