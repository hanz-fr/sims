@extends('layouts.main-new')

@section('content')

<style>

    .fade-out {
      animation: fadeOut ease 3s;
      -webkit-animation: fadeOut ease 3s;
      -moz-animation: fadeOut ease 3s;
      -o-animation: fadeOut ease 3s;
      -ms-animation: fadeOut ease 3s;
    }
    @keyframes fadeOut {
      0% {
        opacity:1;
      }
      100% {
        opacity:0;
      }
    }
    
    @-moz-keyframes fadeOut {
      0% {
        opacity:1;
      }
      100% {
        opacity:0;
      }
    }
    
    @-webkit-keyframes fadeOut {
      0% {
        opacity:1;
      }
      100% {
        opacity:0;
      }
    }
    
    @-o-keyframes fadeOut {
      0% {
        opacity:1;
      }
      100% {
        opacity:0;
      }
    }
    
    @-ms-keyframes fadeOut {
      0% {
        opacity:1;
      }
      100% {
        opacity:0;
    }
    }
    .loader {
     --height-of-loader: 5px;
     --loader-color: #3894a3;
     width: 150%;
     height: var(--height-of-loader);
     border-radius: 30px;
     background-color: rgba(0,0,0,0.2);
     position: fixed;
    }

    .loader::before {
     content: "";
     position: absolute;
     background: var(--loader-color);
     top: 0;
     left: 0;
     width: 0%;
     height: 100%;
     border-radius: 30px;
     animation: moving 1s ease-in-out infinite;
     ;
    }
    .loader--hidden {
        opacity: 0;
        visibility: hidden;
    }
    

    @keyframes moving {
     50% {
      width: 100%;
     }

     100% {
      width: 0;
      right: 0;
      left: unset;
     }
    }

    @keyframes loading {
        from {
          transform: rotate(0turn);
        }
        to {
          transform: rotate(1turn);
        }
    }
</style>

<div class="tw-flex tw-justify-center">
    <div class="loader" id="loader">
    </div>
</div>

<div class="tw-flex tw-flex-col tw-my-10">

    <div class="sims-heading-2xl tw-flex tw-justify-center">Backup Data</div>

    <!-- spacing -->
    <div class="tw-my-20"></div>

    <div class="tw-flex tw-justify-center">

        <form id="submit-backup" action="/admin/db/backup" method="POST" class="tw-flex tw-flex-col tw-gap-8 tw-w-1/4">
            @csrf
            @method('POST')

            <!-- Jurusan -->
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Database</div>
                <select name="database" id="database" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                    <option value="backend">Main Database</option>
                    <option value="frontend">Auth Database</option>
                </select>
            </div>

            <!-- Tabel -->
            <div class="tw-flex tw-flex-col tw-gap-1">
                <div class="sims-text-gray-sm">Tabel</div>
                <select name="table" id="table" class="tw-border-[1.5px] tw-transition-all tw-duration-500 tw-ease-out tw-font-satoshi tw-font-normal tw-text-gray-500 tw-border-gray-300 tw-py-1 tw-px-5 tw-rounded-xl focus:tw-outline-sims-new-500">
                    <option value="all">-- pilih tabel --</option>
                    <option value="all">Semua Tabel</option>
                    <option value="siswa">siswa</option>
                    <option value="mutasi">mutasi</option>
                    <option value="jurusan">jurusan</option>
                    <option value="history">history</option>
                    <option value="mapel">mapel</option>
                    <option value="mapel_jurusan">mapel_jurusan</option>
                    <option value="nilai_mapel">nilai_mapel</option>
                    <option value="kelas">kelas</option>
                    <option value="raport">raport</option>
                </select>
            </div>

            @if ($message = Session::get('error'))
                <div class="sims-text-gray-xs tw-text-red-500">{{ $message }}</div>
            @endif

            <div class="tw-flex tw-justify-between">
                <div id="info-text" class="sims-heading-sm tw-animate-pulse tw-font-normal tw-my-auto tw-transition-all tw-text-slate-500"></div>
                <button onclick="showLoader()" id="submit-btn" type="submit" class="tw-bg-sims-new-500 tw-transition-all tw-w-fit tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-transition-all tw-rounded-lg tw-px-8 tw-py-2">
                  {{-- IGNORE THE CSS CONFLICT --}}
                  <div class="tw-inline tw-hidden" id="loading-spinner">
                    <svg aria-hidden="true" class="tw-w-5 tw-h-5 tw-my-auto tw-animate-spin tw-mr-2 tw-inline tw-text-slate-400 tw-fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                      <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                  </svg>
                  </div> Backup 
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#database").change(function () {
            var val = $(this).val();
            if (val == "frontend") {
                $("#table").html("<option value='all'>Semua Tabel</option> <option value='users'>users</option> <option value='migrations'>migrations</option> <option value='personal_access_tokens'>personal_access_tokens</option> <option value='password_resets'>password_resets</option> <option value='failed_jobs'>failed_jobs</option>");
            } else if (val == "backend") {
                $("#table").html(`<option value='all'>Semua Tabel</option> <option value="siswa">siswa</option> <option value="mutasi">mutasi</option> <option value="jurusan">jurusan</option> <option value="history">history</option> <option value="mapel">mapel</option> <option value="mapel_jurusan">mapel_jurusan</option> <option value="nilai_mapel">nilai_mapel</option> <option value="kelas">kelas</option> <option value="raport">raport</option>`);
            } else {
                $("#table").html("<option></option>");
            }
        });x
    });

    const info_text = document.getElementById("info-text");
    const loader = document.querySelector(".loader");
    const spinner = document.getElementById("loading-spinner");
    const submit_btn = document.getElementById("submit-btn");

    function showLoader() {
        loader.style.display = 'flex';
        info_text.innerHTML = "Backing up... please wait";
        spinner.classList.remove("tw-hidden");
        

        const timeout = 5000;
        const timer = setTimeout(() => {
            info_text.classList.remove("tw-animate-pulse");
            info_text.innerHTML = "DB has been backed up successfully.";
            loader.style.display = 'none';
            spinner.classList.add("tw-hidden");
            
            setTimeout(() => {
                info_text.classList.add("fade-out");

                setTimeout(() => {
                    info_text.innerHTML = "";
                    info_text.classList.remove("fade-out");
                    info_text.classList.add("tw-animate-pulse");
                }, 3000);
            }, 3000);

        }, timeout);

    }

    $.ajax({
    url: '/admin/db/backup',
    type: 'GET',
    beforeSend: function() {
        $('#loader').show();
    },
    complete: function() {
        $('#loader').hide();
    },
    success: function(data) {
        // do something with the data
    }
});
</script>
@endsection