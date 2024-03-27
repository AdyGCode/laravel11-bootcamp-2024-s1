<x-app-layout>
    <section class="max-w-2xl mx-auto p-4 md:p-6 lg:p-8">
        <form method="POST"
              action="{{ route('chirps.store') }}">
            @csrf
            <label for="message">New Chirp!</label>
            <textarea name="message" id="message"
                      cols="30" rows="5"
                      placeholder="{{ __('What\'s on your mind...') }}"
                      class="block w-fill border-gray-300
                             focus:border-indigo-300
                             focus:ring focus:ring-indigo-200
                             focus:ring-opacity-50
                             rounded-md shadow-sm">{{ old('message')
                             }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Chirp') }}!</x-primary-button>
        </form>
    </section>

    <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
        @foreach($chirps as $chirp)
            <section class="p-6 flex space-x-8">
                <p class="text-6xl bg-green-500 text-black rounded-full
                w-16 text-center align-bottom">C</p>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <h5>
                            <span class="text-gray-800">
                                {{ $chirp->user->name }}
                            </span>
                            <small class="ml-6 text-sm text-gray-600">
                                {{ $chirp->created_at->format('j M Y, g:i a') }}
                            </small>
                        </h5>
                    </div>
                    <p class="mt-4 text-lg text-gray-900">
                        {{ $chirp->message }}
                    </p>
                </div>
            </section>
        @endforeach
    </div>

</x-app-layout>
