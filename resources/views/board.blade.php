<html>

  @include('layouts.includes.header')
  @include('layouts.includes.darkThemeToggle')
  <link rel="stylesheet" href="/css/board.css"/>

  <div id="root" board_id={{ $board_id }}></div>
  <p id ="audio-level" style="display:none">{{ $audio_level }}</p>
  <script src="/js/app.js"></script>
  <p id="guided-use-state">{{ $guided_use }}</p>
  <p id="idle-threshold">{{ $idle_threshold }}</p>
  <div id="guidedPopup1"><h1>Press the word you want to say</h1></div>
  <div id="guidedPopup2"><h1>Press on the sentence bar or the speak button to talk</h1></div>
  <div id="guidedPopup3"><h1>Note: You can create or edit your own words by pressing and holding down a tile for 3 seconds. <br><br>
                             (You can close this dialog by pressing anywhere on the screen)</h1></div>
  <link rel="stylesheet" href="/css/view-transitions.css">
  <link rel="stylesheet" href="/css/guided-use.css">
  <div class="transition transition-2 is-active"></div>
  <script src="/js/view-transitions.js"></script>
  <script src="/js/guided-use.js"></script>
</html>
