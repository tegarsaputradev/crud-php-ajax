<!-- Modal Start -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Form Barang -->
            <form class="g-3 needs-validation" method="post" id="editForm" novalidate>
                <div class="modal-body row" id="editModal">
                    <input type="hidden" name="id_barang" id="id_barang">
                    <input type="hidden" name="foto_lama" id="foto_lama">
                    <label for="validationCustom03" class="form-label">Foto</label>
                    <div class="mb-2">
                        <img src="assets/img/default_foto.png" alt="" class="img-preview mb-2" id="edit_img_preview">
                        <input type="file" name="foto" class="form-control" id="file_foto" required>
                    </div>
                    <div class="">
                        <label for="validationCustom03" class="form-label">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="">
                        <label for="validationCustom03" class="form-label">Harga Beli</label>
                        <input type="text" name="harga_beli" id="harga_beli" class="form-control"
                            id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="">
                        <label for="validationCustom03" class="form-label">Harga Jual</label>
                        <input type="text" name="harga_jual" id="harga_jual" class="form-control"
                            id="validationCustom03" required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                    <div class="">
                        <label for="validationCustom03" class="form-label">Stock</label>
                        <input type="text" name="stock" id="stock" class="form-control" id="validationCustom03"
                            required>
                        <div class="invalid-feedback">
                            Please provide a valid city.
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>