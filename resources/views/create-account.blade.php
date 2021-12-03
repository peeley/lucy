<html>
  <h1>Create Your Account</h1>
  <form action="/create-account" method="POST">
    @csrf

    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="name" value="" placeholder="Name"/>

    @error('username')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="username" value="" placeholder="Email"/>

    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="password" name="password" value="" placeholder="Password"/>

    @error('verified_password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="password" name="verified_password" value="" placeholder="Verify Password"/>

    <button type="submit">Create Account</button>
  </form>
</html>
