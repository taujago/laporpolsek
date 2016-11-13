<p>
</p>
<table class='table table-bordered'>
      <tr class="separator"> <td colspan="2"> <b> LAP A</b>  </td> </tr>

     <tr><td width="161">Tanggal LP </td>
            <td width="516"><?php echo $tanggal; ?>        </td>
      <tr><td>Nomor </td>
        <td><?php echo $nomor; ?> </td>
      <tr><td>Golongan Kejahatan </td>
            <td><?php echo $golongan_kejahatan; ?></td>
      <tr><td>Tempat Kejadian Perkara</td>
            <td><?php echo $jenis_lokasi; ?></td>
      <tr><td>Fungsi Terkait </td>
            <td><?php echo $fungsi; ?></td>
  </tr>

      <tr><td>Tindak Pidana </td>
        <td><!-- <input type="text" class="form-control" name="tindak_pidana" id="tindak_pidana" placeholder="Tindak Pidana" />    --><?php echo $tindak_pidana; ?> </td>
      </tr>

      

<tr> <td colspan="2"> <b> PASAL</b>  </td> </tr>


      <tr> 
            <td colspan="2"><?php $this->load->view($this->controller."_view_detail_pasal"); ?></td> </tr>    




   <tr> <td colspan="2"> <b> PELAPOR</b>  </td> </tr>
      <tr><td> Nama Pelapor</td>
        <td><?php echo $pelapor_nama; ?> </td>
      <tr><td>Pangkat </td>
            <td><?php echo $pelapor_pangkat; ?></td>
      <tr><td>NRP </td>
        <td><?php echo $pelapor_nrp; ?> </td>
      <tr><td>Kesatuan </td>
            <td>
            <!-- <input type="text" class="form-control" name="pelapor_kesatuan" id="pelapor_kesatuan" placeholder="Kesatuan" />      --><?php echo $pelapor_kesatuan; ?></td>       
  <tr><td>Telpon </td>
    <td><?php echo $pelapor_tel; ?></td>
  </tr>


            <tr><td>Subdit  </td>
            <td><?php echo $pelapor_subdit; ?></td>
            </tr>

            <tr><td>Unit  </td>
            <td><?php echo $pelapor_unit;  ?></td>
            </tr>

            <tr><td>Email </td>
            <td><?php echo $pelapor_email; ?></td>
            </tr>


   <tr class="separator"> <td colspan="2"> <b> PERISTIWA YANG TERJADI </b>  </td> </tr>

      <tr><td>Waktu Kejadian</td>
        <td><?php echo $kp_wktu; ?> </td>
      <tr><td>Tanggal Kejadian</td>
        <td><?php echo $kp_tanggal; ?> </td>
      <tr><td>Tempat Kejadian</td>
        <td><?php echo $kp_tempat_kejadian; ?> </td>
  <tr><td>Apa Yang Terjadi </td>
    <td>
            <!-- <input type="text" class="form-control" name="kp_apa_yang_terjadi" id="kp_apa_yang_terjadi" placeholder="Apa Yang Terjadi" />    --><?php echo $kp_apa_yang_terjadi; ?></td>
      <tr><td>Bagaimana Terjadi </td>
        <td><!-- <input type="text" class="form-control" name="kp_bagaimana_terjadi" id="kp_bagaimana_terjadi" placeholder="Bagaimana Terjadi" />    --><?php echo $kp_bagaimana_terjadi; ?> </td>
      <tr><td>Uraian Singkat </td>
        <td><!-- <input type="text" class="form-control" name="kp_uraian_singkat" id="kp_uraian_singkat" placeholder="Uraian Singkat" />    --><?php echo $kp_uraian_singkat; ?> </td>
      <tr><td> Dilaporkan Pada </td>
        <td><?php echo $kp_dilaporkan_pada; ?> </td>
      <tr><td>Jam Dilaporkan </td>
        <td><?php echo $kp_jam_dilaporkan ?> </td>
      <tr><td>Tempat Melaporkan </td>
        <td><?php echo $kp_tempat_melaporkan; ?> </td>
      <tr><td>Motif Kejahatan </td>
            <td><?php echo $motif; ?></td>
      </tr>


      <tr><td>Modus Operandi </td>
        <td><!-- <input type="text" class="form-control" name="kp_uraian_singkat" id="kp_uraian_singkat" placeholder="Uraian Singkat" />    --><?php echo $modus_operandi; ?> </td>




 <!-- BEGIN OF FORM -->
 <tr class="separator"> <td colspan="2"> <b> TERLAPOR/TERSANGKA </b>  </td> </tr>
 <tr> <td colspan="2"><br><br>

<!-- <a href="javascript:tambah_pasal();"> [+] Tambah Pasal  </a> -->

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer"   role="grid">
<thead>
   <tr >

        <th width="10%">NAMA</th>
        <th width="12%">TGL. LAHIR</th>
        <th width="15%">TMP. LAHIR</th>
        <th width="10%">AGAMA</th>
        <th width="10%">SUKU</th>
        <th width="12%">PEKERJAAN</th>
        <th width="30%">ALAMAT</th>
        </tr>
</thead>

<?php foreach($rec_tersangka->result() as $row ):  ?>

 <tr >

        <td><?php echo $row->tersangka_nama; ?></td>
        <td><?php echo $row->tersangka_tmp_lahir; ?></td>
        <td><?php echo $row->tersangka_tgl_lahir; ?></td>
        <td><?php echo $row->agama; ?></td>
        <td><?php echo $row->suku; ?></td>
        <td><?php echo $row->pekerjaan; ?></td>
        <td><?php echo $row->tersangka_alamat. " - ".$row->desa." - ".$row->kecamatan." - ".$row->kota." - ".$row->provinsi; ?></td>
        </tr>

<?php endforeach; ?>

</table>

 </td> </tr>



 <tr class="separator"> <td colspan="2"> <b> SAKSI </b>  </td> </tr>
 <tr> <td colspan="2"><br><br>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer"   role="grid">
<thead>
   <tr >

        <th width="10%">NAMA</th>
        <th width="12%">TGL. LAHIR</th>
        <th width="15%">TMP. LAHIR</th>
        <th width="10%">AGAMA</th>
        <th width="10%">SUKU</th>
        <th width="12%">PEKERJAAN</th>
        <th width="30%">ALAMAT</th>
        </tr>
</thead>

<?php foreach($rec_saksi->result() as $row ):  ?>

 <tr >

        <td><?php echo $row->saksi_nama; ?></td>
        <td><?php echo $row->saksi_tmp_lahir; ?></td>
        <td><?php echo $row->saksi_tgl_lahir; ?></td>
        <td><?php echo $row->agama; ?></td>
        <td><?php echo $row->suku; ?></td>
        <td><?php echo $row->pekerjaan; ?></td>
        <td><?php echo $row->saksi_alamat. " - ".$row->desa." - ".$row->kecamatan." - ".$row->kota." - ".$row->provinsi; ?></td>
        </tr>

<?php endforeach; ?>

</table>

 </td> </tr> 



 <tr class="separator"> <td colspan="2"> <b> KORBAN </b>  </td> </tr>
 <tr> <td colspan="2"><br><br>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer"   role="grid">
<thead>
   <tr >

        <th width="10%">NAMA</th>
        <th width="12%">TGL. LAHIR</th>
        <th width="15%">TMP. LAHIR</th>
        <th width="10%">AGAMA</th>
        <th width="10%">SUKU</th>
        <th width="12%">PEKERJAAN</th>
        <th width="30%">ALAMAT</th>
        </tr>
</thead>

<?php foreach($rec_korban->result() as $row ):  ?>

 <tr >

        <td><?php echo $row->korban_nama; ?></td>
        <td><?php echo $row->korban_tmp_lahir; ?></td>
        <td><?php echo $row->korban_tgl_lahir; ?></td>
        <td><?php echo $row->agama; ?></td>
        <td><?php echo $row->suku; ?></td>
        <td><?php echo $row->pekerjaan; ?></td>
        <td><?php echo $row->korban_alamat. " - ".$row->desa." - ".$row->kecamatan." - ".$row->kota." - ".$row->provinsi; ?></td>
        </tr>

<?php endforeach; ?>


</table>

 </td> </tr> 






 <tr class="separator"> <td colspan="2"> <b> BARANG BUKTI </b>  </td> </tr>
 <tr> <td colspan="2"><br><br>

<table width="100%"  border="0" class="table table-striped 
             table-bordered table-hover dataTable no-footer"   role="grid">
<thead>
   <tr >

        <th width="70%">BARANG BUKTI</th>         
        <th width="10%">JUMLAH</th>     
        <th width="10%">SATUAN</th>     
        </tr>
</thead>


<?php foreach($rec_barbuk->result() as $row ):  ?>

 <tr >

        <td><?php echo $row->barbuk_nama; ?></td>
        <td><?php echo $row->barbuk_jumlah; ?></td>
        <td><?php echo $row->barbuk_satuan; ?></td>
         

<?php endforeach; ?>

</table>

 </td> </tr> 





 <!-- END OF FORM -->








       <tr class="separator"> <td colspan="2"> <b> TINDAKAN YANG DILAKUKAN </b>  </td> </tr>
      <tr><td>Tindakan Yang Dilakukan </td>
        <td><!-- <input type="text" class="form-control" name="tindakan_yang_dilakukan" id="tindakan_yang_dilakukan" placeholder="Tindakan Yang Dilakukan" />   --><?php echo $tindakan_yang_dilakukan; ?> </td>
      </tr>
     <tr class="separator"> <td colspan="2"> <b> PENERIMA LAPORAN </b>  </td> </tr>
      <tr><td>Nama </td>
        <td><?php echo $pen_lapor_nama; ?> </td>
      <tr><td>Pangkat  </td>
              
<td><?php echo $penerima_pangkat; ?></td>
      <tr><td>NRP </td>
        <td><?php echo $pen_lapor_nrp; ?> </td>
      <tr><td>Kesatuan </td>
            <td>
            <!-- <input type="text" class="form-control" name="pen_lapor_kesatuan" id="pen_lapor_kesatuan" placeholder="Kesatuan" />   --><?php echo $pen_lapor_kesatuan; ?></td>
      <tr><td>Jabatan </td>
        <td><?php echo $pen_lapor_jabatan; ?> </td>
      <tr><td>Telpon </td>
        <td><?php echo $pen_lapor_telpon; ?></td>
            </tr>

      <tr class="separator"> <td colspan="2"> <b> MENGETAHUI </b>  </td> </tr>
      <tr><td>Nama </td>
        <td><?php echo $mengetahui_nama; ?> </td>
      <tr><td>Pangkat </td>
            <td><?php echo $mengetahui_pangkat; ?></td>

              </td>
      <tr><td>NRP </td>
        <td><?php echo $mengetahui_nrp; ?> </td>
      <tr><td>Jabatan </td>
        <td><?php echo $mengetahui_jabatan; ?> </td>
          </table>


 
 
