<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=yes">
    <title>{{ config("app.name") }}</title>

    <!-- jQuery -->
    <script src="{{ asset("assets/vendor/jquery/jquery.min.js") }}"></script>


    <!-- Bootstrap -->
    <link href="{{ asset("assets/vendor/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">
    <script src="{{ asset("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") }}"></script>


    <!-- FontAwesome -->
    <link href="{{ asset("assets/vendor/fontawesome-free-6.5.2-web/css/all.css") }}" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ asset("assets/vendor/datatables/datatables.min.css") }}" rel="stylesheet">
    <script src="{{ asset("assets/vendor/datatables/datatables.min.js") }}"></script>

    <!-- marked (markdown parser) -->
    <script src="{{ asset("assets/vendor/marked/marked.min.js") }}"></script>

    <!-- DOM-purify -->
    <script src={{ asset("assets/vendor/dom-purify/purify.min.js") }}></script>

    <!-- custom styles -->
    @vite("resources/css/custom.css")


</head>
<body>

<div class="container-fluid container-lg">
    <x-navbar/>

    <h1>@yield("title")</h1>

    <x-results />

    @yield("content")


</div>

<!-- custom js -->
@vite("resources/js/custom.js")

</body>
</html>
