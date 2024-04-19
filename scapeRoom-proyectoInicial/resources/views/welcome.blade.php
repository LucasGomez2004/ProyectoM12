<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}" type="text/css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>

        </style>
    </head>
    <body>
    <div class="container">
      <!-- <div class="menu-icon">
        <img src="images/logo.png" style="width: 750px;" alt="Logo" class="menu-logo">
        <div class="lines">
          <div class="line line-1"></div>
          <div class="line line-2"></div>
        </div>
        <span class="menu">Menu</span>
        <span class="close">Close</span>
      </div> -->
      <!-- <nav class="navigation">
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Content</a>
        <a href="#">Tutorials</a>
        <a href="#">Contact</a>
      </nav> -->
      <div class="landing">
        <div class="landing-left">
          <h1 class="main-heading main-heading-left">ESCAPE</h1>
          <div class="about">
            <h1>Conseguiras descifrarlo?</h1>
            <!-- <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste
              officiis nihil tenetur, doloremque eius libero.
            </p> -->
            <!-- <div class="link">
              <a href="#">Learn More</a>
              <i class="fa-solid fa-arrow-right"></i>
            </div> -->
          </div>
        </div>
        <div class="landing-right">
          <div class="social-media">
            <!-- <i class="fa-brands fa-facebook-f"></i>
            <i class="fa-brands fa-twitter"></i>
            <i class="fa-brands fa-linkedin-in"></i> -->
            <a href="{{ route('login') }}" class="login-btn">Login</a>
            <a href="{{ route('register') }}" class="register-btn">Registrarse</a>
            

          </div>
          <h1 class="main-heading main-heading-right">&nbspOR DIE</h1>
          <!-- <div class="techs">
            <h1>HTML</h1>
            <h1>CSS</h1>
            <h1>JavaScript</h1>
          </div> -->
          <div class="landing-right-bg"></div>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/welcome.js') }}"></script>
  </body>
</html>