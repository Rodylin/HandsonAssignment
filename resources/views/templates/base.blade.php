<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HTMX Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/htmx.org@1.9.12"></script>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 h-screen bg-gradient-to-r from-gray-600 to-blue-900 text-white shadow-lg">
            <div id="brand" class="text-2xl font-bold p-4">
                June21
            </div>
            <nav id="main-nav" class="flex flex-col space-y-4 p-4">
                <a href="/home" class="px-3 py-2 rounded hover:bg-indigo-500 transition duration-300">Home</a>
                <a href="/about" class="px-3 py-2 rounded hover:bg-indigo-500 transition duration-300">About</a>
                <a href="/products" class="px-3 py-2 rounded hover:bg-indigo-500 transition duration-300">Products</a>
                <a href="/contact" class="px-3 py-2 rounded hover:bg-indigo-500 transition duration-300">Contact Us</a>
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 p-6">
            <section class="bg-white p-6 rounded shadow-lg">
                <h1 class="text-3xl font-bold mb-4">HANDS-ON</h1>
                <p class="text-gray-700">RodylinBernales</p>
            </section>

            <div class="container mx-auto py-4">
                @yield('content')
            </div>  
        </div>
    </div>
</body>
</html>
