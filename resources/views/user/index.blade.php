@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Users</h1>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <input type="text" id="search" class="form-control" placeholder="Search">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <select id="sort" class="form-control">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
            </div>
        </div>


        <div id="user-table">

        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function fetchUsers() {
            const search = $('#search').val();
            const sort = $('#sort').val();
            const perPage = 10;

            $.ajax({
                url: "/user-view",
                data: {
                    search,
                    sort,
                    perPage
                },
                success: function(data) {
                    $('#user-table').html(data);
                    $('#user-table').data('search', search);
                    $('#user-table').data('sort', sort);
                }
            });
        }

        $('#search').on('input', fetchUsers);

        $('#sort').on('change', fetchUsers);

        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            const search = $('#user-table').data('search');
            const sort = $('#user-table').data('sort');

            $.ajax({
                url,
                data: {
                    search,
                    sort
                },
                success: function(data) {
                    $('#user-table').html(data);
                }
            });
        });

        fetchUsers();
    </script>
@endpush
