<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<!-- TODO: user should be able navigate to this page from the create word shortcut/button, and the back button needs to keep track of where we came from. its set to home for now.-->
<h1 style="padding: 20px">
    <a href="/"><button class = "back-button">Back</button></a>
  </h1>

<h2 class="general-heading">Create Word</h2>
<center>
<!--TODO: accept uploaded image as icon; make color selection more user friendly -->
<!-- reused some css from create-account page -->
<form action="/create-word" method="POST" class=submit-form>
    @csrf
    <input type="text" id="word_text" name="word_text" class=create-account-input-button placeholder="Text"><br>
    <input type="text" id="word_color" name="word_color" class=create-account-input-button placeholder="Color (Hexadecimal)"><br>
    <input type="submit" value="Create Word" class=create-account-button>
</form>
</center>
</body>
</html>