<html>
  <p>You are logged in as {{ $name }}.</p>
  <a href="/logout">Logout</a>
  <a href="/user-settings">Settings</a>

  <ul>
  @foreach ($boards as $board)
    <li>
      <a href="/boards/{{ $board->id }}"> {{ $board->name }} </a>
      <a href="/boards/{{ $board->id }}/delete"> Delete </a>
      <a href="/boards/{{ $board->id }}/edit"> Edit </a>
    </li>
  @endforeach
  <ul>
</html>
