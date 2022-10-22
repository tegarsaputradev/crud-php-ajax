$(document).ready(function () {
  $(document).on("click", "#btn-delete", function () {
    let id_barang = $(this).attr("data-id");
    let nama_barang = $(this).attr("data-nama");
    let url_foto = $(this).attr("data-img");

    swal({
      title: "Delete " + nama_barang + "",
      text: "Apakah anda yakin untuk menghapus data?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "app/controller.php?func=delete",
          type: "POST",
          dataType: "json",
          data: { id: id_barang, foto: url_foto },

          success: function (response) {
            if (response.status == 1) {
              swal({
                title: "Terhapus",
                text: "Barang berhasil di hapus.",
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
      }
    });
  });
});
