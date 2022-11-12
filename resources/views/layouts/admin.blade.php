<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIMS || {{ $title }}</title>
  {{-- font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">

   {{-- flowbite --}}
   <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css"/>
  {{-- css --}}
  <link rel="stylesheet" href="{{ URL::asset('assets/output.css') }}">
  {{-- icon --}}
  <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/all.min.css') }}">
  @stack('css')
</head>
<body class="tw-bg-white">
   {{-- <div x-show="show" class="modal-overlay tw-absolute tw-w-full tw-h-full tw-bg-gray-900 tw-opacity-50"></div> --}}
<div class="tw-flex tw-overflow-x-hidden tw-h-screen">
   {{-- sidebar --}}
  <aside class="tw-w-64 tw-top-0 tw-bottom-0 tw-sticky" aria-label="Sidebar">
      <div class="tw-w-64 tw-h-screen tw-sticky tw-py-4 tw-px-3 tw-bg-[#454F58] tw-justify-between tw-flex tw-flex-col">
         <div class="">
            <a href="/dashboard" class="tw-items-center tw-flex tw-flex-col tw-gap-3 tw-pl-2.5 tw-mb-5 tw-mt-8">
               <img src="{{ URL::asset('assets/img/logo-admin.svg') }}" class="tw-mr-3 tw-h-9">
               <span class="tw-self-center tw-text-2xl tw-font-semibold tw-whitespace-nowrap tw-font-pop tw-text-gray-100">SIMS Admin</span>
            </a>
            <ul class="tw-space-y-3 tw-font-ubuntu tw-mt-20">
               <li>
                  <a href="/dashboard" class="{{ ($active === "admin") ? 'tw-bg-[#5A6C7C] tw-text-white' : '' }} nav-item-admin tw-transition-colors tw-duration-300">
                  <i class="fa-regular fa-browser tw-text-[#B2FEFE] tw-text-2xl"></i>
                     <span class="tw-ml-3 tw-font-bold tw-text-lg">Dashboard</span>
                  </a>
               </li>
               <li>
               <a href="/database" class="{{ ($active === "database") ? 'tw-bg-[#5A6C7C] tw-text-white' : '' }} nav-item-admin tw-transition-colors tw-duration-300">
                  <i class="fa-regular fa-database tw-text-[#B2FEFE] tw-text-2xl"></i>
                  <span class="tw-ml-3 tw-font-bold tw-text-lg">Database</span>
               </a>
            </li>
            <li>
               <a href="/account" class="{{ ($active === "account") ? 'tw-bg-[#5A6C7C] tw-text-white' : '' }} nav-item-admin tw-transition-colors tw-duration-300">
               <i class="fa-solid fa-user tw-text-[#B2FEFE] tw-text-2xl"></i>
               <span class="tw-ml-3 tw-font-bold tw-text-lg">Account</span>
               </a>
            </li>
            </ul>
         </div>
         <div class="tw-flex tw-flex-col tw-justify-center">
            <hr class="tw-bg-[#b2fefe] tw-mb-2 tw-mx-5">
            <div x-data="{ isActive: false, open: false }">
               <div x-show="open" x-transition.duration.90ms class="tw-my-2 tw-font-ubuntu tw-font-bold tw-justify-center tw-text-center" role="menu" arial-label="Components">
                  <a href="/admin/logout" role="menuitem" class="nav-item-admin tw-justify-center tw-font-bold tw-transition-colors tw-duration-200 tw-text-center">
                  Logout
                  </a>
              </div>
               <a href="#"
                   @click="$event.preventDefault(); open = !open"
                   class="tw-items-center tw-transition-all nav-item-admin tw-justify-center tw-pl-0 tw-group"
                   :class="{ '': isActive || open }"
                   role="button"
                   aria-haspopup="true"
                   :aria-expanded="(open || isActive) ? 'true' : 'false'">
                   <span aria-hidden="true" class="tw-mr-3">
                     <i class="fa-light fa-circle-user tw-text-4xl group-hover:tw-text-white group-focus:tw-text-white"></i>
                   </span>
                   <span class="mx-3 text-left whitespace-nowrap tw-font-pop tw-text-gray-400 font-medium group-hover:tw-text-white group-focus:tw-text-white"> hyperadmin </span>
                   <span aria-hidden="true" class="tw-ml-2">
                   <i class="fa-solid fa-caret-down transition-transform transform tw-origin-center group-hover:tw-text-white group-focus:tw-text-white"
                   :class="{ 'tw-rotate-180': open }"></i>
                   </span>
               </a>
               </div>
            </li>
         </div>
      </div>
  </aside>

  {{-- content --}}
  @yield('content')
</div>
   {{-- alpine js --}}
   <script defer src="https://unpkg.com/@alpinejs/intersect@3.10.3/dist/cdn.min.js"></script>
   <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
  @include('sweetalert::alert')
   @stack('scripts')  
</body>
</html>