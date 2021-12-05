<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<h1> Settings </h1>

<!-- buttons to display and change audio levels/guided use toggles -->
<!-- to do: CSS styling-->
<button onclick="openGuidedUseForm()">Settings</button>

<button onclick="openAudioForm()">Audio</button>

<!-- forms which allow the user to see and adjust their settings -->
<form id = "GuidedUseForm" action="/user-settings" method="POST">
    @csrf
    @if ($guided_use_toggle == 1)
        <h2>Guided Use: On</h2>
    @else 
        <h2>Guided Use: Off</h2>
    @endif
    <input type="text">
</form>
</body>

<!-- script to display the pop up form when the guided use or audio settings button is clicked; will need 2?-->
<script>


</script>


</html>