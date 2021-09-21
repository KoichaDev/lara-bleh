@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            {{-- This is Laravel session helper to check if we have a key. It will flash message that put something inside a session temporarily --}}
            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                {{-- Any form you submit is subjected to cross site request forgery protection. This means if you are using any kind of
                web security. We want to make sure that the person who acually submitting the form  is intending to submit that for m
                This works out with a token  which is stored within the form  which is submitted along side form that match up with
                the token that stored maybe in the session or something like that. The code below is how we fix it:
                This @csrf will submit along with the form, otherwise, you get status code 419. Indicates that previously valid authentication has expired --}}
                @csrf

                <div class="mb-4">
                    <label for="email" class="se-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="email"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg  @error('email') border-red-500 @enderror"
                           value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password"
                           class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror"
                           value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="Remember" class="mr-2">
                        <label for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="mb-4">
                    <button type="submit"
                            class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection
