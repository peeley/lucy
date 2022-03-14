<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
@include('layouts.includes.header')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/settings.css">
</head>
<body>
@include('layouts.includes.darkThemeToggle')

<h1 style="padding: 20px">
    <a href="/"><button class = "back-button">Back</button></a>
</h1>
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
