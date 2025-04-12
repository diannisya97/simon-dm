@extends('layout.app')
@section('content')
  <section class="h-[100vh] w-[350px] m-auto overflow-hidden bg-[#0BB4A6] scale-90 bg-cover bg-center flex flex-col justify-center items-center gap-y-52 rounded-3xl">
    <img src="{{ asset('assets/simon-dm.png') }}" alt="" class="w-[250px]">
    <div class="flex flex-col gap-2 text-center">
      <a href="{{ route('greet') }}" class="bg-white px-7 py-2 rounded-full font-bold text- text-base">Login</a>
      <a href="{{ route('register') }}" class="bg-white px-7 py-2 rounded-full font-bold text-black text-base">Sign Up</a>
    </div>
  </section>
@endsection
