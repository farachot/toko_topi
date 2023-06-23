<h2>Detail Pembelian</h2>
<body>

<section class="konten">
                <div class="container">
               
<?php
$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan
    ON pembelian.id_pelanggan=pelanggan.id_pelanggan
    WHERE pembelian.id_pembelian='$_GET[id]'");
$detail=$ambil->fetch_assoc();
?>




<div class="row">
    <div class="col-md-4">
        <h3>Pembelian</h3>
        <strong>No. Pembelian: <?php echo $detail['id_pembelian']?></strong> <br>
        Tanggal: <?php echo $detail['tanggal_pembelian']?> <br>
        Total : <?php echo number_format($detail['total_pembelian'])?>
    </div>
    <div class="col-md-4">
        <h3>Pelanggan</h3>
        <strong><?php echo $detail['nama_pelanggan']; ?></strong> <br>
        <?php echo $detail['telepon_pelanggan']; ?> <br>
        <?php echo $detail['email_pelanggan']; ?>
    </div>
    <div class="col-md-4">
        <h3>Pengiriman</h3>
        <strong><?php echo $detail['nama_kota'];?></strong> <br>
        Ongkos Kirim Rp. <?php echo number_format($detail['tarif']);?> <br>
        ALamat: <?php echo $detail['alamat_pengiriman'];?>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>no</th>
            <th>nama produk</th>
            <th>harga</th>
            <th>berat</th>
            <th>jumlah</th>
            <th>subberat</th>
            <th>subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor=1;?>
        <?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk WHERE id_pembelian='$_GET[id]'"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()){ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $pecah['nama']; ?></td>
            <td><?php echo number_format($pecah['harga']); ?></td>
            <td><?php echo $pecah['berat']; ?></td>
            <td><?php echo $pecah['jumlah']; ?></td>
            <td><?php echo $pecah['subberat']; ?></td>
            <td><?php echo number_format($pecah['subharga']); ?></td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>

                <p>

                </p>
            </div>
    </div>
</div>
                </div>
</section>
</body>
</html>