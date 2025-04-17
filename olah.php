<!doctype html>
<html lang="en" dir="">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Go Laundry</title>
  </head>

  <body>
    <div class="container">
    <figure class="text-center mt-3">
  <blockquote class="blockquote">
    <p>Go Laundry</p>
  </blockquote>
  <figcaption class="blockquote-footer">
        <cite title="Source Title">Kelola Data Laundry</cite>
  </figcaption>
</figure>

<form action="proses.php" method="post">

  <div class="mb-3 row">
    <label for="Tanggal Order" class="col-sm-2 col-form-label">Tanggal Order</label>
    <div class="col-sm-10">
      <input type="varchart" class="form-control" id="Tanggal Order" name="Tanggal Order">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Nama Pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Nama Pelanggan" name="Nama Pelanggan">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Waktu Kerja" class="col-sm-2 col-form-label">Waktu Kerja</label>
    <div class="col-sm-10">
      <input type="varchart" class="form-control" id="Waktu Kerja" name="Waktu Kerja">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Berat(Kg)" class="col-sm-2 col-form-label">Berat(Kg)</label>
    <div class="col-sm-10">
      <input type="varchart" class="form-control" id="Berat(Kg)" name="Berat(Kg)">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="Pilihan" class="col-sm-2 col-form-label">Pilihan</label>
    <div class="col-sm-10">
     <select name="pilihan" id="pilihan" class="form-control">
     <option value="Kilat">Cuci Komplit Kilat</option>
     <option value="Reguler">Cuci Komplit Reguler</option>
</select>
        </div>
  </div>
  <div class="mb-3 row">
    <?php
    if (isset($_GET['edit'])) {
      echo "<button type='submit' class='btn btn-primary' name='btnProses' value='edit'>Simpan Perubahan</button>";
    } else {
      echo "<button type='submit' class='btn btn-primary' name='btnProses' value='tambah'>Tambah Pesanan</button>";
    }

    ?>
 
  </div>
  </form>


    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  </body>
</html>
