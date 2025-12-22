    @extends('component')

    @section('content')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <div class="container mt-5">
    <div id="successMsg" class="alert alert-success d-none"></div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <h4 style="text-align:center;padding-top:4px;">New Registration</h4>

                    <div class="card-body">
                        <form id="users">
                            @csrf

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                                <small class="text-red-500 error-name"></small>
                            </div>

                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                                <small class="text-red-500 error-email"></small>
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                <small class="text-red-500 error-password"></small>
                            </div>

                            <div class="mb-3">
                                <label>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                <small class="text-red-500 error-password_confirmation"></small>
                            </div>

                            <div class="mb-3">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="">Select Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            <small class="text-red-500 error-role"></small>

                            <button type="submit" class="btn btn-primary w-100">
                                Register
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $('#users').on('submit', function(e){
        e.preventDefault();

        // clear old errors
        $('.text-red-500').text('');

        $.ajax({
            url: '/api/register',
            type: 'POST',
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(res){
                alert(res.message);
                $('#users')[0].reset();
            },
            error: function(xhr){

                console.log(xhr.responseText); // 🔥 DEBUG LINE

                if(xhr.status === 422){
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function(field, messages){
                        $('.error-' + field).text(messages[0]);
                    });
                }
            }
        });
    });
    </script>

@endsection