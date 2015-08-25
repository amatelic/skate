<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Skavti bovec1</title>
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <header>
    test, vaja
  </header>
  <main>
    <div id="left">
        <div class="login">
          <label for="email">Email:</label>
          <input type="text" id="email">
          <label for="password">Geslo:</label>
          <input type="password" id="password">
        </div>
        <button id="loginUer">Show</button>
    </div>
    <div id="center">
      @yield('center')
    </div>
    <div id="right">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur a, suscipit eum mollitia at illum ipsum asperiores earum vero quam quas eaque incidunt aliquam odit consequatur, libero beatae explicabo rerum.
    </div>
  </main>
  <div class="scripts">
       @yield('script')
  </div>
</body>
</html>
