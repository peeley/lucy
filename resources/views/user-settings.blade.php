<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@include('layouts.includes.header')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/settings.css">
    <script src="/js/back-button.js"></script>
</head>
<body>
@include('layouts.includes.darkThemeToggle')
<p id="url" style="display:none">{{ $url ?? ''}}</p>
<form id="back" action="/home" }>
    <button class="settings-button" type='submit'>Exit</button>
</form>
<h2 class="general-heading"> Settings </h2>

<!-- buttons to display and change audio levels/guided use toggles -->
<center>
<button class="settings-button" onclick="openGuidedUseForm()">Guided Use</button>
<button class="settings-button" onclick="openAudioForm()">Audio</button>
</center>
<!-- forms which allow the user to see and adjust their settings -->
<div class="form-popup" id = "GuidedUseForm">
<form action="/user-settings" method="POST">
    @csrf
    <h2>Guided Use</h2>
    <input type="radio" name="guided_use" value="1" {{ $guided_use_toggle ?  "checked" : ""}}>
    <label>Guided Use: On</label>
    <br>
    <input type="radio" name="guided_use" value="0" {{ (! $guided_use_toggle) ?  "checked" : ""}} >
    <label>Guided Use: Off</label><br>

    <label>Idle Threshold (in seconds)</label>
    <input type="number" name="idle_threshold" min="5" max="300" value={{$idle_threshold}}><br>
    <input class="update-url" type="hidden" name="secret" value="/home"><br>
    <input class="update-settings-button" type="submit" value="Update Guided Use Settings"><br>
    <button class="close-settings-button" type="button" onclick="closeGuidedUseForm()">Close Guided Use Settings </button>
</form>
</div>

<div class="form-popup" id="AudioForm">
<form action="/user-settings" method="POST">
    @csrf
    <h2>Audio Settings</h2>
    <label for="audio_level">Audio Level: </label>
    <input type="number" name="audio_level" min="0" max="100" value={{$audio_level}}><br>
    <input class="update-url" type="hidden" name="secret" value="/home"><br>
    <input class="update-settings-button" type="submit" value="Update Audio Settings"><br>
    <button class="close-settings-button" type="button" onclick="closeAudioForm()">Close Audio Setings</button>
</form>
</div>

<script>
function openGuidedUseForm()
{
    document.getElementById("GuidedUseForm").style.display = "block";
}

function openAudioForm()
{
    document.getElementById("AudioForm").style.display = "block";
}

function closeGuidedUseForm()
{
    document.getElementById("GuidedUseForm").style.display = "none";
}

function closeAudioForm()
{
    document.getElementById("AudioForm").style.display = "none";
}
</script>

</body>

</html>
