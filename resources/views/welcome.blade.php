<!DOCTYPE html>
<html>

<head>
    @include('layouts.includes.header')
    <title>Welcome to Lucy!</title>
    <link rel="stylesheet" href="@if (session('isDark')) /css/welcome-dark.css @else /css/welcome.css @endif">
    @include('layouts.includes.darkThemeToggle')
</head>
<body class = "welcome-body">

    <div class="transition transition-2 is-active"></div>
    <div class = "welcome-title">
        <p class = "welcome-header">Welcome to Project Lucy</p>
        <p>An Augmentative and Alternative Communication Open Source Solution</p>
    </div>
    <br>
    <br>

    <div>
        <form>
            <button class="welcome-button" formaction="/login">Log in</button>
            <button class="welcome-button" formaction="/create-account">Create Account</button>
            <button class="welcome-button" formaction="/guest">Guest</button>
            <button class="welcome-button" formaction="/about-us">About Us</button>
        </form>
    </div>
    <script src="/js/view-transitions.js"></script>
</body>
</html>
