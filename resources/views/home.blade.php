<html>
  <p>You are logged in as {{ $name }}.</p>
  <a href="/logout">Logout</a>
  <a href="/user-settings">Settings</a>

  <ul>
  @foreach ($boards as $board)
    <li>
      <a href="/boards/{{ $board->id }}"> {{ $board->name }} </a>
    </li>
  @endforeach
  <ul>
</html>
