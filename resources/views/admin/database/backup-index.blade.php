@extends('layouts.main-new')

@section('content')

<style>
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
                    <option value="">-- pilih tabel --</option>
                </select>
            </div>

            @if ($message = Session::get('error'))
                <div class="sims-text-gray-xs tw-text-red-500">{{ $message }}</div>
            @endif

            <div class="tw-flex tw-justify-end">
                <button onclick="showLoader()" type="submit" class="tw-bg-sims-new-500 tw-transition-all tw-w-fit tw-text-white hover:tw-text-white hover:tw-bg-sims-new-700 tw-font-satoshi tw-rounded-lg tw-px-8 tw-py-2"> Backup </button>
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

    const loader = document.querySelector(".loader");

    function showLoader() {
        loader.style.display = 'flex';

        const timeout = 1700;
        const timer = setTimeout(() => {
            loader.style.display = 'none';
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