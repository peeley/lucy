<html>
  <head>
      @include('layouts.includes.header')
      <link rel="stylesheet" href="/css/create-account.css">
  </head>
  <body>
    <div class="transition transition-2 is-active"></div>
    <h1 class="general-heading">Create Your Account</h1>
    <h2 style="padding: 20px">
      <form>
        <button class="back-button" formaction="/">Back</button>
      </form>
    </h2>
  @include('layouts.includes.darkThemeToggle')

  <form action="/create-account" method="POST">
      @csrf

      @error('name')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input class="create-account create-account-input" type="text" name="name" value="" placeholder="Name"/><br>

      @error('username')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input class="create-account create-account-input" type="text" name="username" value="" placeholder="Email"/><br>

      @error('password')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <input class="create-account create-account-input" type="password" name="password" value="" placeholder="Password"/><br>

      @error('verified_password')
      <div class="alert alert-danger">{{ $message }}</div><br>
      @enderror
      <input class="create-account-input-button" type="password" name="verified_password" value="" placeholder="Verify Password"/><br>
      <button class="create-account-button" type="submit">Create Account</button>
    </form>
    <script src="/js/view-transitions.js"></script>
  </body>
</html>
