@extends('component')

@section('content')
    <div class="max-w-xl mx-auto bg-white shadow rounded p-6 mt-10">

        <h2 class="text-2xl font-bold mb-5">Add New User</h2>

        <form action="" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Full Name</label>
                <input type="text" name="name" value=""
                       class="w-full border p-2 rounded focus:ring focus:ring-blue-300">
               
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block font-medium mb-1">Email Address</label>
                <input type="email" name="email" value=""
                       class="w-full border p-2 rounded focus:ring focus:ring-blue-300">
              
            </div>

            <!-- Role -->

            <div class="mb-4">
                <label class="block font-medium mb-1">Role</label>
                <select name="role" class="w-full border p-2 rounded">
                    <option value="">Select Role</option>
                    <option value="TGIF">TGIF</option>
                    <option value="MSFT">MSFT</option>
                    <option value="WM STORM">WM STORM</option>
                </select>
            </div>

            <!-- Role -->

            <div class="mb-4">
                <label class="block font-medium mb-1">Link Add</label>
                <textarea name="address" id="address" class="w-full border p-2 rounded form-control" rows="4" cols="60"></textarea>
            </div>

            <!-- Submit Button -->
             <div class="flex justify-end">
                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Save User
                </button>
            </div>

        </form>

    </div>
    @endsection