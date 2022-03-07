<html>
  <head>
    <title>Lucy - Home</title>
      @include('layouts.includes.header')
  </head>
  <body>
  @include('layouts.includes.darkThemeToggle')
  <p>You are logged in as {{ $name }}.</p>
    <a href="/logout">Logout</a>
    <a href="/user-settings">Settings</a>

    <form action="/boards" method="POST">
      @csrf
      <button type="submit">Create Board</button>
    </form>
    <ul>
    @foreach ($boards as $board)
      <li>
        <a href="/boards/{{ $board->id }}"> {{ $board->name }} </a>
        <form action="/boards/{{ $board->id }}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit">Delete</button>
        </form>
        <button onclick="document.getElementById('modal-{{ $board->id }}').style.display='block'"> Edit </button>
        <div id="modal-{{ $board->id }}" style="display: none;">
          <button onclick="document.getElementById('modal-{{ $board->id }}').style.display='none'">Close &times;</button>
          <form action="/boards/{{$board->id}}" method="POST">
            @method('PUT')
            @CSRF
            <input type="text" name="name" value="{{$board->name}}" />
            <input type="number" min="1" max="10" name="height" value="{{$board->height}}" />
            <input type="number" min="1" max="10" name="width" value="{{$board->width}}" />
            <button type="submit">Save</button>
          </form>
        </div>
      </li>
    @endforeach
    <ul>
  </body>
</html>
