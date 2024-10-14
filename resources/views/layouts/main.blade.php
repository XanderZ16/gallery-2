<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>

    <style>
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #2d3748;
        }

        ::-webkit-scrollbar-thumb {
            background: #4a5568;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #2d3748;
        }
    </style>
</head>

<body>
    <div id="overlay" class="fixed top-0 left-0 z-40 hidden w-screen h-screen"></div>
    <div id="main" class="flex flex-col min-h-screen overflow-x-hidden max-w-[100vw] dark:bg-basic">
        @yield('content')
    </div>
</body>

</html>
