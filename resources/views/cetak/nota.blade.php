<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Nota Penjualan</title>
    <link rel="icon" type="image/png" href="{{url('img/logo.png')}}">
    <style>
        .logo {
            margin-top: 15px;
            float: left;
            margin-right: -5px;
            width: 15%;
            padding: 0px;
            text-align: right;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding-left: 5px;
        }

        .judul {
            text-align: center;
        }


        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        .sizeimg {
            width: 60px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }

        hr {
            margin-top: 12%;
            height: 3px;
            background-color: black;
        }

        br {
            margin-bottom: 5px !important;
        }

        h5 {
            line-height: 0.3;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img class="sizeimg" src="img/logo1.png">
        </div>
        <div class="headtext">
            <h2 style="margin:0px;">Toko Keyla</h2>
            <p style="margin:0px;">Jl. Trikora, Kel.Guntung Manggis, Kec. Landasan Ulin, Kota Banjarbaru, Kalimantan Selatan</p>
            <p style="margin:0px;">Telp. 081953000765</p>
        </div>
        <hr>
    </div>

    <div class="container" style="margin-top:10px;">
    <table class='nowrap'>
        <tbody>
          <tr>
            <td>Nama  </td>
            <td> :</td>
            <td> {{Auth()->user()->name}}</td>
          </tr>
          <tr>
            <td>Alamat </td>
            <td> : </td>
            <td> {{Auth()->user()->alamat}}</td>
          </tr>
          <tr>
            <td>Nomor Telepon </td>
            <td> : </td>
            <td>{{Auth()->user()->telepon}}</td>
          </tr>
          <tr>
            <td>Nama Barang </td>
            <td> : </td>
            <td> @foreach ($data1 as $d)
                {{$d->produk->nama_barang}} {{$d->produk->pcs}} {{$d->produk->satuan->nama_satuan}}.
            @endforeach</td>
          </tr>
          <tr>
            <td>Jumlah Item </td>
            <td> : </td>
            <td>
            {{$data1->sum('jumlah_produk')}} Qty
            </td>
          </tr>
          <tr>
            <td>Total Harga </td>
            <td> : </td>
            <td>
                Rp.{{number_format($data1->sum('harga'), 0, ',', '.') }}
            </td>
          </tr>
          <tr>
            <td>Metode Pembayaran </td>
            <td> : </td>
            <td> {{$data->metode_pembayaran}}</td>
          </tr>
          <tr>
            <td>Estimasi </td>
            <td> : </td>
            @if ($data->estimasi == null)
            <td> Menunggu Barang Diserahkan Ke Kurir</td>
            @else
            <td> {{$data->estimasi}}</td>
            @endif
          </tr>
        </tbody>
      </table>
        <br>
      <div id="notices">
        <div class="notice"><b>Note :</b><small> Apabila Barang Rusak Karena Proses Pengiriman diluar tanggung jawab kami.</small></div>
      </div>
    </div>
</body>

</html>
