<div>
    <!-- resources/views/components/navbar.blade.php -->

    <!-- Nav links -->
    <div class="flex items-center justify-between p-4 m-0 bg-gray-900 min-w-fit min-h-min font-courier">
        <div class="flex text-white">
            <a href="{{ url('/')}}">Home</a>    
        </div>
        <div class="flex space-x-4 text-white">
            <a href="{{ url('/login')}}">Login</a>
            <a href="{{ url('/register')}}">Register</a>
        </div>
    </div>
</div>