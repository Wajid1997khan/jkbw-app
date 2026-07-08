<div class="row LNGdir">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">LNGAddBook</h2>
                <!-- Multi Columns Form -->
                <form class="row g-3 needs-validation was-validated" method="POST" novalidate>
                    <div class="col-md-4">
                        <label for="TxtBookNameEnglish" class="form-label">LNGNameEnglish</label>
                        <input type="text" name="BookNameEnglish" class="form-control" id="TxtBookNameEnglish" value="VALBookNameEnglish" required=""/>
                        <div class="valid-feedback">LNGLooksgood</div>
                    </div>
                    <div class="col-md-4">
                        <label for="TxtBookNameUrdu" class="form-label">LNGNameUrdu</label>
                        <input type="text" name="BookNameUrdu" class="form-control" id="TxtBookNameUrdu" value="VALBookNameUrdu" required=""/>
                        <div class="valid-feedback">LNGLooksgood</div>
                    </div>

                    <div class="col-md-4">
                        <label for="TxtClassCode" class="form-label">LNGClass</label>
                        <select class="form-select" name="ClassCode" id="TxtClassCode" required="">OPTClassList</select>
                        <div class="invalid-feedback">LNGPleaseselectavalidClass</div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn btn-outline-success p-2"><i class="bi bi-telegram"></i>LNGCreate</button>
                        <button type="reset" class="btn btn-outline-primary p-2"><i class="bi bi-app-indicator"></i>LNGReset</button>
                    </div>
                </form><!-- End Multi Columns Form -->
            </div><!--card-body -->
        </div><!--card -->
    </div><!--columns -->
</div><!-- row -->