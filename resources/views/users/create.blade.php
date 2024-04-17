<x-app-layout>

    <article class="container mx-auto">
        <header>
            <h2>User Management</h2>
        </header>

        <section>
            <form action="{{ route('users.store') }}"
                  method="POST"
                  class="grid grid-cols-2 max-w-3xl gap-4">

                @csrf
                <label for="Name">Name:</label>
                <input type="text"
                       id="Name"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="Enter user name"
                       class="border-gray-200">
                <label for="Email">Email:</label>
                <input type="text"
                       id="Email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Enter email address"
                       class="border-gray-200">
                <label for="Password">Password:</label>
                <input type="text"
                       id="Password"
                       name="password"
                       placeholder="Enter password"
                       class="border-gray-200">
                <label for="Confirm">Confirm Password:</label>
                <input type="password"
                       id="Confirm"
                       name="password_confirmation"
                       placeholder="Confirm password"
                       class="border-gray-200">

                <label for="">Actions</label>
                <p>
                    <button type="submit">Save</button>
                    <a href="{{ route('users.index') }}">Cancel</a>
                </p>
            </form>
        </section>
    </article>
</x-app-layout>
