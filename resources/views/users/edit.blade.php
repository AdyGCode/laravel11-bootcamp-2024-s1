<x-app-layout>
    <article class="container mx-auto max-w-7xl">
        <header
            class="py-4 bg-gray-600 text-gray-200 px-4 rounded-t-lg mb-4 flex flex-row justify-between items-center">
            <div>
                <h2 class="text-3xl font-semibold">Management Area</h2>
                <h3 class="text-2xl">Edit User</h3>
            </div>
            <i class="fa fa-user-pen text-5xl"></i>
        </header>


        @if(Session::has('success'))
            <section id="Messages" class="my-4 px-4">
                <div class="p-4 border-green-500 bg-green-100 text-green-700 rounded-lg">
                    {{Session::get('success')}}
                </div>
            </section>
        @endif

        @if($errors->count()>0)
            <section class="bg-red-200 text-red-800 mx-4 my-2 px-4 py-2 flex flex-col gap-1 rounded border-red-600">
                <p>We have noted some data entry issues, please update and resubmit.</p>
                {{--                @foreach($errors->all() as $error)--}}
                {{--                    <p class="text-sm">{{ $error }}</p>--}}
                {{--                @endforeach--}}
            </section>
        @endif


        <section class="p-4 ">
            <form action="{{ route('users.update', $user) }}"
                  method="POST"
                  class="max-w-3xl flex flex-col gap-4">

                @csrf
                @method('patch')


                <fieldset class="grid grid-cols-7">
                    <label class="text-gray-500 col-span-2"
                           for="Name">Name:</label>
                    <input type="text"
                           id="Name"
                           name="name"
                           value="{{ old('name') ?? $user->name }}"
                           placeholder="Enter user name"
                           class="border-gray-200 col-span-5">
                    @error("name")
                    <span class="text-gray-500 col-span-2"></span>
                    <p class="small text-red-500 col-span-5 text-sm">{{ $message }}</p>
                    @enderror
                </fieldset>

                <fieldset class="grid grid-cols-7">
                    <label class="text-gray-500 col-span-2"
                           for="Email">Email:</label>
                    <input type="text"
                           id="Email"
                           name="email"
                           value="{{ old('email') ?? $user->email }}"
                           placeholder="Enter email address"
                           class="border-gray-200 col-span-5">
                    @error("email")
                    <span class="text-gray-500 col-span-2"></span>
                    <p class="small text-red-500 col-span-5 text-sm">{{ $message }}</p>
                    @enderror</fieldset>

                <fieldset class="grid grid-cols-7">
                    <label class="text-gray-500 col-span-2"
                           for="Password">Password:</label>
                    <input type="text"
                           id="Password"
                           name="password"
                           placeholder="Enter password"
                           class="border-gray-200 col-span-5">
                    @error("password")
                    <span class="text-gray-500 col-span-2"></span>
                    <p class="small text-red-500 col-span-5 text-sm">{{ $message }}</p>
                    @enderror</fieldset>

                <fieldset class="grid grid-cols-7">
                    <label class="text-gray-500 col-span-2"
                           for="Confirm">Confirm Password:</label>
                    <input type="password"
                           id="Confirm"
                           name="password_confirmation"
                           placeholder="Confirm password"
                           class="border-gray-200 col-span-5">
                </fieldset>

                <fieldset class="grid grid-cols-7">
                    <label class="text-gray-500 col-span-2"
                           for="">Actions</label>
                    <p class="col-span-5 flex gap-4">
                        <button type="submit"
                                class="p-2 px-4 text-center rounded-md
                                      text-green-600 hover:text-green-200 dark:hover:text-black bg-green-200 dark:bg-black hover:bg-green-500
                                      duration-300 ease-in-out transition-all">
                            <i class="fa fa-save text-lg"></i>
                            {{ __('Save Changes') }}
                        </button>
                        <a href="{{ route('users.show', $user) }}"
                           class="p-2 px-8 text-center rounded-md
                                      text-blue-600 hover:text-blue-200 dark:hover:text-black bg-blue-200 dark:bg-black hover:bg-blue-500
                                      duration-300 ease-in-out transition-all">
                            <i class="fa fa-xmark text-lg"></i>
                            {{ __('Cancel') }}
                        </a>
                        <a href="{{ route('users.index') }}" class="p-2 px-4 text-center rounded-md
                                      text-gray-600 hover:text-gray-200 dark:hover:text-black
                                      bg-gray-200 dark:bg-black hover:bg-gray-500
                                      duration-300 ease-in-out transition-all">
                            <i class="fa fa-arrow-left text-lg"></i>
                            {{ __('All Users') }}
                        </a>
                    </p>
                </fieldset>
            </form>
        </section>
    </article>
</x-app-layout>
