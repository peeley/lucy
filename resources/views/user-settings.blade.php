<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- to do: CSS styling -->
<!-- this will probably need to be moved somewhere else -->
<style>
    .form-popup
    {
        display: none;
    }
</style>
</head>
<body>
<h1> Settings </h1>

<!-- buttons to display and change audio levels/guided use toggles -->
<button onclick="openGuidedUseForm()">Settings</button>
<button onclick="openAudioForm()">Audio</button>

<!-- forms which allow the user to see and adjust their settings -->
<div class="form-popup" id = "GuidedUseForm"> 
<form action="/user-settings" method="POST">
    @csrf
    <h2>Guided Use</h2>
    <input type="radio" name="guided_use" value="1" <?php if ($guided_use_toggle == 1){echo 'checked="checked"';}?> >
    <label>Guided Use: On</label>
    <br>
    <input type="radio" name="guided_use" value="0" <?php if ($guided_use_toggle == 0) {echo 'checked="checked"';}?> >
    <label>Guided Use: Off</label><br>
    <input type="submit" value="Update Settings">
</form>
</div>

<div class="form-popup" id="AudioForm"> 
<form action="/user-settings" method="POST">
    @csrf
    <!-- to do: error handling-->
    <h2>Audio Settings</h2>
    <label for="audio_level">Audio Level: </label>
    <input type="number" name="audio_level" min="0" max="100" value={{$audio_level}}><br>
    <input type="submit" value="Update Settings">
</form>
</div>

<!-- script to display the pop up form when the guided use or audio settings button is clicked; will need 2?-->
<script>
function openGuidedUseForm()
{
    document.getElementById("GuidedUseForm").style.display = "block";
}

function openAudioForm()
{
    document.getElementById("AudioForm").style.display = "block";
}
</script>

</body>

</html>