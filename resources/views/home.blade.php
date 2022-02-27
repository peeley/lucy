<html>
  <p>You are logged in as {{ $name }}.</p>
  <a href="/logout">Logout</a>
  <a href="/user-settings">Settings</a>

  <form action="/boards/create" method="POST">
    @csrf
    <button type="submit">Create Board</button>
  </form>
  <ul>
  @foreach ($boards as $board)
    <li>
      <a href="/boards/{{ $board->id }}"> {{ $board->name }} </a>
      <form action="/boards/{{ $board->id }}/delete" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
      </form>
      <a href="/boards/{{ $board->id }}/edit"> Edit </a>
    </li>
  @endforeach
  <ul>
</html>
