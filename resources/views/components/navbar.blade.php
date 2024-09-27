<div>
    <!-- resources/views/components/navbar.blade.php -->

    <div class="justify-between px-4 py-0 bg-gray-900 min-w-fit min-h-fit">
        <div class="flex-1 text-white">
            <a href="{{ url('/')}}">Home</a>    
        </div>
        <div class="text-white flex-2">
            <a href="{{ url('/login')}}">Login</a>
            <a href="{{ url('/register')}}">Register</a>
        </div>
    </div>
</div>