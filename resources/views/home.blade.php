<html>
  <head>
    <title>Lucy - Home</title>
      @include('layouts.includes.header')
      <link rel="stylesheet" href="@if(session('isDark')) /css/home-dark.css @else /css/home.css @endif " />
  </head>
  <body>
  @include('layouts.includes.darkThemeToggle')


  <p class="home-welcome-title">Welcome, {{ $name }}.</p>
  <ul class="home-bar">
    <li><a href="/logout">Logout</a></li>
     <li><a href="/user-settings">Settings</a></li>
  </ul>

    <form action="/boards" method="POST">
      @csrf
      <button class="home-create-board-button" type="submit">Create Board</button>
    </form>
    <ul class="home-boards">
    @foreach ($boards as $board)
      <li class="home-board">
        <a href="/boards/{{ $board->id }}"> {{ $board->name }} </a>
          <button onclick="document.getElementById('modal-{{ $board->id }}').style.display='block'"> Edit </button>

          <form action="/boards/{{ $board->id }}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit">Delete</button>
        </form>
        <div id="modal-{{ $board->id }}" style="display: none;">
          <button onclick="document.getElementById('modal-{{ $board->id }}').style.display='none'">Close &times;</button>
          <form action="/boards/{{$board->id}}" method="POST">
            @method('PUT')
            @CSRF
            <label> Board Name: </label><input class="home-board-input" type="text" name="name" value="{{$board->name}}" />
            <label> Board Height: </label><input class="home-board-input" type="number" min="1" max="10" name="height" value="{{$board->height}}" />
            <label> Board Width: </label><input class="home-board-input" type="number" min="1" max="10" name="width" value="{{$board->width}}" />
            <button type="submit">Save</button>
          </form>
        </div>
      </li>
    @endforeach
    <ul>
  </body>
</html>
