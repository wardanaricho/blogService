<table id="userTable" class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->created_at }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<div id="paginationLinks">
    {{ $users->links() }}
</div>
