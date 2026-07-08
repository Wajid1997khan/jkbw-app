<!-- ======= Header ======= -->
<?php require_once __DIR__ . '/../../../public/library/language.php'; ?>
<header id="header" class="header fixed-top d-flex align-items-center header-cls-<?php  echo strtolower($_COOKIE['_LANG_']); ?>">
  <div class="d-flex align-items-center justify-content-between">
    <a href="/jkbw/dashboard/" class="logo d-flex align-items-center">
      <img src="../public/assets/img/favicon.jpg" alt="">
      <span class="d-none d-lg-block"> <?php echo LANG::data('JKBW'); ?> </span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto header-nav-cls-<?php  echo strtolower($_COOKIE['_LANG_']); ?>">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <i class="ri-flag-fill"></i>
          <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_COOKIE['_LANG_']; ?> </span>
        </a><!-- End Profile Image Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header"><h6> <?php echo LANG::data('ChooseLanguage'); ?> </h6></li>
          <li><hr class="dropdown-divider"></li>

          <li data-lang="EN">
            <a class="dropdown-item d-flex align-items-center" href="#">
              <img src="../public/assets/img/Flag-UnitedStates.png" 
                  style="height:15px;margin:2px;"><span> <?php echo LANG::data('English'); ?>  </span>
            </a>
          </li>
          <li><hr class="dropdown-divider"></li>

          <li data-lang="UR">
            <a class="dropdown-item d-flex align-items-center">
              <img src="../public/assets/img/Flag-Pakistan.png"
                  style="height:15px;margin:2px;"><span> <?php echo LANG::data('Urdu'); ?>  </span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <img src="../public/assets/img/profile-img.png" alt="Profile" class="rounded-circle">
          <span class="d-none d-md-block dropdown-toggle ps-2"> <?php echo $_COOKIE['UserName']; ?> </span>
        </a><!-- End Profile Iamge Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6> WAJID KHAN JK </h6>
            <span> Full Stack Web Developer </span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-person"></i>
              <span>My Profile</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-gear"></i> <span>Account Settings</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-question-circle"></i> <span>Need Help?</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="#">
              <i class="bi bi-box-arrow-right"></i><span>Sign Out</span>
            </a>
          </li>
        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->
    </ul>
  </nav><!-- End Icons Navigation -->
 <script>
    //Function to set cookie (name, value, days to expire)
    function setCookie(name, value, days) {
      const d = new Date();
      d.setTime(d.getTime() + (days*24*60*60*1000));
      let expires = "expires="+ d.toUTCString();
      document.cookie = name + "=" + encodeURIComponent(value) + ";" + expires + ";path=/";
    }

    $(document).ready(function () {
      $(".dropdown-menu li[data-lang]").on("click", function(e) {
        e.preventDefault();
        let selectedLang = $(this).data("lang");
        setCookie("_LANG_", selectedLang, 7);  // Use your _LANG_ cookie name here
        location.reload();
      });
    });
	
	function logoutUser() {
		//Clear cookies client-side (for immediate UI response)
		document.cookie = "UserName=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		document.cookie = "Token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
		document.cookie = "_LANG_=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

		//Redirect to login
		window.location.href = "/mih/login/";
	}
  </script>
</header><!-- End Header -->