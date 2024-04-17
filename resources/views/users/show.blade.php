<x-app-layout>

    <article class="container mx-auto">
        <header>
            <h2>User Management</h2>
        </header>

        <section class="grid grid-cols-2 max-w-3xl">
            <p>Name:</p>
            <p>{{ $user->name }}</p>
            <p>Email:</p>
            <p>{{ $user->email }}</p>
            <p>Joined:</p>
            <p>{{ $user->created_at }}</p>
            <p>Verified:</p>
            <p>{{ $user->email_verified_at ?? "Unverified" }}</p>
            <p>Actions</p>
            <p>
                <a href="{{ route('users.edit', $user) }}">
                    Edit
                </a>

                Delete

                <a href="{{ route('users.index') }}">
                    Back
                </a>
            </p>
        </section>
    </article>
</x-app-layout>
