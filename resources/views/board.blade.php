<html>

@include('layouts.includes.header')
@include('layouts.includes.darkThemeToggle')

 <h2 style="padding: 20px">
    <form>
      <button class="back-button" formaction="/">Back</button>
    </form>
  </h2>

  <div id="root" board_id={{ $board_id }}></div>
  <script src="/js/app.js"></script>

  <link rel="stylesheet" href="/css/view-transitions.css">
  <div class="transition transition-2 is-active"></div>
  <script src="/js/view-transitions.js"></script>
</html>
