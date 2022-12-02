import {
  initializeApp
} from "https://www.gstatic.com/firebasejs/9.8.3/firebase-app.js";
  

import {
  getAuth,
  RecaptchaVerifier,
  signInWithPhoneNumber
} from 'https://www.gstatic.com/firebasejs/9.8.3/firebase-auth.js';


const firebaseConfig = {
  apiKey: "AIzaSyAQSXjcmmy5zmR495fJlZnk8XeyQfOm6Go",
  authDomain: "127.0.0.1",
  projectId: "sims-otp-authentication",
  storageBucket: "sims-otp-authentication.appspot.com",
  messagingSenderId: "640288268503",
  appId: "1:640288268503:web:8c49350f26acf3ad019092",
  measurementId: "G-GSZ200NT2R"
};


const app = initializeApp(firebaseConfig);

const auth = getAuth(app);

// rechaptcha
window.recaptchaVerifier = new RecaptchaVerifier("sign-in-button", {
  'callback': (response) => {
    console.log("prepared phone auth process");
  }
}, auth);


// send OTP
window.phoneSendAuth = function() {
  var phoneNumber = $("#number").val();
  const appVerifier = window.recaptchaVerifier;
  const auth = getAuth();
  signInWithPhoneNumber(auth, phoneNumber, appVerifier)
      .then((confirmationResult) => {
          window.confirmationResult = confirmationResult;
          alert('bisa cuy')
          // $("#phone_input").hide();
          // $("#verification_input").show();
      }).catch((error) => {
          alert(error.message)
      });
}


// verify OTP
function verify() {
  const code = $("#verificationCode").val();

  confirmationResult.confirm(code).then((result) => {
      const user = result.user;
      window.location = "/login";
  }).catch((error) => {
      alert(error.message)
  });
}

// try again
function tryAgain() {
  // $("#verification_input").hide();
  // $("#phone_input").show();
  // $("#verificationCode").val("");
}