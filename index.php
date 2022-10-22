<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nutech THT</title>

    <!-- Head Resources -->
    <?php include 'components/resources/header.php'; ?>

</head>

<body>
    <div class="container">

        <h1>Data Barang</h1>
        <hr>
        <!-- Tambah Barang -->
        <?php include 'components/tambah_barang.php'; ?>

        <!-- Tabel Data -->
        <?php include 'components/tabel_data.php'; ?>

    </div>

    <!-- Footer Resources -->
    <?php include 'components/resources/footer.php'; ?>

</body>

<!-- Foto Validasi | Tambah -->
<script>
$(document).ready(function() {

    $("#modalCreate #file_foto").change(function() {
        let foto = this.files[0];
        let size = this.files[0].size;
        let fileType = foto.type;
        let ext = ["image/jpg", "image/png", 'image/jpeg'];

        if (!(fileType == ext[0] || fileType == ext[1] || fileType == ext[2])) {
            swal({
                title: "",
                text: "Format foto harus JPG atau PNG.",
                icon: "warning",
                button: "Close",
            });
            $("#file_foto").val("");
            $('.img-preview').attr('src', 'assets/img/default_foto.png');
            return false;
        } else if (size > 100000) {
            swal({
                title: "",
                text: "Ukuran foto tidak boleh melebihi 100kb.",
                icon: "warning",
                button: "Close",
            });
            $("#file_foto").val("");
            $('.img-preview').attr('src', 'assets/img/default_foto.png');
            return false;
        }
        if (foto) {
            let reader = new FileReader();
            reader.onload = function(event) {
                console.log(event.target.result);
                $('.img-preview').attr('src', event.target.result);
            }
            reader.readAsDataURL(foto);
        }


    });
})
</script>




</html>