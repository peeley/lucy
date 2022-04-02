<html>

  @include('layouts.includes.header')
  @include('layouts.includes.darkThemeToggle')
  <link rel="stylesheet" href="/css/board.css"/>

  <div id="root" board_id={{ $board_id }}></div>
  <script src="/js/app.js"></script>
  <div id="guidedPopup1"><h1>Press the word you want to say</h1></div>
  <div id="guidedPopup2"><h1>Press on the sentence bar or the speak button to talk</h1></div>
  <link rel="stylesheet" href="/css/view-transitions.css">
  <link rel="stylesheet" href="/css/guided-use.css">
  <div class="transition transition-2 is-active"></div>
  <script src="/js/view-transitions.js"></script>
  <script src="/js/guided-use.js"></script>
</html>
