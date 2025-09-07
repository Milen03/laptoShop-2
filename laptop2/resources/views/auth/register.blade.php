<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Регистрация</h2>

        <form method="POST" action="/register" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Име"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>

            <input type="email" name="email" placeholder="Имейл"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>

            <input type="password" name="password" placeholder="Парола"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>

            <input type="password" name="password_confirmation" placeholder="Повтори паролата"
                class="w-full border rounded-lg p-2 focus:ring focus:ring-blue-200" required>

            <button type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                Регистрация
            </button>
        </form>

        <p class="mt-4 text-center text-sm">
            Вече имаш акаунт?
            <a href="/login" class="text-blue-600 hover:underline">Вход</a>
        </p>
    </div>
</body>
</html>
