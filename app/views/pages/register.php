<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title> Register - JKBW </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../public/assets/img/favicon.jpg" rel="icon">
  <link href="../public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link href="../public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../public/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../public/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../public/assets/css/style.css" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <!--div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="../public/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block"> Shabaqadar Tanzim</span>
                </a>
              </div> End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4"> New User Registration </h5>
                    <p class="text-center small">Enter your User details to create account</p>
                  </div>

                  <form class="row g-3 needs-validation" action="/jkbw/registeration/" method="POST" novalidate>
                    <div class="col-12">
                      <label for="fullname" class="form-label">Full Name *: </label>
                      <input type="text" name="fullname" class="form-control" id="txtfullname" required />
                      <div class="invalid-feedback">Please, enter full name!</div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label"> Email </label>
                      <input type="email" name="email" class="form-control" id="txtemail">
                      <div class="invalid-feedback">Please enter a valid email address! </div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label"> Reference Number </label>
                      <input type="text" name="referencenumber" class="form-control" id="Txtreferencenumber"/>
                      <div class="invalid-feedback">Please enter a valid referenceid number!</div>
                    </div>

                    <div class="col-12">
                        <select name="UserType" class="form-select" aria-label="Default select example">
                            <option value=""> - Select User Type - </option>
                            <option value="Admin"> Admin </option>
                            <option value="Teacher"> Teacher </option>
                            <option value="Student"> Student </option>
                        </select>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label"> Username *: </label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please choose a username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label"> Password *:</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the 
                            <a href="#">terms and conditions</a>
                        </label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Already have an account? <a href="jkbw/login">Log in</a></p>
                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">Designed by <a href=""> WAJID ALI JAVID KHAN </a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->
</body>
</html>