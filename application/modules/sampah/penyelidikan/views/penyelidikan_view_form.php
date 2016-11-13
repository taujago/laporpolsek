<form id="formulir" method="post" action="<?php echo site_url("$controller/$action"); ?>">
<table width="100%" border="0" class="table">
 <tr>
            <td width="26%">Tanggal</td>
            <td width="74%"><input type="text" class="form-control tanggal" name="penyelidikan_tgl_daftar" id="penyelidikan_tgl_daftar" placeholder=" Tgl Daftar" value="<?php echo $penyelidikan_tgl_daftar; ?>"  data-date-format="dd-mm-yyyy"  />
        </td>
    <tr>
      <td>Tentang</td>
      <td><input type="text" class="form-control" name="penyelidikan_tentang" id="penyelidikan_tentang" placeholder="Tentang" value="<?php echo $penyelidikan_tentang; ?>"  /></td>
    <tr>
            <td>Tanggal Terima Perintah</td>
            <td><input type="text" class="form-control tanggal" name="penyelidikan_tgl_terima_perintah" id="penyelidikan_tgl_terima_perintah" placeholder="Tgl Terima Perintah" value="<?php echo $penyelidikan_tgl_terima_perintah; ?>"   data-date-format="dd-mm-yyyy" />
        </td>
    <tr>
            <td>Nomor Surat Perintah</td>
            <td><input type="text" class="form-control" name="penyelidikan_nomor" id="penyelidikan_nomor" placeholder="Nomor Surat Perintah" value="<?php echo $penyelidikan_nomor; ?>" />
        </td>
    <tr>
            <td>Tanggal Surat Perintah </td>
            <td><input type="text" class="form-control tanggal" name="penyelidikan_tgl" id="penyelidikan_tgl" placeholder="Tgl.Surat Perintah" value="<?php echo $penyelidikan_tgl; ?>"  data-date-format="dd-mm-yyyy"  />
        </td>
    <tr>
      <td> Hasil Pelaksanaan </td>
            <td><input type="text" class="form-control" name="penyelidikan_hasil_pelaksanaan" id="penyelidikan_hasil_pelaksanaan" placeholder=" Hasil Pelaksanaan" value="<?php echo $penyelidikan_hasil_pelaksanaan; ?>" />
        </td>
    <tr>
            <td>Waktu Pelaporan</td>
            <td><input type="text" class="form-control tanggal" name="penyelidikan_waktu_pelaporan" id="penyelidikan_waktu_pelaporan" placeholder="Waktu Pelaporan" value="<?php echo $penyelidikan_waktu_pelaporan; ?>"  data-date-format="dd-mm-yyyy"  />
        </td>
    <tr>
            <td>Keterangan </td>
            <td><input type="text" class="form-control" name="penyelidikan_keterangan" id="penyelidikan_keterangan" placeholder="Keterangan" value="<?php echo $penyelidikan_keterangan; ?>" />
        </td>
    <tr>
      <td> Isi Perintah </td>
            <td><input type="text" class="form-control" name="penyelidikan_isi_perintah" id="penyelidikan_isi_perintah" placeholder="Isi Perintah" value="<?php echo $penyelidikan_isi_perintah; ?>" />
        </td>
	    <input type="hidden" name="penyelidikan_id" value="<?php echo $penyelidikan_id; ?>" /> 
    
    <tr>
      <td align="left" valign="middle">Dasar Hukum point 3</td>
      <td align="left"><input type="text" class="form-control" name="dasar_point_3" id="dasar_point_3" placeholder="Dasar Hukum Point 3" value="<?php echo $dasar_point_3; ?>"    /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Dasar Hukum Point 7 </td>
      <td align="left"><input type="text" class="form-control" name="dasar_point_7" id="dasar_point_7" placeholder="Dasar Hukum Point 7" value="<?php echo $dasar_point_7; ?>"    /></td>
    </tr>
    <tr>
      <td align="left" valign="middle">Pertimbangan Point a. </td>
      <td align="left"><input type="text" class="form-control" name="pertimbangan_point_a" id="pertimbangan_point_a" placeholder="Pertimbangan Point a." value="<?php echo $pertimbangan_point_a; ?>"    /></td>
    </tr>
    <tr>
    <td align="right" valign="middle">&nbsp;</td>
    <td><input class="btn btn-lg btn-primary" type="submit" name="Submit" id="button" value="Simpan">
      <a class="btn btn-lg btn-danger" href="<?php echo site_url("$controller"); ?>" >Kembali 
        <input type="hidden" name="mode" id="mode" value="<?php echo isset($mode)?$mode:""; ?>">
       </a></td>
  </tr> 
</table>
</form>
<?php $this->load->view($controller."_view_form_js");?>