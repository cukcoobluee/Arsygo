<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/header.css') }}">
  <link rel="icon" href="{{ asset('img/arsygo-logo.png') }}" type="image/png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <title>Arsygo</title>
</head>

@vite(['resources/css/header.css', 'resources/js/header.js'])

<style>
  /* Link default */
.nav-link {
  color: #FFFF; /* abu tua */
  transition: color 0.3s ease;
  font-family: poppins;
}

/* Hover */
.nav-link:hover {
  color: #d39932; /* kuning hover */
  font-family: poppins;
}

/* Link aktif (halaman sekarang) */
.active-link {
  font-family: poppins;
  color: #d39932; /* kuning */
  font-weight: 500;
}

</style>

<!-- Navbar -->
<nav id="navbar" class="navbar-transparent fixed w-full z-20 top-0 start-0 transition duration-300">
  <div class="max-w-screen-xl mx-auto flex flex-wrap items-center justify-between px-4 lg:px-6 py-3">
    
    <!-- Logo -->
    <a href="{{ route('home') }}" class="flex items-center gap-2 nav-link-transparent">
      <img src="{{ asset('img/arsygo-logo.png') }}" class="h-8 sm:h-10 md:h-12 w-auto object-contain" alt="Arsygo Logo">
      <span class="nav-logo text-lg sm:text-xl md:text-2xl font-semibold whitespace-nowrap text-white">
        Arsygo
      </span>
    </a>

    <!-- Right side -->
    <div class="flex items-center lg:order-2 gap-2">   
       <!-- Kalender (tampil hanya di desktop lg ke atas) -->
       <a href="{{ route('user.kalender') }}" 
        class="hidden lg:flex nav-link items-center font-poppins font-medium text-sm sm:text-base px-3 sm:px-4 py-2 transition 
        {{ Route::currentRouteName() == 'user.kalender' ? 'active-link' : 'nav-link-transparent hover:text-yellow-400' }}">
        <i class="fas fa-calendar-alt mr-1 text-[#d39932]"></i>
          <span class="hidden sm:inline">Workshop</span>
      </a>

        <!-- Hamburger -->
        <button id="mobile-menu-button" type="button" 
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-200 lg:hidden rounded-lg hover:bg-amber-600 focus:outline-none focus:ring-2 focus:ring-yellow-400" 
          aria-controls="mobile-menu" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
              d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
      </div>

      <!-- Mobile Menu (android & tablet: sm - md) -->
    <div id="mobile-menu" class="hidden lg:hidden absolute top-16 left-0 w-full bg-amber-400 bg-opacity-95 text-white flex flex-col items-start space-y-4 py-6 shadow-lg transition-all duration-300">
      <a href="{{ route('home') }}" class="w-full px-8 py-2 hover:bg-amber-600">Home</a>
      <a href="{{ route('PaketWisata') }}" class="w-full px-8 py-2 hover:bg-amber-600">Paket Wisata</a>
      <a href="{{ route('HotelTransport') }}" class="w-full px-8 py-2 hover:bg-amber-600">Hotel & Transportasi</a>
      <a href="{{ route('Event') }}" class="w-full px-8 py-2 hover:bg-amber-600">Event Organizer</a>
      <a href="{{ route('about') }}" class="w-full px-8 py-2 hover:bg-amber-600">Tentang Kami</a>
      <a href="{{ route('user.kalender') }}" 
      class="nav-link-transparent flex items-center font-medium text-sm sm:text-base px-8 py-2 hover:bg-amber-600 transition w-full">
        <img src="{{ asset('img/calendar.png') }}" class="w-5 sm:w-6 md:w-7 mr-1" alt="calendar">
        <span class=" sm:inline">Kegiatan Kami</span>
      </a>
    </div>


   <!-- Menu Desktop (hanya lg ke atas, responsive) -->
<div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">
  <ul class="flex flex-wrap justify-center lg:justify-end gap-x-6 mt-3 lg:mt-0 p-4 lg:p-0 w-full lg:w-auto bg-transparent">
    <li>
      <a href="{{ route('home') }}" 
         class="nav-link font-poppins block py-2 px-3 rounded-sm lg:p-0
         {{ Route::currentRouteName() == 'home' ? 'active-link' : '' }}">
         Home
      </a>
    </li>
    <li>
      <a href="{{ route('PaketWisata') }}" 
         class="nav-link font-poppins block py-2 px-3 rounded-sm lg:p-0
         {{ Route::currentRouteName() == 'PaketWisata' || Route::currentRouteName() == 'PrivateTrip' ? 'active-link' : '' }}">
         Paket Wisata
      </a>
    </li>
    <li>
      <a href="{{ route('HotelTransport') }}" 
         class="nav-link font-poppins block py-2 px-3 rounded-sm lg:p-0
         {{ Route::currentRouteName() == 'HotelTransport' || Route::currentRouteName() == 'Transport' ? 'active-link' : '' }}">
         Hotel & Sewa Transportasi
      </a>
    </li>
    <li>
      <a href="{{ route('Event') }}" 
         class="nav-link font-poppins block py-2 px-3 rounded-sm lg:p-0
         {{ Route::currentRouteName() == 'Event' ? 'active-link' : '' }}">
         Event Organizer
      </a>
    </li>
    <li>
      <a href="{{ route('about') }}" 
         class="nav-link font-poppins block py-2 px-3 rounded-sm lg:p-0
         {{ Route::currentRouteName() == 'about' ? 'active-link' : '' }}">
         Tentang Kami
      </a>
    </li>
  </ul>
</div>
  </div>
</nav>
