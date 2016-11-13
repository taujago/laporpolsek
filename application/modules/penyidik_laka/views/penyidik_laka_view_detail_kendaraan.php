<p>
</p>

<?php 
$n=0;
foreach($rec_kendaraan->result() as $row ) : 
$n++;
?>

<table width="100%"  class='table table-bordered'>


<tr  class="separator">
<td colspan="2" ><b><?php echo $n.". ". $row->no_polisi; ?></b></td>

<tr><td width="30%">Nama Pemilik </td>
<td><?php echo $row->pemilik_nama; ?>        </td>


<tr><td>Alamat Pemilik </td>
<td><?php echo $row->pemilik_alamat." - ".$row->desa." - ".$row->kecamatan." - ".$row->kota." - ".$row->provinsi; ?> </td>
<tr><td>No Stnk </td>
<td><?php echo $row->no_stnk; ?>   </td>
<tr><td>Jenis </td>
<td><?php echo $row->jenis; ?></td>
<tr><td>Model </td>
<td><?php echo $row->model; ?></td>
<tr><td>Merk </td>
<td><?php echo $row->merk; ?></td>
<tr><td>Tipe </td>
<td><?php echo $row->tipe; ?></td>
<tr><td>Tahun Buat </td>
<td><?php echo $row->tahun_buat; ?></td>
<tr><td>Vol Silinder </td>
<td><?php echo $row->vol_silinder; ?></td>
<tr><td>No Rangka </td>
<td><?php echo $row->no_rangka; ?></td>
<tr><td>No Mesin </td>
<td><?php echo $row->no_mesin; ?></td>
<tr><td>Warna Tnkb </td>
<td><?php echo $row->warna_tnkb; ?></td>
<tr><td>Kondisi Ban </td>
<td><?php echo $row->kondisi_ban; ?></td>
</table>



<p>
</p>
<?php 
endforeach;
?>