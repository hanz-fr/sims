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
  {{-- css --}}
  <link rel="stylesheet" href="assets/output.css">
  {{-- icon --}}
  <link rel="stylesheet" href="font-awesome/css/all.min.css">
</head>
<body class="tw-bg-[#FFFFFF]">

<div class="tw-flex tw-flex-row">
  <aside class="tw-w-64" aria-label="Sidebar">
    <div class="tw-overflow-y-auto tw-h-screen tw-sticky tw-py-4 tw-px-3 tw-bg-[#454F58] tw-justify-between">
      <div class="">
         <a href="/dashboard" class="tw-items-center tw-flex tw-flex-col tw-gap-3 tw-pl-2.5 tw-mb-5 tw-mt-8">
            <img src="assets/img/logo-admin.svg" class="tw-mr-3 tw-h-9" alt="Flowbite Logo">
            <span class="tw-self-center tw-text-2xl tw-font-semibold tw-whitespace-nowrap tw-font-pop tw-text-gray-100">SIMS Admin</span>
         </a>
         <ul class="tw-space-y-2 tw-font-ubuntu tw-mt-20">
            <li>
               <a href="#" class="tw-flex tw-pl-10 tw-items-center tw-p-2 tw-text-base tw-font-normal tw-text-gray-400 tw-rounded-lg hover:tw-bg-[#5A6C7C] hover:tw-text-gray-100">
                <i class="fa-light fa-browser tw-text-[#B2FEFE] tw-text-xl"></i>
                  <span class="tw-ml-3 tw-font-bold tw-text-lg">Dashboard</span>
               </a>
            </li>
            <li>
              <a href="#" class="tw-flex tw-pl-10 tw-items-center tw-p-2 tw-text-base tw-font-normal tw-text-gray-400 tw-rounded-lg hover:tw-bg-[#5A6C7C] hover:tw-text-gray-100">
                <i class="fa-regular fa-database tw-text-[#B2FEFE] text-xl"></i>
                <span class="tw-ml-4 tw-font-bold tw-text-lg">Database</span>
              </a>
           </li>
           <li>
            <a href="#" class="tw-flex tw-pl-10 tw-items-center tw-p-2 tw-text-base tw-font-normal tw-text-gray-400 tw-rounded-lg hover:tw-bg-[#5A6C7C] hover:tw-text-gray-100">
              <i class="fa-solid fa-user tw-text-[#B2FEFE] tw-text-xl"></i>
              <span class="tw-ml-3 tw-font-bold tw-text-lg">Account</span>
            </a>
         </li>
         </ul>
      </div>
      <div class="tw-flex tw-flex-row tw-order-2">
         <hr class="tw-bg-[#b2fefe] tw-my-5">
         <div class="tw-flex tw-items-center tw-p-2 tw-pl-10 tw-pr-5 tw-text-base tw-font-normal tw-text-gray-400 tw-rounded-lg hover:tw-bg-[#5A6C7C]">
            <a href="#" class="">
               <i class="fa-light fa-circle-user tw-text-gray-400 tw-text-3xl"></i>
            </a>
               <div
               x-data="{
                   open: false,
                   toggle() {
                       if (this.open) {
                           return this.close()
                       }
       
                       this.$refs.button.focus()
       
                       this.open = true
                   },
                   close(focusAfter) {
                       if (! this.open) return
       
                       this.open = false
       
                       focusAfter && focusAfter.focus()
                   }
               }"
               x-on:keydown.escape.prevent.stop="close($refs.button)"
               x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
               x-id="['dropdown-button']"
               class="tw-relative">
               <!-- Button -->
               <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')" type="button" class="tw-flex tw-items-center tw-gap-2 tw-text-gray-400 tw-px-2 tw-font-pop tw-text-sm tw-font-bold">
               hyperadmin
               <i class="fa-solid fa-caret-down"></i>
               </button>
       
               <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                   class="tw-absolute tw-left-0 tw-mt-2 tw-w-40 tw-rounded-md tw-bg-white tw-shadow-md tw-font-pop">
                   <a href="/profile" class="tw-flex tw-items-center tw-gap-2 tw-w-full tw-font-medium tw-text-gray-500 first-of-type:tw-rounded-t-md last-of-type:tw-rounded-b-md tw-px-4 tw-py-2.5 tw-text-left tw-text-sm">
                       Profil
                   </a>
                   <a href="/logout" class="tw-flex tw-items-center tw-text-red-600 tw-gap-2 tw-w-full first-of-type:tw-rounded-t-md last-of-type:tw-rounded-b-md tw-px-4 tw-py-2.5 tw-text-left tw-text-sm">
                       <span class="tw-font-medium">Logout &nbsp;<i class="fa-solid fa-right-from-bracket"></i></span>
                   </a>
               </div>
           </div>
         </div>
    </div>
      </div>

    </div>
 </aside>
</div>
   {{-- alpine js --}}
   <script defer src="https://unpkg.com/@alpinejs/intersect@3.10.3/dist/cdn.min.js"></script>
   <script defer src="https://unpkg.com/alpinejs@3.10.3/dist/cdn.min.js"></script>
</body>
</html>