<!-- ======= Sidebar ======= -->
<?php require_once __DIR__ . '/../../../public/library/language.php'; ?>
<aside id="sidebar" class="sidebar sidebar-cls-<?php echo strtolower($_COOKIE['_LANG_']); ?>">
    <ul id="sidebar-nav" class="sidebar-nav sidebar-nav-cls-<?php echo strtolower($_COOKIE['_LANG_']); ?>">
      <li class="nav-item">
        <a class="nav-link " href="<?= base_url('dashboard/'); ?>"> <i class="bi bi-grid"></i> <span> <?php echo LANG::data('Dashboard'); ?> </span></a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#TxtCurriculumNavs" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span> <?php echo LANG::data('Curriculum'); ?>  </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="TxtCurriculumNavs" class="nav-content collapse" data-bs-parent="#sidebar-nav">
           <li>
            <a href="<?= base_url('addnewclass/'); ?>">
              <i class="ri-add-box-line"></i><span> <?php echo LANG::data('AddClass'); ?>  </span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('classeslist/'); ?>">
              <i class="ri-building-4-fill"></i><span> <?php echo LANG::data('AllClasses'); ?>  </span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('addnewbook/'); ?>">
              <i class="ri-add-box-line"></i><span> <?php echo LANG::data('AddBook'); ?> </span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('bookslist/'); ?>">
              <i class="ri-book-3-line"></i><span> <?php echo LANG::data('AllBooks'); ?>  </span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#TxtStudentsNavs" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people-fill"></i><span> <?php echo LANG::data('Students'); ?> </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="TxtStudentsNavs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('admission/'); ?>">
              <i class="bi bi-person-plus-fill"></i><span> <?php echo LANG::data('Admission'); ?>  </span>
            </a>
          </li>
		  <li>
            <a href="<?= base_url('admissionlist/'); ?>">
              <i class="bi bi-person-plus-fill"></i><span> <?php echo LANG::data('AdmissionList'); ?>  </span>
            </a>
          </li>
          <li> 
            <a href="<?= base_url('studentslist/'); ?>">
              <i class="bi bi-people-fill"></i><span> <?php echo LANG::data('AllStudents'); ?>  </span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-person-x"></i><span> <?php echo LANG::data('DismissedStudents'); ?>  </span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#TxtResultNavs" data-bs-toggle="collapse" href="#">
          <i class="bi bi-award"></i><span><?php echo LANG::data('Results'); ?> </span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="TxtResultNavs" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= base_url('addnewresult/'); ?>">
              <i class="bi bi-person-plus-fill"></i><span> <?php echo LANG::data('NewResults'); ?> </span>
            </a>
          </li>
          <li>
            <a href="<?= base_url('results/'); ?>">
              <i class="bi bi-award"></i><span> <?php echo LANG::data('AllResults'); ?> </span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->


     <!-- <li class="nav-heading">Pages</li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li>End Profile Page Nav -->

      <!-- li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><End F.A.Q Page Nav -->

      <!--<li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li>End Contact Page Nav -->

      <!--<li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li>End Register Page Nav -->

      <!--<li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li> End Login Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li>End Error 404 Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li>End Blank Page Nav -->
    </ul>
    <script>
      document.addEventListener("DOMContentLoaded", function () {
          let currentUrl = window.location.href;
          let sidebarLinks = document.querySelectorAll("#sidebar-nav a");

          sidebarLinks.forEach(function (link) {
              if (link.href && currentUrl.startsWith(link.href)) {
                  // Make the link active
                  link.classList.add("active");

                  // If it's inside a collapse menu, open that menu
                  let collapseMenu = link.closest(".collapse");
                  if (collapseMenu) {
                      collapseMenu.classList.add("show");

                      let parentToggle = collapseMenu.previousElementSibling;
                      if (parentToggle && parentToggle.tagName === "A") {
                          parentToggle.classList.remove("collapsed");
                          parentToggle.setAttribute("aria-expanded", "true");
                      }
                  }
              }
          });
      });
    </script>
  </aside><!-- End Sidebar-->