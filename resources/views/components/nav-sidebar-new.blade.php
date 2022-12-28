<div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
    <div class="tw-flex tw-h-screen tw-antialiased tw-text-gray-900 tw-bg-gray-100 dark:tw-bg-dark dark:tw-text-light">
        <!-- Sidebar -->
        <div class="tw-flex tw-flex-shrink-0 tw-transition-all">
            <div x-show="isSidebarOpen" @click="isSidebarOpen = false"
                class="tw-fixed tw-inset-0 tw-z-10 tw-bg-black tw-bg-opacity-50 lg:tw-hidden"></div>
            <div x-show="isSidebarOpen" class="tw-fixed tw-inset-y-0 tw-z-10 tw-w-16 tw-bg-white"></div>

            <!-- Mobile bottom bar -->
            <nav aria-label="Options"
                class="tw-fixed tw-inset-x-0 tw-bottom-0 tw-flex tw-flex-row-reverse tw-items-center tw-justify-between tw-px-4 tw-py-2 tw-bg-white tw-border-t tw-border-indigo-100 sm:tw-hidden tw-shadow-t tw-rounded-t-3xl">
                <!-- Menu button -->
                <button
                    @click="(isSidebarOpen && currentSidebarTab == 'linksTab') ? isSidebarOpen = false : isSidebarOpen = true; currentSidebarTab = 'linksTab'"
                    class="tw-p-2 tw-transition-colors tw-rounded-lg tw-shadow-md hover:tw-bg-indigo-800 hover:tw-text-white focus:tw-outline-none focus:tw-ring focus:tw-ring-indigo-600 focus:tw-ring-offset-white focus:tw-ring-offset-2"
                    :class="(isSidebarOpen && currentSidebarTab == 'linksTab') ? 'text-white bg-indigo-600' :
                    'text-gray-500 bg-white'">
                    <span class="sr-only">Toggle sidebar</span>
                    <svg aria-hidden="true" class="tw-w-6 tw-h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>

                <!-- Logo -->
                <a href="#">
                    <img class="tw-w-10 tw-h-auto"
                        src="https://raw.githubusercontent.com/kamona-ui/dashboard-alpine/main/public/assets/images/logo.png"
                        alt="K-UI" />
                </a>
            </nav>

            <!-- Left mini bar -->
            <nav aria-label="Options"
                class="tw-z-20 tw-flex-col tw-items-center tw-flex-shrink-0 tw-hidden tw-w-24 tw-py-4 tw-bg-white tw-border-r-2 tw-border-indigo-100 tw-shadow-md sm:tw-flex">
                <!-- Logo -->
                <div class="tw-flex-shrink-0 tw-py-4">
                    <a href="#">
                        <img class="tw-w-10 tw-h-auto" src="{{ URL::asset('assets/img/sims-logo.png') }}"
                            alt="K-UI" />
                    </a>
                </div>
                <div class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-flex-1 tw-space-y-4">

                    <!-- Homepage button -->
                    <div x-data="{ tooltip: 'Dashboard' }">
                        <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                            class="{{ ($active === "dashboard-main") ? 'tw-bg-sims-400 tw-text-white' : 'tw-text-sims-400' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-400 hover:tw-text-white focus:tw-outline-none">
                            <span class="sr-only">Toggle sidebar</span>
                            <i class="fa-solid fa-house tw-text-xl"></i>
                        </button>
                    </div>


                    <!-- Data Induk button -->
                    <div x-data="{ tooltip: 'Buku Induk' }">
                        <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                            class="{{ ($active === "data-induk") ? 'tw-bg-sims-400 tw-text-white' : 'tw-text-sims-400' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-400 hover:tw-text-white focus:tw-outline-none">
                            <span class="sr-only">Toggle sidebar</span>
                            <i class="fa-sharp fa-regular fa-book-open tw-text-xl"></i>
                        </button>
                    </div>


                    @cannot('wali kelas')
                    <!-- Rekap Siswa button -->
                    <div x-data="{ tooltip: 'Rekap Siswa' }">
                        <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                            class="{{ ($active === "rekap-siswa") ? 'tw-bg-sims-400 tw-text-white' : 'tw-text-sims-400' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-400 hover:tw-text-white focus:tw-outline-none">
                            <span class="sr-only">Toggle sidebar</span>
                            <i class="fa-solid fa-users tw-text-xl"></i>
                        </button>
                    </div>
                    @endcannot

                    <!-- History button -->
                    <div x-data="{ tooltip: 'Histori' }">
                        <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                            class="{{ ($active === "history") ? 'tw-bg-sims-400 tw-text-white' : 'tw-text-sims-400' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-400 hover:tw-text-white focus:tw-outline-none">
                            <span class="sr-only">Toggle sidebar</span>
                            <i class="fa-solid fa-clock-rotate-left tw-text-xl"></i>
                        </button>
                    </div>
                </div>

                <!-- Profil button -->
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

                      <div x-data="{ tooltip: 'Profil' }">
                          <button x-ref="button"
                              x-on:click="toggle()"
                              :aria-expanded="open"
                              :aria-controls="$id('dropdown-button')"
                              type="button" x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                              class="{{ ($active === "data-induk") ? 'tw-bg-sims-400 tw-text-white' : 'tw-text-sims-400' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-400 hover:tw-text-white focus:tw-outline-none">
                              <span class="sr-only">Toggle sidebar</span>
                              <i class="fa-solid fa-circle-user tw-text-3xl"></i>
                          </button>
                      </div>
                      
                      <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                          class="tw-absolute -tw-top-40 tw-mt-2 tw-w-32 tw-rounded-md tw-bg-white tw-shadow-md tw-font-pop">
                          <div class="tw-flex tw-justify-center tw-py-5 tw-font-pop tw-font-bold tw-text-sm tw-text-gray-600">
                              {{ auth()->user()->nama }}
                          </div>
                          <a href="/profile" class="tw-flex tw-items-center tw-gap-2 tw-w-full tw-font-medium tw-text-basic-700 tw-px-4 tw-py-2.5 tw-text-left tw-text-sm hover:tw-bg-sims-400 hover:tw-text-white">
                              Profil
                          </a>
                          <a href="/signout" class="tw-flex tw-items-center tw-text-red-600 tw-gap-2 tw-w-full first-of-type:tw-rounded-t-md last-of-type:tw-rounded-b-md tw-px-4 tw-py-2.5 tw-text-left tw-text-sm hover:tw-bg-sims-400 hover:tw-text-white">
                              <span class="tw-font-medium">Keluar &nbsp;<i class="fa-solid fa-right-from-bracket"></i></span>
                          </a>
                      </div>
                </div>
            </nav>

            <div x-transition:enter="tw-transform tw-transition-transform tw-duration-300"
                x-transition:enter-start="-tw-translate-x-full" x-transition:enter-end="tw-translate-x-0"
                x-transition:leave="tw-transform tw-transition-transform tw-duration-300"
                x-transition:leave-start="tw-translate-x-0" x-transition:leave-end="-tw-translate-x-full"
                x-show="isSidebarOpen"
                class="tw-fixed tw-inset-y-0 tw-left-0 tw-z-10 tw-flex-shrink-0 tw-w-64 tw-bg-white tw-border-r-2 tw-border-indigo-100 tw-shadow-lg sm:tw-left-16 tw-rounded-tr-3xl tw-rounded-br-3xl sm:tw-w-72 lg:tw-static lg:tw-w-64">
                <nav x-show="currentSidebarTab == 'linksTab'" aria-label="Main" class="flex flex-col h-full">
                    <!-- Logo -->
                    <div class="tw-flex tw-items-center tw-justify-center tw-flex-shrink-0 tw-py-10">
                        <a href="#">
                            <img class="tw-w-24 tw-h-auto"
                                src="https://raw.githubusercontent.com/kamona-ui/dashboard-alpine/main/public/assets/images/logo.png"
                                alt="K-UI" />
                        </a>
                    </div>

                    <!-- Links -->
                    <div class="tw-flex-1 tw-px-4 tw-space-y-2 tw-overflow-hidden hover:tw-overflow-auto">
                        <a href="#"
                            class="tw-flex tw-items-center tw-w-full tw-space-x-2 tw-text-white tw-bg-indigo-600 rounded-lg">
                            <span aria-hidden="true" class="tw-p-2 tw-bg-indigo-700 tw-rounded-lg">
                                <svg class="tw-w-6 tw-h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                            </span>
                            <span>Home</span>
                        </a>
                        <a href="#"
                            class="tw-flex tw-items-center tw-space-x-2 tw-text-indigo-600 tw-transition-colors tw-rounded-lg tw-group hover:tw-bg-indigo-600 hover:tw-text-white">
                            <span aria-hidden="true"
                                class="tw-p-2 tw-transition-colors tw-rounded-lg group-hover:tw-bg-indigo-700 group-hover:tw-text-white">
                                <svg class="tw-w-6 tw-h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                            </span>
                            <span>Pages</span>
                        </a>
                    </div>

                    <div class="flex-shrink-0 p-4 mt-10">
                        <div class="hidden p-2 space-y-6 bg-gray-100 rounded-lg md:block">
                            <img aria-hidden="true" class="-mt-10"
                                src="https://raw.githubusercontent.com/kamona-ui/dashboard-alpine/52b4b4abb92ef251f6610be416038b48209d7a81/public/assets/images/undraw_web_developer_p3e5.svg" />
                            <p class="text-sm text-indigo-600">
                                Use our <span class="text-base text-indigo-700er">Premium</span> features now! <br />
                            </p>
                            <button
                                class="w-full px-4 py-2 text-center text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100">
                                Upgrade to pro
                            </button>
                        </div>

                        <button
                            class="w-full px-4 py-2 text-center text-white transition-colors bg-indigo-600 rounded-lg md:hidden hover:bg-indigo-700 focus:outline-none focus:ring focus:ring-indigo-600 focus:ring-offset-2 focus:ring-offset-gray-100">
                            Upgrade to pro
                        </button>
                    </div>
                </nav>

                <section x-show="currentSidebarTab == 'messagesTab'" class="px-4 py-6">
                    <h2 class="text-xl">Messages</h2>
                </section>

                <section x-show="currentSidebarTab == 'notificationsTab'" class="px-4 py-6">
                    <h2 class="text-xl">Notifications</h2>
                </section>
            </div>
        </div>
        <div class="flex flex-col flex-1">
            <header class="relative flex items-center justify-between flex-shrink-0 p-4">

                <!-- Mobile sub header -->
                <div x-transition:enter="transform transition-transform"
                    x-transition:enter-start="translate-y-full opacity-0"
                    x-transition:enter-end="translate-y-0 opacity-100"
                    x-transition:leave="transform transition-transform"
                    x-transition:leave-start="translate-y-0 opacity-100"
                    x-transition:leave-end="translate-y-full opacity-0" x-show="isSubHeaderOpen"
                    @click.away="isSubHeaderOpen = false"
                    class="absolute flex items-center justify-between p-2 bg-white rounded-md shadow-lg sm:hidden top-16 left-5 right-5">
                    <!-- Seetings button -->
                    <button @click="isSettingsPanelOpen = true; isSubHeaderOpen = false"
                        class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
                        <span class="sr-only">Settings</span>
                        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </button>
                    <!-- Messages button -->
                    <button @click="isSidebarOpen = true; currentSidebarTab = 'messagesTab'; isSubHeaderOpen = false"
                        class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
                        <span class="sr-only">Toggle message panel</span>
                        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                    </button>
                    <!-- Notifications button -->
                    <button
                        @click="isSidebarOpen = true; currentSidebarTab = 'notificationsTab'; isSubHeaderOpen = false"
                        class="p-2 text-gray-400 bg-white rounded-lg shadow-md hover:text-gray-600 focus:outline-none focus:ring focus:ring-white focus:ring-offset-gray-100 focus:ring-offset-4">
                        <span class="sr-only">Toggle notifications panel</span>
                        <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </button>
                    <!-- Github link -->
                    <a href="https://github.com/kamona-ui/dashboard-alpine" target="_blank"
                        class="p-2 text-white bg-black rounded-lg shadow-md hover:text-gray-200 focus:outline-none focus:ring focus:ring-black focus:ring-offset-gray-100 focus:ring-offset-2">
                        <span class="sr-only">github link</span>
                        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465 c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338 c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028 c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93 c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021 c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021 c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922 c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479 C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z">
                            </path>
                        </svg>
                    </a>
                </div>
            </header>

            <div class="tw-flex tw-flex-1">
                @yield('content')
            </div>
        </div>
    </div>




    <!-- Author links -->
    <div class="fixed flex items-center space-x-4 bottom-20 right-5 sm:bottom-5">
        <a href="https://twitter.com/ak_kamona" target="_blank"
            class="transition-transform transform hover:scale-125">
            <span class="sr-only">Twitter</span>
            <svg aria-hidden="true" class="w-8 h-8 text-blue-500" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path
                    d="M19.633,7.997c0.013,0.175,0.013,0.349,0.013,0.523c0,5.325-4.053,11.461-11.46,11.461c-2.282,0-4.402-0.661-6.186-1.809 c0.324,0.037,0.636,0.05,0.973,0.05c1.883,0,3.616-0.636,5.001-1.721c-1.771-0.037-3.255-1.197-3.767-2.793 c0.249,0.037,0.499,0.062,0.761,0.062c0.361,0,0.724-0.05,1.061-0.137c-1.847-0.374-3.23-1.995-3.23-3.953v-0.05 c0.537,0.299,1.16,0.486,1.82,0.511C3.534,9.419,2.823,8.184,2.823,6.787c0-0.748,0.199-1.434,0.548-2.032 c1.983,2.443,4.964,4.04,8.306,4.215c-0.062-0.3-0.1-0.611-0.1-0.923c0-2.22,1.796-4.028,4.028-4.028 c1.16,0,2.207,0.486,2.943,1.272c0.91-0.175,1.782-0.512,2.556-0.973c-0.299,0.935-0.936,1.721-1.771,2.22 c0.811-0.088,1.597-0.312,2.319-0.624C21.104,6.712,20.419,7.423,19.633,7.997z">
                </path>
            </svg>
        </a>
        <a href="https://github.com/Kamona-WD" target="_blank"
            class="transition-transform transform hover:scale-125">
            <span class="sr-only">Github</span>
            <svg aria-hidden="true" class="w-8 h-8 text-black" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M12.026,2c-5.509,0-9.974,4.465-9.974,9.974c0,4.406,2.857,8.145,6.821,9.465 c0.499,0.09,0.679-0.217,0.679-0.481c0-0.237-0.008-0.865-0.011-1.696c-2.775,0.602-3.361-1.338-3.361-1.338 c-0.452-1.152-1.107-1.459-1.107-1.459c-0.905-0.619,0.069-0.605,0.069-0.605c1.002,0.07,1.527,1.028,1.527,1.028 c0.89,1.524,2.336,1.084,2.902,0.829c0.091-0.645,0.351-1.085,0.635-1.334c-2.214-0.251-4.542-1.107-4.542-4.93 c0-1.087,0.389-1.979,1.024-2.675c-0.101-0.253-0.446-1.268,0.099-2.64c0,0,0.837-0.269,2.742,1.021 c0.798-0.221,1.649-0.332,2.496-0.336c0.849,0.004,1.701,0.115,2.496,0.336c1.906-1.291,2.742-1.021,2.742-1.021 c0.545,1.372,0.203,2.387,0.099,2.64c0.64,0.696,1.024,1.587,1.024,2.675c0,3.833-2.33,4.675-4.552,4.922 c0.355,0.308,0.675,0.916,0.675,1.846c0,1.334-0.012,2.41-0.012,2.737c0,0.267,0.178,0.577,0.687,0.479 C19.146,20.115,22,16.379,22,11.974C22,6.465,17.535,2,12.026,2z">
                </path>
            </svg>
        </a>
    </div>
</div>
