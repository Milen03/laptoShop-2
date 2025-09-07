<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Табло</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-2xl p-8 text-center">
        <h1 class="text-2xl font-bold mb-4">Добре дошъл, {{ auth()->user()->name }}!</h1>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="px-4 py-2 bg-red-600 text-black rounded-lg hover:bg-red-700">
                Изход
            </button>
        </form>
    </div>
</body>
</html>
