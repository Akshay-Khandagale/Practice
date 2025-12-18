@extends('component')

@section('content')

<div class="container mt-4" style="width:100%; ">

    <link rel="stylesheet"
        href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <h2>User List (Ajax DataTable)</h2>

    <table id="userTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    <script>
    $(document).ready(function () {
        $('#userTable').DataTable({
            processing: true,
            serverSide: false, // we are not using Yajra, so keep it false
            ajax: "{{ ('getdata') }}",
            columns: [
                {data: 'id'},
                {data: 'name'},
                {data: 'email'},
                {data: 'role'},
                {
                    data: 'id',
                    render: function (data) {
                        return `
                            <a href="#" class="btn btn-sm btn-primary">Edit</a>
                            <a href="#" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</a>
                        `;
                    }
                },
            ]
        });
    });
    </script>
</div>



@endsection
