<html>

  <body>
  <center>
    <form action="/login" method="POST">
      @csrf

      @error('email')
      <div>{{ $message }}</div>
      @enderror
      
      <h1><input type="text" name="email" placeholder="Email" /></h1>
      <h1><input type="password" name="password" placeholder="Password" /></h1>
      <h1><button type="submit">Submit</button></h1>
    </form>
  </center>
  </body>
</html>
