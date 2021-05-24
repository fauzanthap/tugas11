<?php  
include ('conn.php'); //koneksi ke database
require_once("dompdf/autoload.inc.php"); //konek ke file dompdf
use Dompdf\Dompdf;
$dompdf = new Dompdf();
//mengambil data sari database
$query = mysqli_query($koneksi, "SELECT *FROM data_diri"); 
//membuat tabel
$html = '<center><h3>Daftar Nama Pendftar Siswa Baru</h3></center><br><br/><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th>No</th>
<th>Jenis Pendaftaran</th>
<th>Tanggal Masuk</th>
<th>NIS</th>
<th>Nomer Peserta</th>
<th>Pernah PAUD</th>
<th>Pernah TK</th>
<th>No. Seri SKHUN Sebelumnya</th>
<th>No. Seri Ijazah Sebelumnya</th>
<th>Hobi</th>
<th>Cita-cita</th>
<th>Nama Lengkap</th>
<th>Jenis Kelamin</th>
<th>NISN</th>
<th>NIK</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Agama</th>
<th>Berkebutuhan Khusus</th>
<th>Alamat Jalan</th>
<th>RT</th>
<th>RW</th>
<th>Nama Dusun</th>
<th>Nama Kelurahan/Desa</th>
<th>Kecamatan</th>
<th>Kode Pos</th>
<th>Tempat Tinggal</th>
<th>Moda Transportasi</th>
<th>No HP</th>
<th>No Telepon</th>
<th>E-mail Pribadi</th>
<th>Penerima KPS/KKS/PKH/KIP</th>
<th>No. KPS/KKS/PKH/KIP</th>
<th>Kewarganegaraan</th>
<th>Nama Negara</th>
</tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) 
{
	//isi tabel
$html .= "<tr>
<td>".$no."</td>
<td>".$row['jenis_pendaftaran']."</td>
<td>".$row['tanggal_masuk_sekolah']."</td>
<td>".$row['nis']."</td>
<td>".$row['nomer_peserta_ujian']."</td>
<td>".$row['pernah_paud']."</td>
<td>".$row['pernah_tk']."</td>
<td>".$row['skhun']."</td>
<td>".$row['ijazah']."</td>
<td>".$row['hobi']."</td>
<td>".$row['citacita']."</td>
<td>".$row['nama']."</td>
<td>".$row['jenis_kelamin']."</td>
<td>".$row['nisn']."</td>
<td>".$row['nik']."</td>
<td>".$row['tempat_lahir']."</td>
<td>".$row['tanggal_lahir']."</td>
<td>".$row['agama']."</td>
<td>".$row['berkebutuhan_khusus']."</td>
<td>".$row['alamat']."</td>
<td>".$row['rt']."</td>
<td>".$row['rw']."</td>
<td>".$row['dusun']."</td>
<td>".$row['desa']."</td>
<td>".$row['kecamatan']."</td>
<td>".$row['kode_pos']."</td>
<td>".$row['tempat_tinggal']."</td>
<td>".$row['transportasi']."</td>
<td>".$row['hp']."</td>
<td>".$row['email']."</td>
<td>".$row['telp']."</td>
<td>".$row['penerima_kps']."</td>
<td>".$row['no_kps']."</td>
<td>".$row['kewarganegaraan']."</td>
<td>".$row['nama_negara']."</td>
</tr>";
$no++;
}

$html .= "<html>";
$dompdf->loadhtml($html);
//Setting Ukuran dan Orientasi Kertas
$dompdf->setPaper('A1','landscape');
//Rendering dari HTML ke PDF
$dompdf->render();
//Melakukan Output File PDF
$dompdf->stream('Daftar Siswa Baru.pdf');
?>