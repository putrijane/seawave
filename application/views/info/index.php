<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.css') }}">
<!-- Content Header (Page header) -->
<div class="col-sm-12">

</div>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="http://localhost/seawave-main/dashboard">Beranda</a></li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">INFO PRODUK</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <table id="table-data" class="table table-bordered table-striped text-center table-responsive-sm">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>keterangan</th>
                                    <th>gambar</th>
                                    <th>Harga </th>
                                    <!-- <th>Waktu</th>
                                    <th>Jenis Barang</th>
                                    <th>Biaya Perjalanan</th> -->

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ikan Bawal</td>
                                    <td>Ikan bawal air tawar<br>
                                        Berat produk : 1000 gram / 1kg<br>
                                    <td><img src="assets/img/ikan/ikan bawal.jpg" height="80px" width="auto"></td>
                                    <td>Rp45.000</td>
                                    <!-- <td>14:00 - 08:00 WIB</td>
                                    <td>Motor CBR250 (250cc)</td>
                                    <td>Rp. 550.000</td> -->
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Ikan Mujair </td>
                                    <td>IKAN MUJAIR SEGAR<br>
                                        Berat produk : 500gram / 1kg<br>
                                    </td>
                                    <td><img src="assets/img/ikan/ikan mujair.jpg" height="80px" width="auto"></td>
                                    <td>Rp23.000</td>
                                    <!-- <td>14:00 - 11:00 WIB</td>
                                    <td>Mobil Avanza (2500cc)</td>
                                    <td>Rp. 2.500.000</td> -->
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Ikan tongkol</td>
                                    <td>Ikan Tongkol sehar<br>
                                        Berat produk : 500gram / 1kg</td>
                                    <td><img src="assets/img/ikan/Ikan tongkol.jpg" height="80px" width="auto"></td>
                                    <td>Rp20.000</td>
                                    <!-- <td>14:00 - 05:00 WIB</td>
                                    <td>Beras Petani Hebat (100kg)</td>
                                    <td>Rp. 500.000</td> -->
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Ikan Bandeng</td>
                                    <td>Ikan Bandeng Frozen<br>
                                        Berat produk : 900 - 1000 gr
                                    </td>
                                    <td><img src="assets/img/ikan/ikan bandeng.jpg" height="80px" width="auto"></td>
                                    <td>Rp35.000</td>
                                    <!-- <td>14:00 - 05:00 WIB</td>
                                    <td>Motor Supra X 2019 (110cc)</td>
                                    <td>Rp. 350.000</td> -->
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>Udang Galah</td>
                                    <td>Udang Galah Frozen/Fresh<br>
                                        jumlah produk : 21-25 ekor per kg</td>
                                    <td><img src="assets/img/ikan/udang-galah.jpg" height="80px" width="auto"></td>
                                    <td>Rp125.000</td>
                                    <!-- <td>11:00 - 05:00 WIB</td>
                                    <td>Motor Supra X 2008 (110cc)</td>
                                    <td>Rp. 350.000</td> -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
<!-- DataTables -->
<script src="{{ asset('cpanel/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('cpanel/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Page Script -->
<script>
    $(document).ready(function() {
        var table = $('#table-data').DataTable();

        $('.dataTables_filter input').unbind().bind('keyup', function() {
            var colIndex = document.querySelector('#table-data-filter-column').selectedIndex;
            table.column(colIndex).search(this.value).draw();
        });
    });
</script>