<!-- Modal Start -->
<div class="modal fade" id="viewModal<?= $data['ID'] ?>" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form Barang -->
            <div class="modal-body row" id="viewModal">
                <div class="d-flex flex-column align-items-center gap-4">
                    <div class="row detail-img w-75">
                        <img class="detail-img" src="assets/upload_img/<?= $data['Foto'] ?>" alt="">
                    </div>
                    <div class="row bordered w-75">
                        <table class="table table-striped bordered">
                            <tr>
                                <td>Nama Barang</td>
                                <td>:</td>
                                <td><?= $data['NamaBarang'] ?></td>
                            </tr>
                            <tr>
                                <td>Harga Beli</td>
                                <td>:</td>
                                <td><?= 'Rp.' . number_format($data['HargaBeli'],0,',','.') ?></td>
                            </tr>
                            <tr>
                                <td>Harga Jual</td>
                                <td>:</td>
                                <td><?= 'Rp.' . number_format($data['HargaJual'],0,',','.') ?></td>
                            </tr>
                            <tr>
                                <td>Stock</td>
                                <td>:</td>
                                <td><?= $data['Stock'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>