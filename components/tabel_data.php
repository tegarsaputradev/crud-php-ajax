<?php 
    include 'app/app.php';
    $data_barang = get_barang('select * from barang');
?>
<table class="table table-striped" id="myTable">
    <thead>
        <tr class="table-dark">
            <th class="text-center">No.</th>
            <th class="text-center">Foto Barang</th>
            <th class="text-center">Nama Barang</th>
            <th class="text-center">Harga Beli</th>
            <th class="text-center">Harga Jual</th>
            <th class="text-center">Stock</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php foreach($data_barang as $data): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td>
                <div class="barang">
                    <img src="assets/upload_img/<?= $data['Foto'] ?>" alt="">
                </div>
            </td>
            <td><?= $data['NamaBarang'] ?></td>
            <td><?= 'Rp.' . number_format($data['HargaBeli'],0,',','.') ?></td>
            <td><?= 'Rp.' . number_format($data['HargaJual'],0,',','.') ?></td>
            <td><?= $data['Stock'] ?></td>
            <td>
                <a href="" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#viewModal<?= $data['ID'] ?>"><i class="fa-regular fa-eye me-2"></i>View</a>
                <?php include 'components/lihat_barang.php'; ?>

                <a id="btnModal" data-bs-toggle="modal" data-bs-target="#updateModal" data-id="<?= $data['ID']; ?>"
                    data-gambar="<?= $data['Foto']; ?>" data-nama="<?= $data['NamaBarang']; ?>"
                    data-beli="<?= $data['HargaBeli']; ?>" data-jual="<?= $data['HargaJual']; ?>"
                    data-stock="<?= $data['Stock']; ?>">
                    <button class="btn btn-warning btn-modal">
                        <i class="fa-solid fa-pencil me-2"></i>Edit
                    </button>
                </a>

                <a class="btn btn-danger" id="btn-delete" data-id="<?= $data['ID']; ?>" data-img="<?= $data['Foto']; ?>"
                    data-nama="<?= $data['NamaBarang']; ?>"><i class="fa-solid fa-trash-can me-2"></i>Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php include 'edit_barang.php'; ?>
    </tbody>
</table>