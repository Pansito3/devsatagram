@extends('layouts.app')
@section('titulo')
Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro de usuarios">

        </div>
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="name" for="" class="mb-2 block uppercase text-gray-500 font-bold">Nombre</label>
                    <input 
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                        value={{old('name')}}
                    >
                </div>
                @error('name')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
                @enderror
                <div class="mb-5">
                    <label for="name" for="" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input 
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu nombre de Usuario"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                        value={{old('username')}}
                    >
                </div>
                @error('username')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
                @enderror

                <div class="mb-5">
                    <label for="email" for="" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input 
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Tu Email de Registro"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                        value={{old('email')}}
                    >
                </div>
                @error('email')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
                @enderror

                <div class="mb-5">
                    <label for="password" for="" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input 
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Password de Registro"
                        class="border p-3 w-full rounded-lg @error('name')
                            border-red-500
                        @enderror"
                    >
                </div>
                @error('password')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}} </p>
                @enderror

                <div class="mb-5">
                    <label for="password_confirmation" for="" class="mb-2 block uppercase text-gray-500 font-bold">Repetir Password</label>
                    <input 
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repetir tu Password"
                        class="border p-3 w-full rounded-lg"
                    >
                </div>
                
                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>

        </div>
    </div>
@endsection