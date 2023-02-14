<div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" @resize.window="watchScreen()">
    <div class="tw-flex tw-antialiased tw-text-gray-900 tw-bg-gray-100 dark:tw-bg-dark dark:tw-text-light">
        <!-- Sidebar -->
        <aside class="tw-flex tw-sticky tw-top-0 tw-h-screen tw-flex-shrink-0 tw-transition-all">
            <div x-show="isSidebarOpen" @click="isSidebarOpen = false"
                class="tw-fixed tw-inset-0 tw-z-10 tw-bg-black tw-bg-opacity-50 lg:tw-hidden"></div>
            <div x-show="isSidebarOpen" class="tw-fixed tw-inset-y-0 tw-z-10 tw-w-16 tw-bg-white"></div>

            <!-- Left mini bar -->
            <nav aria-label="Options"
                class="tw-z-20 tw-flex-col tw-items-center tw-flex-shrink-0 tw-hidden tw-w-24 tw-py-4 tw-bg-white tw-border-r-2 tw-border-indigo-100 sm:tw-flex">
                <!-- Logo -->
                <div class="tw-flex-shrink-0 tw-py-4">
                    <a href="/">
                        <img class="tw-w-20 tw-h-auto" src="{{ URL::asset('assets/img/sims-new-logo.png') }}"
                            alt="K-UI" />
                    </a>
                </div>
                <div class="tw-flex tw-flex-col tw-justify-center tw-items-center tw-flex-1 tw-space-y-4">

                    <!-- Homepage button -->
                    <div x-data="{ tooltip: 'Dashboard' }">
                        {{-- @if (auth()->user()->is_admin === 1)
                            <a href="/admin">
                        @else
                            <a href="/">
                        @endif --}}
                        <a href="/">
                            <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                                class="{{ ($active === "dashboard-main") ? 'tw-bg-sims-new-500 tw-text-white' : 'tw-text-sims-new-500' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-new-500 hover:tw-text-white focus:tw-outline-none">
                                <i class="fa-solid fa-house tw-text-xl"></i>
                            </button>
                        </a>
                    </div>


                    <!-- Data Induk button -->
                    <div x-data="{ tooltip: 'Buku Induk' }">
                        <a href="/jurusan">
                            <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                                class="{{ ($active === "data-induk") ? 'tw-bg-sims-new-500 tw-text-white' : 'tw-text-sims-new-500' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-new-500 hover:tw-text-white focus:tw-outline-none">
                                <i class="fa-solid fa-book-open-cover tw-text-xl"></i>
                            </button>
                        </a>
                    </div>


                    @cannot('wali-kelas')
                    <!-- Rekap Siswa button -->
                    <div x-data="{ tooltip: 'Rekap Siswa' }">
                        <a href="/rekap-siswa">
                            <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                                class="{{ ($active === "rekap-siswa") ? 'tw-bg-sims-new-500 tw-text-white' : 'tw-text-sims-new-500' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-new-500 hover:tw-text-white focus:tw-outline-none">
                                <i class="fa-solid fa-users tw-text-xl"></i>
                            </button>
                        </a>
                    </div>
                    @endcannot

                    <!-- History button -->
                    <div x-data="{ tooltip: 'Histori' }">
                        <a href="/history">
                            <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                                class="{{ ($active === "history") ? 'tw-bg-sims-new-500 tw-text-white' : 'tw-text-sims-new-500' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-new-500 hover:tw-text-white focus:tw-outline-none">
                                <i class="fa-solid fa-clock-rotate-left tw-text-xl"></i>
                            </button>
                        </a>
                    </div>

                    @if(Auth::user()->is_admin === 1)
                    <div x-data="{ tooltip: 'Admin Dashboard' }">
                        <a href="/admin">
                            <button x-tooltip.placement.right.delay.500-100="tooltip" type="button"
                                class="{{ ($active === "admin-dashboard") ? 'tw-bg-sims-new-500 tw-text-white' : 'tw-text-sims-new-500' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-new-500 hover:tw-text-white focus:tw-outline-none">
                                <i class="fa-solid fa-server tw-text-xl"></i>
                            </button>
                        </a>
                    </div>
                    @endif
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
                              class="{{ ($active === "profile") ? 'tw-bg-sims-new-500 tw-text-white' : 'tw-text-sims-new-500' }} tw-p-5 tw-transition-colors tw-rounded-xl hover:tw-bg-sims-new-500 hover:tw-text-white focus:tw-outline-none">
                              <span class="sr-only">Toggle sidebar</span>
                              <i class="fa-solid fa-circle-user tw-text-3xl"></i>
                          </button>
                      </div>
                      
                      <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                          class="tw-absolute -tw-top-40 tw-mt-2 tw-w-32 tw-rounded-md tw-bg-white tw-shadow-md tw-border-2 tw-border-indigo-100 tw-font-satoshi">
                          <div class="tw-flex tw-justify-center tw-px-4 tw-py-5 tw-font-satoshi tw-font-bold tw-text-sm tw-text-gray-600">
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
            
        </aside>
        <div class="flex flex-col flex-1 tw-bg-white">

            <header>
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
            <!-- Content -->
            <div>
                @yield('content')
            </div>
        </div>
    </div>
</div>
