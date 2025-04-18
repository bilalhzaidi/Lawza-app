<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Package Selection -->
        <div class="mt-8">
            <h2 class="text-lg font-semibold text-gray-700 mb-3">Choose Your Lawza Subscription Plan:</h2>

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @php
                    $packages = [
                        'lite' => ['title' => 'Lite', 'price' => 'PKR 129/mo', 'features' => ['Up to 5 documents/month', 'Basic support']],
                        'standard' => ['title' => 'Standard', 'price' => 'PKR 249/mo', 'features' => ['Up to 20 documents/month', 'Email support']],
                        'advanced' => ['title' => 'Advanced', 'price' => 'PKR 449/mo', 'features' => ['50+ documents', 'Priority support']],
                        'enterprise' => ['title' => 'Enterprise', 'price' => 'PKR 1,499/mo', 'features' => ['Unlimited access', 'Dedicated support']],
                    ];
                @endphp

                @foreach($packages as $key => $plan)
                    <label class="block border rounded-lg p-4 cursor-pointer hover:border-indigo-600 transition-all relative">
                        <input type="radio" name="package" value="{{ $key }}" class="absolute right-4 top-4" {{ old('package') === $key ? 'checked' : '' }} required>
                        <h3 class="text-xl font-bold text-gray-800">{{ $plan['title'] }}</h3>
                        <p class="text-sm text-indigo-600 font-medium mb-2">{{ $plan['price'] }}</p>
                        <ul class="text-sm text-gray-600 space-y-1">
                            @foreach($plan['features'] as $feature)
                                <li>• {{ $feature }}</li>
                            @endforeach
                        </ul>
                    </label>
                @endforeach
            </div>

            <x-input-error :messages="$errors->get('package')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
