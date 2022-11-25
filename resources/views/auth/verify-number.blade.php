<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
    {{-- css --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/output.css') }}">
    {{-- icon --}}
    <link rel="stylesheet" href="{{ URL::asset('font-awesome/css/all.min.css') }}">
</head>
<body style="background-image: url('{{ URL::asset('assets/img/bg-login.svg') }}');">

  <div class="tw-mx-auto tw-container">
    <div class="tw-bg-white tw-rounded-[50px] tw-flex tw-flex-col tw-justify-center tw-mx-auto tw-my-28 tw-px-20 tw-py-11 tw-top-1/2 tw-w-3/5 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-text-center">\
        <form style="display: block;" id="phone_input">
        <img class="tw-w-1/2 tw-mx-auto" src="{{ URL::asset('assets/img/verify-acc.svg') }}">
          <div class="tw-text-3xl tw-font-bold tw-text-sims-400 tw-font-pop tw-mt-5">Verifikasi Akun Anda</div>
          <div class="tw-text-sm tw-text-[#B8B8B8] tw-font-medium tw-font-pop tw-mt-3">Masukkan nomor telepon anda, kami akan kirimkan kode verifikasi</div>
                <div class="tw-w-1/2 tw-mx-auto tw-mt-5">
                    <input type="text" name="no_telp" id="phone_number" @error('no_telp') is-invalid @enderror placeholder="Nomor Telepon" class="login-input tw-mx-auto">
                    @error('no_telp')
                        <div class="tw-text-sm tw-text-pink-700 tw-mt-1">{{ $message }}</div>
                    @enderror
                </div>
              <button type="button" id="sign-in-button" onclick="sendOTP();" class="tw-font-ubuntu tw-bg-[#90C2C2] tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-6 hover:tw-bg-[#5B9C9C] tw-w-2/4">
                Kirim OTP
            </button>
        </form>  
        <form class="w-full max-w-sm" style="display: none;" id="verification_input">
            <section class="tw-bg-white tw-font-pop tw-rounded-[50px] tw-flex tw-flex-col tw-mx-auto tw-my-28 tw-px-20 tw-py-11 tw-top-1/2 tw-w-3/5 tw-h-3/5 tw-border tw-border-slate-200 tw-shadow-xl tw-text-center">
                <img class="tw-w-1/2 tw-mx-auto" src="{{ URL::asset('assets/img/verif-code.svg') }}" alt="Registration Success">
                <div class="tw-text-3xl tw-font-bold tw-text-sims-400 tw-mt-5">Masukkan Kode Verifikasi</div>
                <div class="tw-text-sm tw-text-basic-300 tw-font-medium tw-mt-3">Mohon cek SMS anda. Kami sudah mengirimkan kode verifikasi</div>
                    <div class="tw-w-1/2 tw-mx-auto tw-mt-5">
                        <input type="text" id="verification_code" placeholder="Kode Verifikasi" class="login-input tw-mx-auto">

                        </div>
                      <button type="button" onclick="verifyOTP();" class="tw-font-ubuntu tw-bg-[#90C2C2] tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-6 hover:tw-bg-[#5B9C9C] tw-w-2/4">
                          Verifikasi Akun
                      </button>
                      <button type="button" onclick="tryAgain();" class="tw-font-ubuntu tw-bg-[#90C2C2] tw-py-3 text-md tw-mx-auto tw-font-medium tw-text-white tw-mt-6 hover:tw-bg-[#5B9C9C] tw-w-2/4">
                        Kirim Ulang
                    </button>
            </section> <!-- card -->
        </form>
    </div> <!-- card -->

  </div> <!-- container -->

    @include('sweetalert::alert')
    <script type="module">

        //import the initializeApp
            import {
                initializeApp
            } from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
        
        //import the getAuth, RecaptchaVerifier & signInWithPhoneNumber
        
          import {
                getAuth,
                RecaptchaVerifier,
                signInWithPhoneNumber
            } from 'https://www.gstatic.com/firebasejs/9.8.3/firebase-auth.js';
        
        
            //replace this section with the firebase config object from your firebase console
            const firebaseConfig = {
            apiKey: "AIzaSyAQSXjcmmy5zmR495fJlZnk8XeyQfOm6Go",
            authDomain: "sims-otp-authentication.firebaseapp.com",
            projectId: "sims-otp-authentication",
            storageBucket: "sims-otp-authentication.appspot.com",
            messagingSenderId: "640288268503",
            appId: "1:640288268503:web:8c49350f26acf3ad019092",
            measurementId: "G-GSZ200NT2R"
            };
        
            //initialize firebase config
            const app = initializeApp(firebaseConfig);
        
        //authenticate app communication to firebase
            const auth = getAuth(app);
        
        //code update at the Recaptcha widget section
        
    </script>
    
    <script>
            //in the script module type the function isn't accessed as usual except with window.sendOTP 
    
        window.sendOTP = function() {
    
        //get the user phone number
        var phoneNumber = $("#phone_number").val();
    
        //get the verified recaptcha
        const appVerifier = window.recaptchaVerifier;
    
        const auth = getAuth();
    
        //pass the auth, phoneNUmber and verifier to the signInWithPhoneNumber method
        signInWithPhoneNumber(auth, phoneNumber, appVerifier)
            .then((confirmationResult) => {
                //store the confirmation result
                window.confirmationResult = confirmationResult;
    
                // alert the user
                alert('Verification code sent!!! Please check your phone.')
    
                //show verification code input section and hide phone number section
                $("#verification_input").show();
                $("#phone_input").hide();
    
            }).catch((error) => {
                //If signInWithPhoneNumber results in an error, reset the reCAPTCHA so the user can try again:
                //reset the recaptcha if there's an error
                window.recaptchaVerifier.render().then(function(widgetId) {
                    grecaptcha.reset(widgetId);
                });
                //you can add the error message to the user interface
                alert(error.message)
            });
        }

        window.verifyOTP = function() {
        //get the verification code entered by the user
        const code = $("#verification_code").val();

        confirmationResult.confirm(code).then((result) => {
            //if successful notify the user
            alert('Code verification successfull!!! Awesome!')
            const user = result.user;

            //hide the verification input section
            $("#verification_input").hide();
            $("#verification_code").val("");
            $("#phone_input").show();

            //you can do other stuff here as per your project requirements

        }).catch((error) => {
            //you can add the error message to the user interface
            alert(error.message)
        });
    }

    window.tryAgain = function() {
        $("#verification_input").hide();
        $("#phone_input").show();
        $("#verification_code").val("");
    }
    
    </script>
    
    <script>
            import { getAuth, RecaptchaVerifier } from "firebase/auth";
    
            const auth = getAuth();
            window.recaptchaVerifier = new RecaptchaVerifier('sign-in-button', {
            'size': 'invisible',
            'callback': (response) => {
                // reCAPTCHA solved, allow signInWithPhoneNumber.
                onSignInSubmit();
            }
            }, auth);
    
    </script>
</body>
</html>
