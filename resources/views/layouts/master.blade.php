@vite(["resources/sass/app.scss", "resources/js/app.js"])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("titolo")</title>
    <style>
        body, html{
            height: 100% !important;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        main{
            flex: 1 !important;
        }
    </style>
</head>
<body>
    @include("partials.header")
    <main>
        @yield("contenuto")
    </main>
    @include("partials.footer")
</body>
</html>