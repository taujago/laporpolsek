<p>
</p>


<table class='table table-bordered'>
      <tr class="separator"> <td colspan="2"> <b> LAP C</b>  </td> </tr>

     <tr><td width="161">Tanggal LP </td>
            <td width="516"><?php echo $tanggal; ?>  </td>
      <tr><td>Nomor </td>
            <td><?php echo $nomor; ?>        </td>
        

               
   <tr class="separator"> <td colspan="2"> <b> PELAPOR</b>  </td> </tr>
   <tr>
     <td> Nama </td>
            <td><?php echo $pelapor_nama; ?> 
        </td>
      <tr><td> Jk </td>
            <td><?php echo $pelapor_jk; ?> </td>
      <tr><td> Tmp Lahir </td>
            <td><?php echo $pelapor_tmp_lahir; ?> 
        </td>
      <tr><td> Tgl Lahir </td>
            <td><?php echo $pelapor_tgl_lahir; ?> 
        </td>
      <tr><td>Warga Negara </td>
            <td><?php echo $warga_negara; ?> 


        </td>
      <tr><td>Agama </td>
            <td><?php echo $agama; ?> 
        </td>
      <tr><td>Pekerjaan </td>
            <td><?php echo $pekerjaan; ?> 
        </td>
     
      <tr><td> Alamat </td>
            <td><?php echo $pelapor_alamat." ".$desa." ".$kecamatan." ".$kota." ".$provinsi; ?>
        
        </td>
      <tr>
       
            





   <tr class="separator"> <td colspan="2"> <b> PERISTIWA YANG DILAPORKAN </b>  </td> </tr>



      <tr>
            <td>Uraian Kejadian </td>
            <td><?php echo $kejadian_uraian; ?> 
        </td>
      <tr><td>Jam Dilaporkan </td>
            <td><?php echo $kejadian_jam_lapor; ?> 
        </td></tr>


<tr class="separator"> <td colspan="2"> <b> TANGGAL KEJADIAN DAN TEMPAT KEJADIAN </b>  </td> </tr>


 <tr><td>Tanggal Kejadian </td>
            <td><?php echo $kejadian_tanggal; ?> 
        </td>
      <tr><td>Jam Kejadian </td>
            <td><?php echo $kejadian_jam; ?> 
        </td>
      <tr><td>Tempat Kejadian </td>
            <td><?php echo $kejadian_tempat; ?> 
        </td>
        </tr>


 
 <tr class="separator"> <td colspan="2"> <b> PENERIMA LAPORAN </b>  </td> </tr>
<tr>
<td>Nama </td>
            <td><?php echo $pen_lapor_nama; ?> 
        </td>
      <tr><td>Pangkat </td>
            <td><?php echo $penerima_pangkat; ?>  
        </td>
      <tr>
            <td>NRP </td>
            <td><?php echo $pen_lapor_nrp; ?> 
        </td>
     
      <tr><td>Jabatan </td>
            <td><?php echo $pen_lapor_jabatan; ?> 
        </td>
     
       
  
    </table>