<?php
require_once 'app/controllers/bookcontroller.php';
require_once __DIR__.'/../../../public/library/language.php';
?>
<section class="section">
  <div class="row <?php echo LANG::data('dir'); ?>">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title"> <?php echo LANG::data('AllBooks'); ?></h5>
          <!-- Search Input -->
          <div class="mb-3">
            <input type="text" id="searchClassInput" class="form-control" placeholder="<?php echo LANG::data('Enterclassnametofilter'); ?>">
          </div>

          <?php
            $book = new BookController();
            echo $book->display_book_list(); 
          ?>
        </div>
      </div>
    </div>
  </div>
  <style>
    .table-responsive {
      max-height: 400px;
      overflow-y: auto;
    }

    .table thead th {
      position: sticky;
      top: 0;
      background-color: #fff;
      z-index: 2;
    }
  </style>
  <script>
    document.getElementById("searchClassInput").addEventListener("keyup", function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll("#TxtbooksTable tbody tr");

      rows.forEach(row => {
        const className = row.cells[2].textContent.toLowerCase();
        if (className.includes(filter)) {
          row.style.display = "";
        } else {
          row.style.display = "none";
        }
      });
    });
  </script>
</section>