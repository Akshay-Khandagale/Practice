@extends('component')

@section('content')
    <div class="max-w-xl mx-auto bg-white shadow rounded p-6 mt-10">

        <h2 class="text-2xl font-bold mb-5">Add New Link</h2>

        <form id="userForm">
            @csrf

             <!-- Name -->
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="border p-2 w-full">
                <small class="text-red-500 error-name"></small>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="border p-2 w-full mt-2">
                <small class="text-red-500 error-email"></small>
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="border p-2 w-full">
                    <option value="">Select Role</option>
                    <option value="admin" {{ old('role')=='admin'?'selected':'' }}>Admin</option>
                    <option value="user" {{ old('role')=='user'?'selected':'' }}>User</option>
                </select>
                <small class="text-red-500 error-role"></small>
            </div>

            <!-- Address -->
            <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="border p-2 w-full">{{ old('address') }}</textarea>

                <small class="text-red-500 error-address"></small>
            </div>

            <!-- Submit Button -->
             <div class="flex justify-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save User
                </button>
            </div>

        </form>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#userForm').on('submit', function(e){
    e.preventDefault();

    // clear old errors
    $('.text-red-500').text('');

    $.ajax({
        url: '/api/savelink',
        type: 'POST',
        data: $(this).serialize(),
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').val()
        },
        success: function(res){
            alert(res.message);
            $('#userForm')[0].reset();
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


    </div>
    @endsection