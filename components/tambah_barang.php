<!-- Tombol Tambah Barang -->
<button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#postModal">
    <i class="fa-solid fa-plus me-2"></i>Tambah Barang
</button>

<!-- Modal Start -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form Barang -->
            <form class="g-3 needs-validation" method="post" id="postForm" novalidate>
                <div class="modal-body row" id="modalCreate">
                    <label for="file_foto" class="form-label">Foto</label>
                    <div class="mb-2">
                        <img src="assets/img/default_foto.png" alt="" id="create_img_preview" class="img-preview mb-2">
                        <input type="file" name="foto" class="form-control" id="file_foto" required>
                    </div>
                    <div class="">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" id="nama_barang" required>
                    </div>
                    <div class="">
                        <label for="harga_beli" class="form-label">Harga Beli</label>
                        <input type="text" name="harga_beli" class="form-control" id="harga_beli" required>

                    </div>
                    <div class="">
                        <label for="harga_jual" class="form-label">Harga Jual</label>
                        <input type="text" name="harga_jual" class="form-control" id="harga_jual" required>

                    </div>
                    <div class="">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="text" name="stock" class="form-control" id="stock" required>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <input type="submit" value="Simpan" name="tambah" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>