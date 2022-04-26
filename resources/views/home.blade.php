<html>

<head>
  <title>Lucy - Home</title>
  @include('layouts.includes.header')
  <link rel="stylesheet" href="@if(session('isDark')) /css/home-dark.css @else /css/home.css @endif " />
  <div class="transition transition-2 is-active"></div>
  <script src="/js/view-transitions.js"></script>
</head>

<body>
  @include('layouts.includes.darkThemeToggle')


  <p class="home-welcome-title">Welcome, {{ $name }}.</p>
  <ul class="home-bar">
    <li><button onclick="window.location = '/logout' ">Logout</button></li>
    <li><button onclick="window.location = '/user-settings?/home' ">Settings</button></li>
  </ul>

  <form action="/boards" method="POST">
    @csrf
    <button class="home-create-board-button" type="submit">Create Board</button>
  </form>
  <ul class="home-boards">

    @foreach ($boards as $board)
    <li class="home-board board-separator">
      <div style="display: flex; flex-grow: 1;">
        <a class="home-board-link" href="/boards/{{ $board->id }}"> {{ $board->name }} </a>
      </div>
      <div>
        <form action="/boards/{{ $board->id }}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit">Delete</button>
        </form>
        <button onclick="document.getElementById('modal-{{ $board->id }}').style.display='block'"> Edit </button>
        <button style="margin-top: 20px;">
          <a class="export-link" style="border: none;"href="/boards/{{ $board->id }}/export" download>Export</a>
        </button>
      </div>

      <div id="modal-{{ $board->id }}" style="display: none;">
        <form action="/boards/{{$board->id}}" method="POST">
          @method('PUT')
          @CSRF
          <label style="white-space: nowrap;"> Board Name: </label><input class="home-board-input" type="text" name="name" value="{{$board->name}}" />
          <label style="white-space: nowrap;"> Board Height: </label><input class="home-board-input" type="number" min="1" max="10" name="height" value="{{$board->height}}" />
          <label style="white-space: nowrap;"> Board Width: </label><input class="home-board-input" type="number" min="1" max="10" name="width" value="{{$board->width}}" />
          <button class="home-board-edit" onclick="document.getElementById('modal-{{ $board->id }}').style.display='none'">Close &times;</button>

          <button class="home-board-edit" type="submit">Save</button>
        </form>
      </div>
    </li>
    @endforeach
    <ul>
</body>

</html>
