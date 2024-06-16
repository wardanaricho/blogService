<table id="userTable" class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>
                    <a href="/user/edit/{{ $user->id }}" class="btn btn-warning">Edit</a>
                    <form action="/user/delete/{{ $user->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="paginationLinks">
    {{ $users->links() }}
</div>
