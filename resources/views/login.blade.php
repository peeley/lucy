<html>
<head>
  <title>Log in</title>
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="/css/view-transitions.css">
</head>
<body>
  <div class="transition transition-2 is-active"></div>
  
  <h1 style="padding: 20px">
  <form>
    <button class="back-button" formaction="/">Back</button>
  </form>
  
  </h1>
  <center>
    <form action="/login" method="POST">
      @csrf

      @error('email')
      <div>{{ $message }}</div>
      @enderror

      <h1><input class="credentials-input" type="text" name="email" placeholder="Email Address" /></h1>
      <h1><input class="credentials-input" type="password" name="password" placeholder="Password" /></h1>
      <h1><button class="credentials-button" type="submit">
          <font size="+2">Log in </font>
        </button></h1>
    </form>
  </center>
  <script src="/js/view-transitions.js"></script>
</body>

</html>
