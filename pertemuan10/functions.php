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