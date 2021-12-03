<html>

  <form action="/login" method="POST">
    @csrf

    @error('email')
    <div>{{ $message }}</div>
    @enderror

    <input type="text" name="email" placeholder="Email" />
    <input type="password" name="password" placeholder="Password" />
    <button type="submit">Submit</button>
  </form>
</html>
