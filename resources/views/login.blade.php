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
                            <input type="email" name="email" id="email" class="form-control">
                            <small class="text-red-500 error-email"></small>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <small class="text-red-500 error-password"></small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Login
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#loginForm').on('submit', function(e){
    e.preventDefault();

    // Clear old errors
    $('.text-danger, .error-email, .error-password').text('');

    $.ajax({
        url: '/api/login',  // Make sure this matches your route
        type: 'POST',
        data: $(this).serialize(),
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'  // Important for Laravel to know it's AJAX
        },
        success: function(res){
            console.log(res);  // ← CHECK THIS IN BROWSER CONSOLE!

            if(res.success === true){  // ← Use res.success, not res.status
                alert(res.message);

                if(res.role === 'admin'){
                    window.location.href = '/users';
                } else {
                    window.location.href = '/index';
                }
            } else {
                alert(res.message || 'Login failed');
            }
        },
        error: function(xhr){
            console.log(xhr.responseText);
            console.log(xhr.status);

            if(xhr.status === 422){
                let errors = xhr.responseJSON?.errors || {};
                $.each(errors, function(field, messages){
                    $('.error-' + field).text(messages[0]);
                });
            } else if(xhr.status === 401){
                alert('Invalid credentials');
            } else {
                alert('Something went wrong. Check console.');
            }
        }
    });
});
</script>