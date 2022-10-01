<?php 

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'kpw-wpu');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya satu data
  if (mysqli_num_rows($result) == 1){
    return mysqli_fetch_assoc($result);
  }

  // jika datanya banyak
  $rows=[];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama']);
  $nrp = htmlspecialchars($data['nrp']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO mahasiswa VALUE ('', '$nama', '$nrp', '$email', '$jurusan', '$gambar')";
  $result = mysqli_query($conn, $query);


  // untuk mengetahui error
  echo mysqli_error($conn);
  // ngasitau ada baris yang berubah atau data yang bertambah
  return mysqli_affected_rows($conn);
}