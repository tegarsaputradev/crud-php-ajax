<?php
include 'database.php';

// Lihat Data Barang
function get_barang($query) {
  global $db_con;
  $result = $db_con->query($query);
  
  $data = [];
  while($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
  return $data;
}

function upload_foto() {
  $nama_file = $_FILES['foto']['name'];
  $tmp_name = $_FILES['foto']['tmp_name'];
  $ext_file = explode('.', $nama_file);
  $ext_file = strtolower(end($ext_file));

  $final_name = uniqid();
  $final_name .= '.';
  $final_name .= $ext_file;

  move_uploaded_file($tmp_name, '../assets/upload_img/'. $final_name);
  return $final_name;

}

function create_barang() {
  
  global $db_con;
    $response = array(
      'status' => 0,
      'message' => 'pengisian form gagal'
    );

    $errorEmpty = false;

    if(isset($_POST['nama_barang']) && isset($_POST['harga_beli']) && isset($_POST['harga_jual']) && isset($_POST['stock'])) {
      $nama_barang = $_POST['nama_barang'];
      $harga_beli = $_POST['harga_beli'];
      $harga_jual = $_POST['harga_jual'];
      $stock = $_POST['stock'];
      
      if(!empty($_FILES['foto']['name']) && !empty($nama_barang) && !empty($harga_beli) && !empty($harga_jual) && !empty($stock)) {
        $check = "SELECT * FROM barang WHERE NamaBarang = '$nama_barang'";
        $result_check = $db_con->query($check);

        if(mysqli_num_rows($result_check) == 1) {
          $response['message'] = 'Nama Barang telah digunakan.';
        }
        elseif(!is_numeric($harga_beli)) {
          $response['message'] = 'Harga beli harus berisikan angka';
        }
        elseif(!is_numeric($harga_jual)) {
          $response['message'] = 'Harga jual harus berisikan angka';
        }
        elseif(!is_numeric($stock)) {
          $response['message'] = 'Stock harus berisikan angka';
        }
        else {
          $foto = upload_foto();
          $query = "INSERT INTO `barang`(`ID`, `Foto`, `NamaBarang`, `HargaBeli`, `HargaJual`, `Stock`) VALUES (null, '$foto', '$nama_barang', '$harga_beli', '$harga_jual', '$stock')";
          
          if($db_con->query($query)) {
            $response['message'] = 'Barang berhasil ditambahkan';
            $response['status'] = 1;
          }
        }
        
        
      }
      else {
        $response['message'] = 'all field required';
      }
    }

    echo json_encode($response);
}

function update_barang() {
  global $db_con;
    $response = array(
      'status' => 0,
      'message' => 'pengisian form gagal'
    );

    $errorEmpty = false;

    if(isset($_POST['nama_barang']) && isset($_POST['harga_beli']) && isset($_POST['harga_jual']) && isset($_POST['stock'])) {
      $id = $_POST['id_barang'];
      $nama_barang = $_POST['nama_barang'];
      $harga_beli  = $_POST['harga_beli'];
      $harga_jual  = $_POST['harga_jual'];
      $stock       = $_POST['stock'];

      
      if(!empty($nama_barang) && !empty($harga_beli) && !empty($harga_jual) && !empty($stock)) {
        $check = "SELECT * FROM barang WHERE NamaBarang = '$nama_barang' AND ID <> $id";
        $result_check = $db_con->query($check);

        if(mysqli_num_rows($result_check) == 1) {
          $response['message'] = 'Nama Barang telah digunakan.';
        }
        elseif(!is_numeric($harga_beli)) {
          $response['message'] = 'Harga beli harus berisikan angka';
        }
        elseif(!is_numeric($harga_jual)) {
          $response['message'] = 'Harga jual harus berisikan angka';
        }
        elseif(!is_numeric($stock)) {
          $response['message'] = 'Stock harus berisikan angka';
        }
        else {
          if($_FILES['foto']['error'] == 4) {
            $foto = $_POST['foto_lama'];
          }
          else {
            $foto = upload_foto();
            unlink('../assets/upload_img/'. $_POST['foto_lama']);
          }
          $query = "UPDATE `barang` SET `Foto`='$foto', `NamaBarang`='$nama_barang',`HargaBeli`='$harga_beli',`HargaJual`='$harga_jual',`Stock`='$stock' WHERE ID=$id";
          
          if($db_con->query($query)) {
            $response['message'] = 'Barang berhasil ditambahkan';
            $response['status'] = 1;
          }
        }
        
        
      }
      else {
        $response['message'] = 'all field required';
      }
    }

    echo json_encode($response);
}

function delete_barang() {

  global $db_con;
  $response = array(
    'status' => 0,
    'message' => 'hapus data gagal.'
  );

  if(isset($_POST['id'])) {
    $id_barang = $_POST['id'];
    $foto = $_POST['foto'];
    $query = "DELETE FROM barang WHERE ID = $id_barang";
    
    unlink('../assets/upload_img/'. $foto);
    if($db_con->query($query)) {
      $response['message'] = 'Barang berhasil dihapus';
      $response['status'] = 1;
    }
  }
  
  echo json_encode($response);
}


$func = @$_GET["func"];

  switch ($func) {
    case "create":
      create_barang();
      break;
    case "update":
      update_barang();
      break;
    case "delete":
      delete_barang();
      break;
    default:
      break;
  }


?>