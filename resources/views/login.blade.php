<html>

  <body style = "background-color:lightslategray">
  <h1 style="padding: 20px"><button style = "width: 200px; height: 100px; background-color:lightgoldenrodyellow;"> <font size = "+2">Previous Screen</font></button></h1>
  <center>
    <form action="/login" method="POST">
      @csrf

      @error('email')
      <div>{{ $message }}</div>
      @enderror
      
      <h1><input type="text" name="email" placeholder="Email Address"  style="background-color:lightgoldenrodyellow; width: 400px; height: 50px;"/></h1>
      <h1><input type="password" name="password" placeholder="Password" style="background-color:lightgoldenrodyellow; width: 400px; height: 50px;"/></h1>
      <h1><button type="submit" style="width: 200px; height: 50px;background-color:lightgoldenrodyellow;"> <font size = "+2">Log in </font></button></h1>
    </form>
  </center>
  </body>
</html>
