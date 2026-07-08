<!-- <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('dashboard/'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>End Page Title -->
<?php 
    require_once __DIR__.'/../../../public/library/language.php';
    require_once 'app/controllers/dashboardcontroller.php';
?>
<section class="section dashboard">
    <div class="row <?php echo LANG::data('dir'); ?>">
        <!-- Main columns -->
        <div class="col-lg-12">
          <div class="row">
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo LANG::data('Classes'); ?> <span>| <?php echo LANG::data('Total'); ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-building-4-line"></i>
                    </div>
                    <div class="<?php echo LANG::data('P3'); ?>">
                      <h6>8</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> 
                      <span class="text-muted small pt-2 ps-1"><?php echo LANG::data('increase'); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo LANG::data('Books'); ?>  <span>| <?php echo LANG::data('ThisYear'); ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="ri-book-3-fill"></i>
                    </div>
                    <div class="<?php echo LANG::data('P3'); ?>">
                      <h6>49</h6>
                      <span class="text-success small pt-1 fw-bold">10%</span> 
                      <span class="text-muted small pt-2 ps-1"><?php echo LANG::data('increase'); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <div class="card-body">
                  <h5 class="card-title"><?php echo LANG::data('Students'); ?> <span>| <?php echo LANG::data('ThisYear'); ?></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="<?php echo LANG::data('P3'); ?>">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span>
                      <span class="text-muted small pt-2 ps-1"><?php echo LANG::data('decrease'); ?></span>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- End Customers Card -->

            <!-- Top 10 Students -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title"> <?php echo LANG::data('Top10Students'); ?> <span> | <?php echo LANG::data('ThisYear'); ?></span></h5>
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col"><?php echo LANG::data('SerialNum'); ?></th>
                        <th scope="col"><?php echo LANG::data('Class'); ?></th>
                        <th scope="col"><?php echo LANG::data('StudentCode'); ?></th>
                        <th scope="col"><?php echo LANG::data('Name'); ?></th>
                        <th scope="col"><?php echo LANG::data('FatherName'); ?></th>
                        <th scope="col"><?php echo LANG::data('Marks'); ?></th>
                        <th scope="col"><?php echo LANG::data('Percentage'); ?></th>
                        <th scope="col"><?php echo LANG::data('Destiny'); ?></th>
                        <th scope="col"><?php echo LANG::data('Quality'); ?></th>
                        <th scope="col"><?php echo LANG::data('Position'); ?></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>2457</td>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>64</td>
                        <td>64</td>
                        <td>64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                        <td>64</td>
                        <td>64</td>
                        <td>64</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- Top 10 Students -->
          </div>
        </div><!-- End main columns -->
    </div>
</section>