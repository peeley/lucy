<html>

  @include('layouts.includes.header')
  @include('layouts.includes.darkThemeToggle')
  <link rel="stylesheet" href="/css/board.css"/>

  <div id="root" board_id={{ $board_id }}></div>
  <script src="/js/app.js"></script>

  <link rel="stylesheet" href="/css/view-transitions.css">
  <div class="transition transition-2 is-active"></div>
  <script src="/js/view-transitions.js"></script>
</html>
