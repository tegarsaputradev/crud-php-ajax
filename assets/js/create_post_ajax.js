$(document).ready(function () {
  $("#postForm").on("submit", function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "app/controller.php?func=create",
      data: new FormData(this),
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == 1) {
          $("#postForm")[0].reset();
          swal({
            title: "Tersimpan",
            text: "Barang berhasil di tambahkan.",
            icon: "success",
          }).then(function () {
            window.location = "/";
          });
        } else {
          swal({
            title: "",
            text: JSON.stringify(response.message),
            icon: "warning",
            button: "Close",
          });
        }
      },
    });
  });
});
