$(document).on("click", "#btnModal", function () {
  let id_barang = $(this).data("id");
  let foto_url = "assets/upload_img/" + $(this).data("gambar");
  let nama_barang = $(this).data("nama");
  let harga_beli = $(this).data("beli");
  let harga_jual = $(this).data("jual");
  let stock = $(this).data("stock");

  $("#editModal #id_barang").val(id_barang);
  $("#editModal #nama_barang").val(nama_barang);
  $("#editModal #harga_beli").val(harga_beli);
  $("#editModal #harga_jual").val(harga_jual);
  $("#editModal #stock").val(stock);
  $("#editModal #foto_lama").val($(this).data("gambar"));
  $("#edit_img_preview").attr("src", foto_url);

  // Validasi Foto
  $(document).ready(function () {
    $("#editModal #file_foto").change(function () {
      let foto = this.files[0];
      let size = this.files[0].size;
      let fileType = foto.type;
      let ext = ["image/jpg", "image/png", "image/jpeg"];

      if (!(fileType == ext[0] || fileType == ext[1] || fileType == ext[2])) {
        swal({
          title: "",
          text: "Format foto harus JPG atau PNG.",
          icon: "warning",
          button: "Close",
        });
        $("#editModal #file_foto").val("");
        $("#edit_img_preview").attr("src", foto_url);
        return false;
      } else if (size > 100000) {
        swal({
          title: "",
          text: "Ukuran foto tidak boleh melebihi 100kb.",
          icon: "warning",
          button: "Close",
        });
        $("#editModal #file_foto").val("");
        $("#edit_img_preview").attr("src", foto_url);
        return false;
      }
      if (foto) {
        let reader = new FileReader();
        reader.onload = function (event) {
          console.log(event.target.result);
          $("#edit_img_preview").attr("src", event.target.result);
        };
        reader.readAsDataURL(foto);
      }
    });
  });
});

$(document).ready(function () {
  $("#editForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "app/controller.php?func=update",
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == 1) {
          $("#editForm")[0].reset();
          swal({
            title: "Tersimpan",
            text: "Barang berhasil di update.",
            icon: "success",
          }).then(function () {
            window.location = "/";
          });
        } else {
          pesan = JSON.stringify(response.message);
          swal({
            title: "",
            text: pesan,
            icon: "warning",
            button: "Close",
          });
        }
      },
    });
  });
});
