<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Arsygo</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">

    <!-- LEFT SIDE -->
    <div class="hidden lg:flex w-1/2 bg-gray-900 text-white flex-col justify-between p-12">

        <div>
            <h1 class="text-2xl font-semibold tracking-wide">ARSYGO</h1>
        </div>

        <div class="max-w-md">
            <h2 class="text-3xl font-semibold leading-snug">
                Kelola sistem dengan lebih terstruktur dan efisien
            </h2>
            <p class="text-gray-400 mt-4 text-sm leading-relaxed">
                Dashboard admin Arsygo membantu Anda mengelola testimonial, 
                memantau aktivitas, dan menjaga kualitas konten dengan lebih mudah.
            </p>
        </div>

        <p class="text-xs text-gray-500">
            © 2026 Arsygo
        </p>
    </div>


    <!-- RIGHT SIDE -->
    <div class="flex w-full lg:w-1/2 items-center justify-center px-6">

        <div class="w-full max-w-md">

            <!-- HEADER -->
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-gray-900">
                    Masuk ke Admin
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Gunakan akun yang telah terdaftar
                </p>
            </div>


            <!-- ERROR -->
            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-600 text-sm p-3 rounded-lg mb-5">
                    {{ $errors->first() }}
                </div>
            @endif


            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- EMAIL -->
                <div>
                    <label class="text-sm text-gray-600">Email</label>
                    <input type="email" name="email" required
                        class="w-full mt-1 px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                </div>

                <!-- PASSWORD -->
                <div>
                    <label class="text-sm text-gray-600">Password</label>
                    <input type="password" name="password" required
                        class="w-full mt-1 px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-gray-900">
                </div>

                <!-- BUTTON -->
                <button type="submit"
                    class="w-full bg-gray-900 text-white py-2.5 rounded-lg text-sm font-medium hover:bg-gray-800 transition">
                    Masuk
                </button>
            </form>

            <!-- FOOTER -->
            <p class="text-xs text-gray-400 mt-6 text-center">
                Sistem Admin Arsygo
            </p>

        </div>
    </div>

</body>
</html>