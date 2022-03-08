<html>
<head>
    @include('layouts.includes.header')
    <link rel="stylesheet" href="@if (session('isDark')) /css/login-dark.css @else /css/login.css @endif">
    <title>Log in</title>
</head>
<body>
@include('layouts.includes.darkThemeToggle')

  <div class="transition transition-2 is-active"></div>

  <h1 style="padding: 20px">
  <form>
    <button class="back-button" formaction="/">Back</button>
  </form>

  </h1>

  <div id="login-box">
    <h1>Login</h1>

    <form action="/login" method="POST">
      @csrf

      @error('email')
      <div>{{ $message }}</div>
      @enderror

      <h1><input class="credentials-input" type="text" name="email" placeholder="Email Address" /></h1>
      <h1><input class="credentials-input" type="password" name="password" placeholder="Password" /></h1>
      <center>
        <button class="credentials-button" type="submit"><font size="+2">Log in </font></button>
      </center>
    </form>
  </div>
  <script src="/js/view-transitions.js"></script>
</body>

</html>
