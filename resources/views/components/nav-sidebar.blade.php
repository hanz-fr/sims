<div class="tw-flex" x-data="{ open: false }">
    {{-- sidebar --}}
    <aside x-bind:class="open?' tw-left-0 tw-h-screen tw-sticky tw-w-60 tw-bg-white tw-flex tw-flex-col tw-top-0 tw-bottom-0' : 'tw-sticky tw-inset-0 tw-w-16 tw-bg-white tw-flex tw-flex-col tw-top-0 tw-bottom-0 tw-h-screen'" class="tw-transition-all tw-duration-300">
        <div class="tw-flex tw-flex-row tw-items-center tw-h-10 tw-w-full tw-p-4 tw-mt-4">
            <div x-on:click="open = !open" class="tw-overflow-hidden tw-cursor-pointer">
                <div class="tw-h-10 tw-w-10 tw-grid tw-text-sims tw-font-bold tw-text-2xl"><i class="fa-duotone fa-graduation-cap"></i></div>
              </div>
            <h3 x-show="open" class="tw-text-xl tw-text-sims tw-font-semibold tw-font-pop tw-pt-2 tw-pb-2 tw-ml-1">SIMS</h3>
        </div>
        <div class="tw-mt-10">
            <ul class="list-unstyled">
                <li class="tw-flex tw-mt-2 tw-text-sims tw-cursor-pointer">
                    <a href="/" class="{{ ($active === "dashboard-main") ? 'tw-bg-sims tw-text-white' : '' }} tw-p-5 hover:tw-bg-sims hover:tw-text-white tw-h-16 tw-w-full tw-flex tw-flex-row tw-transition-colors tw-duration-300">
                        <i class="fa-solid fa-house tw-text-xl"></i>
                        <div x-show="open" class="tw-ml-5 tw-text-lg tw-font-medium tw-font-pop">Dashboard</div>
                    </a>
                </li>
                <li class="tw-flex tw-text-sims tw-cursor-pointer">
                    <a href="/jurusan" class="{{ ($active === "data-induk") ? 'tw-bg-sims tw-text-white' : '' }} tw-p-5 hover:tw-bg-sims hover:tw-text-white tw-h-16 tw-w-full tw-flex tw-flex-row tw-transition-colors tw-duration-300">
                        <i class="fa-regular fa-book-open tw-text-xl"></i>
                        <div x-show="open" class="tw-ml-5 tw-text-lg tw-font-medium tw-font-pop">Buku Induk</div>
                    </a>
                </li>
                <li class="tw-flex tw-text-sims tw-cursor-pointer">
                    <a href="/rekap-siswa" class="{{ ($active === "rekap-siswa") ? 'tw-bg-sims tw-text-white' : '' }} tw-p-5 hover:tw-bg-sims hover:tw-text-white tw-h-16 tw-w-full tw-flex tw-flex-row tw-transition-colors tw-duration-300">
                        <i class="fa-solid fa-users tw-text-xl"></i>
                        <div x-show="open" class="tw-ml-5 tw-text-lg tw-font-medium tw-font-pop">Rekap Siswa</div>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    
    {{-- navbar --}}
        <div class="tw-flex-1">
          <div class="tw-flex tw-bg-white tw-shadow-md tw-h-16 tw-justify-between tw-p-3 text-semibold tw-text-white">        
            <div x-show="!open" class="tw-text-sims tw-font-semibold tw-font-pop tw-text-xl tw-ml-7 tw-py-2 tw-animate-pulse"><a href="/" class="hover:tw-text-sims">SIMS</a></div>
            <button class="tw-my-auto tw-transition-all tw-rounded-md  tw-text-gray-500" @click="sidebarOpen = !sidebarOpen">
              <div x-on:click="open = !open" class="tw-overflow-hidden tw-place-items-center tw-cursor-pointer">
                <div x-show="open" class="tw-text-sims tw-transition-all tw-duration-300 tw-font-semibold tw-font-pop tw-text-xl hover:tw-bg-sims/[0.6] hover:tw-text-white tw-rounded-full tw-w-10 tw-h-10 tw-flex tw-items-center tw-justify-center"><i class="fa-solid fa-bars"></i></div>
              </div>
            </button>
            <div class="tw-flex tw-items-center md:tw-order-2">
              <div class="tw-flex tw-justify-center">
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
                      <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')" type="button" class="tw-flex tw-items-center tw-gap-2 tw-bg-white tw-text-sims tw-px-5 tw-font-pop tw-text-sm tw-font-bold">
                      Ibnu Asep bin Budi
                      <i class="fa-solid fa-caret-down"></i>
                      </button>
              
                      <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)" :id="$id('dropdown-button')" style="display: none;"
                          class="tw-absolute tw-left-0 tw-mt-2 tw-w-40 tw-rounded-md tw-bg-white tw-shadow-md tw-font-pop">
                          <a href="/profile" class="tw-flex tw-items-center tw-gap-2 tw-w-full tw-font-medium tw-text-basic first-of-type:tw-rounded-t-md last-of-type:tw-rounded-b-md tw-px-4 tw-py-2.5 tw-text-left tw-text-sm hover:tw-bg-sims hover:tw-text-white">
                              Profil
                          </a>
                          <a href="/logout" class="tw-flex tw-items-center tw-text-red-600 tw-gap-2 tw-w-full first-of-type:tw-rounded-t-md last-of-type:tw-rounded-b-md tw-px-4 tw-py-2.5 tw-text-left tw-text-sm hover:tw-bg-sims hover:tw-text-white">
                              <span class="tw-font-medium">Logout &nbsp;<i class="fa-solid fa-right-from-bracket"></i></span>
                          </a>
                      </div>
                  </div>
              </div>
            <i class="fa-solid fa-user tw-w-10 tw-text-sims tw-ml-6 tw-text-xl tw-mr-7"></i>
        </div>
        </div>
        {{-- main content --}}
        @yield('content')
    </div>  
  </div>