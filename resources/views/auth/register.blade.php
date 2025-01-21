<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-100 to-indigo-200">
  <div class="w-full max-w-md bg-white rounded-lg shadow-lg overflow-hidden p-8">
    <h3 class="mb-6 text-2xl font-bold text-gray-700 text-center">Create an Account</h3>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      <!-- Name -->
      <div>
        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
        <input id="name" class="block w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- Email Address -->
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
        <input id="email" class="block w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
        <input id="password" class="block w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" class="block w-full mt-2 p-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-400 focus:outline-none" type="password" name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      <!-- Register Button and Link -->
      <div class="flex items-center justify-between mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
          {{ __('Already registered?') }}
        </a>

        <button type="submit" class="px-6 py-3 text-lg font-semibold text-white bg-blue-400 rounded-lg shadow-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
          {{ __('Register') }}
        </button>
      </div>
    </form>
  </div>
</body>
</html>
