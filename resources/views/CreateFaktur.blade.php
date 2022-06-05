<!-- Cetak faktur -->

<!-- Generate Nomor Invoice -->

<!-- Kategori Barang -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    div {
  margin-top: 10px;
  margin-bottom: 10px;
  margin-right: 20px;
  margin-left: 20px;
    }
    </style>
</head>
<body>
    <form action="{{route('StoreFaktur')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Faktur Page</h1>
        <div class="mb-3">
          <label for="GenerateInvoice" class="form-label">Generate Invoice</label> 
          <!-- Ngak ngerti gimanaaa -->
          <!-- <input type="text" class="form-control" id="KategoriBarang" name="KategoriBarang"> -->
          @error('KategoriBarang')
              <label for="">{{$message}}</label>
          @enderror
        </div>
        <div class="mb-3">
          <label for="KategoriBarang" class="form-label">Kategori Barang</label>
          <input type="text" class="form-control" id="KategoriBarang" name="KategoriBarang">
          @error('KategoriBarang')
              <label for="">{{$message}}</label>
          @enderror
        </div>
        <div class="mb-3">
            <label for="NamaBarang" class="form-label">Nama Barang</label>
            <input type="text" class="form-control" id="NamaBarang" name="NamaBarang">
            @error('NamaBarang')
              <label for="">{{$message}}</label>
          @enderror
        </div>
        <div class="mb-3">
            <label for="KuantitasBarang" class="form-label">Kuantitas Barang</label>
            <input type="text" class="form-control" id="KuantitasBarang" name="KuantitasBarang">
            @error('KuantitasBarang')
              <label for="">{{$message}}</label>
          @enderror
        </div>
        <div class="mb-3">
            <label for="AlamatPengiriman" class="form-label">Alamat Pengiriman</label>
            <input type="text" class="form-control" id="AlamatPengiriman" name="AlamatPengiriman">
            @error('AlamatPengiriman')
                <label for="">{{$message}}</label>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan Data Faktur</button>
      </form>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
