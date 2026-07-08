<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> Login - JKBW </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../public/assets/img/favicon.jpg" rel="icon">
  <link href="../public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="../public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../public/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="../public/assets/css/style.css" rel="stylesheet">
  <style>
        .left-section {
            background-color: #FFF;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .right-section {
            background-color: #f0f0f0;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            width: 100%;
            max-width: 350px;
        }
        .logo-img{
          width: 95% !important;
          height: inherit !important;
        }
    </style>
    <!--script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script -->
     <!--lottie-player src="animation.json" background="transparent" speed="1" loop autoplay></lottie-player -->
</head>

<body>
  <main>
    <div class="container-fluid">
          <div class="row">
            <div class="col-md-8 left-section">
              <img src="../public/assets/img/kbwu-logo.jpg" alt="" class="logo-img">
              <!--div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../public/assets/img/kbwu-logo.jpg" alt="">
                  <span class="d-none d-lg-block"> Khalid bin Walid University</span>
                </a>
              </div-->
            </div>
            <div class="col-md-4 right-section d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4 p-20"> <!-- card mb-3 -->
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"> Login to Your Account </h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-2 needs-validation" action="/jkbw/login/authenticate/" method="POST" novalidate>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" maxlenght="8" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit"> Login </button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? 
                        <a href="/jkbw/register/"> Create an account </a>
                      </p>
                    </div>
                  </form>
                </div>
              </div>

              <div class="credits">
                Designed by <a href="#"> WAJID ALI JAVID KHAN </a>
              </div>

            </div>
          </div>
      <script>
      </script>
    </div>
  </main>
</body>

</html>