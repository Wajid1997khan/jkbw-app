<?php require_once __DIR__.'/../../../public/library/language.php'; ?>
<div class="row <?php echo LANG::data('dir'); ?>">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title"> <?php echo LANG::data('AddClass'); ?> </h2>
                <!-- Multi Columns Form -->
                <form class="row g-3 needs-validation was-validated" method="POST" novalidate>
                    <div class="col-md-6">
                        <label for="TxtClassNameEnglish" class="form-label"> <?php echo LANG::data('NameEnglish'); ?> </label>
                        <input type="text" name="ClassNameEnglish" class="form-control" id="TxtClassNameEnglish" 
                               value="<?= htmlspecialchars($classNameEnglish) ?>" required=""/>
                        <div class="valid-feedback">
                            <?php echo LANG::data('Looksgood'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="TxtClassNameUrdu" class="form-label"> <?php echo LANG::data('NameUrdu'); ?> </label>
                        <input type="text" name="ClassNameUrdu" class="form-control" id="TxtClassNameUrdu" 
                               value="<?= htmlspecialchars($classNameUrdu) ?>" required="">
                        <div class="valid-feedback">
                            <?php echo LANG::data('Looksgood'); ?>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn btn-outline-success">
                            <i class="bi bi-telegram"></i> <?php echo LANG::data('Create'); ?>
                        </button>
                        <button type="reset" class="btn btn-outline-primary">
                            <i class="bi bi-app-indicator"></i> <?php echo LANG::data('Reset'); ?>
                        </button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div><!--card-body -->
        </div><!--card -->
    </div><!--columns -->
</div><!-- row -->