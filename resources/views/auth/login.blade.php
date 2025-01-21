
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 to-indigo-200">
  <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden p-8">
    <h3 class="mb-6 text-2xl font-bold text-gray-700 text-center">Log In</h3>

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
      @csrf

      <!-- Email Address -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
        <input id="email" class="block w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
        <input id="password" class="block w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" type="password" name="password" required autocomplete="current-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Remember Me -->
      <div class="flex items-center">
        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
        <label for="remember_me" class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</label>
      </div>

      <!-- Forgot Password Link -->
      <div class="flex items-center justify-between mt-4">
        @if (Route::has('password.request'))
          <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
            {{ __('Forgot your password?') }}
          </a>
        @endif

        <button type="submit" class="px-6 py-3 text-lg font-semibold text-white bg-blue-400 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
          {{ __('Log in') }}
        </button>
      </div>
    </form>
  </div>
</body>
</html>