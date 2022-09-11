<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Success</title>
  {{-- font --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
  {{-- css --}}
  <link rel="stylesheet" href="assets/output.css">
  {{-- icon --}}
  <link rel="stylesheet" href="font-awesome/css/all.min.css">
</head>
<body style="background-image: url('assets/img/bg-login.svg');">
  <div class="mx-auto container">
    <div class="bg-white rounded-[50px] flex flex-col mx-auto my-28 px-20 py-11 top-1/2 w-3/5 h-3/5 border border-slate-200 shadow-xl text-center">
        <img class="w-1/2 mx-auto" src="assets/img/regist-sc.svg" alt="" srcset="">
          <div class="text-3xl font-bold text-sims font-pop mt-5">Registration Success</div>
          <div class="text-sm text-[#B8B8B8] font-medium font-pop mt-3">Please login using your newly created account.</div>
        <button class="font-ubuntu bg-[#90C2C2] py-3 text-md mx-auto font-medium text-white mt-9 hover:bg-[#5B9C9C] w-2/4">
          <a href="/login">Okay</a>
        </button>
    </div> <!-- card -->
  </div> <!-- container -->
</body>
</html>