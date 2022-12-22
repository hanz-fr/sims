<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Email Confirmation</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500&display=swap');

  @media screen {
    @font-face {
      font-family: 'Poppins', sans-serif;
      font-style: normal;
      font-weight: 400;
    }
    @font-face {
      font-family: 'Poppins', sans-serif;
      font-style: normal;
      font-weight: 700;
    }
  }

  body,
  table,
  td,
  a {
    -ms-text-size-adjust: 100%; /* 1 */
    -webkit-text-size-adjust: 100%; /* 2 */
  }

  table,
  td {
    mso-table-rspace: 0pt;
    mso-table-lspace: 0pt;
  }

  img {
    -ms-interpolation-mode: bicubic;
  }

  a[x-apple-data-detectors] {
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    color: inherit !important;
    text-decoration: none !important;
  }

  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }

  body {
    width: 100% !important;
    height: 100% !important;
    padding: 0 !important;
    margin: 0 !important;
  }

  table {
    border-collapse: collapse !important;
  }
  a {
    color: #4d9e9e;
  }
  img {
    height: auto;
    line-height: 100%;
    text-decoration: none;
    border: 0;
    outline: none;
  }
  </style>

</head>
<body style="background-color: #4e9d9d;">

  <!-- start preheader -->
  <div class="preheader" style="display: none; max-width: 0; max-height: 0; overflow: hidden; font-size: 1px; line-height: 1px; color: #fff; opacity: 0;">
    Verifikasi Akun SIMS anda
  </div>
  <!-- end preheader -->

  <!-- start body -->
  <table border="0" cellpadding="0" cellspacing="0" width="100%">

    <!-- start logo -->
    <tr>
      <td align="center" bgcolor="#4e9d9d">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td align="center" valign="top" style="padding: 36px 24px;">
              <a href="{{ route('login') }}" target="_blank" style="display: inline-block;">
                <img src="{{ URL::asset('assets/img/sims-logo.png') }}" alt="Logo" border="0" width="48" style="display: block; width: 48px; max-width: 48px; min-width: 48px;">
              </a>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <!-- end logo -->

    <!-- start hero -->
    <tr>
      <td align="center" bgcolor="#4e9d9d">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
          <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 36px 24px 0; font-family: 'Poppins', sans-serif; border-top: 3px solid #d4dadf;">
              <h1 style="margin: 0; font-size: 32px; font-weight: 600; letter-spacing: -1px; line-height: 48px;">Konfirmasi akun anda</h1>
            </td>
          </tr>
        </table>
      </td>
    </tr>

    <tr>
      <td align="center" bgcolor="#4e9d9d">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">

          <!-- start copy -->
          <tr>
            <td align="center" bgcolor="#ffffff" style="padding: 24px; font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 24px;">
              <p style="margin: 0;">Halo {{ $user->nama }}~! Klik untuk verifikasi akun anda^_^</p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start button -->
          <tr>
            <td align="center" bgcolor="#ffffff">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td align="center" bgcolor="#ffffff" style="padding: 12px;">
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td align="center" bgcolor="#4d9e9e" style="border-radius: 6px;">
                          <a href="{{ route('user.verify', $user->token) }}" target="_blank" style="display: inline-block; padding: 16px 36px; font-family: 'Poppins', sans-serif; font-size: 16px; color: #ffffff; text-decoration: none; border-radius: 6px;">Verifikasi Akun</a>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          <!-- end button -->

          <!-- start copy -->
          <tr style="margin-bottom: 30px">
            <td align="center" bgcolor="#ffffff" style="padding: 30px; font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 24px;">
              <p style="margin: 0;">Atau salin link di bawah ini untuk verifikasi</p> <br>
              <p style="margin: 0;"><a href="{{ route('user.verify', $user->token) }}" target="_blank">{{ route('user.verify', $user->token) }}</a></p>
            </td>
          </tr>
          <!-- end copy -->

          <!-- start copy -->
          <tr>
            <td align="left" bgcolor="#ffffff" style="padding: 30px; font-family: 'Poppins', sans-serif; font-size: 16px; line-height: 24px; border-bottom: 3px solid #d4dadf">
              <p>Terima Kasih ^o^,<br>
                {{ config('app.name') }}</p>
            </td>
          </tr>
          <!-- end copy -->

        </table>
      </td>
    </tr>
    <!-- end copy block -->

  </table>
  <!-- end body -->

</body>
</html>
