<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <h4 class="text-center mt-3">Login</h4>

                <div class="card-body">
                    <form id="loginForm">
                        @csrf

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            <small class="text-danger error-email"></small>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-danger error-password"></small>
                        </div>

                        <button class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#loginForm').submit(function(e){
    e.preventDefault();
    $('.error-email,.error-password').text('');

    $.ajax({
        url: '/login',   // ✅ web route
        type: 'POST',
        data: $(this).serialize(),
        success: function(res){
            alert(res.message);

            // store token if needed
            localStorage.setItem('token', res.token);

            // redirect
            if (res.user.role === 'admin') {
                window.location.href = '/admin';
            } else {
                window.location.href = '/index';
            }
        },
        error: function(xhr){
            if(xhr.status === 422){
                $.each(xhr.responseJSON.errors, function(key, value){
                    $('.error-'+key).text(value[0]);
                });
            } else if(xhr.status === 401){
                localStorage.removeItem('token');
                window.location.href = '/login-page';
            } else {
                alert('Invalid credentials');
            }
        }
    });
});
</script>
