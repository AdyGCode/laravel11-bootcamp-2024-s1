<x-app-layout>
    <article class="container mx-auto">
        <header>
            <h2>User Management</h2>
        </header>

        <section>
            <header class="flex flex-row justify-between">
                <h3>
                    Users
                </h3>
                <a href="{{ route('users.create') }}">Add New User</a>
            </header>
            <div class="w-full">
                <table class="table w-full">
                    <thead>
                    <tr>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Last Active</td>
                        <td>Actions</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>
                                <a href="{{ route('users.show', $user) }}">
                                    View
                                </a>

                                <a href="{{ route('users.edit', $user) }}">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user) }}"
                                      method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                            class="rounded border bg-gray-200">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4">
                            {{ $users->links() }}
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>

        </section>
    </article>
</x-app-layout>
