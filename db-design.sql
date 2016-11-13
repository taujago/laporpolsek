create table lap_a ( 

lap_a_id int primary key AUTO_INCREMENT, 
tanggal date,
nomor varchar(100), 
id_gol_kejahatan int,
tindak_pidana varchar(255),
pasal varchar(100),
id_fungsi_terkait int, 

pelapor_nama varchar(255),
pelapor_id_pangkat int, 
pelapor_nrp varchar(20),
pelapor_tel varchar(50),

kp_wktu time, 
kp_tanggal date, 
kp_tempat_kejadian varchar(200),
kp_apa_yang_terjadi varchar(255), 
kp_bagaimana_terjadi varchar(255), 
kp_uraian_singkat varchar(255),
kp_dilaporkan_pada date, 
kp_jam_dilaporkan time, 
kp_tempat_melaporkan varchar(100),
kp_id_motif_kejahatan int, 

tindakan_yang_dilakukan varchar(255), 

pen_lapor_nama varchar(255),
pen_lapor_id_pangkat int,
pen_lapor_nrp varchar(20),
pen_lapor_kesatuan varchar(100),
pen_lapor_jabatan varchar(100),
pen_lapor_telpon varchar(50),

mengetahui_nama varchar(100),
pengetahui_id_pangkat int, 
mengetahui_nrp varchar(40),
mengetahui_jabatan varchar(100)

); 



create table lap_a_tersangka (

id int primary key AUTO_INCREMENT, 
tersangka_nama varchar(100), 
tersangka_jk char(1),
tersangka_id_suku int, 
tersangka_umur int,
tersangka_id_pekerjaan int, 
tersangka_alamat varchar(255), 
lap_a_id int, 
CONSTRAINT fk2lap_a FOREIGN KEY (lap_a_id)
REFERENCES lap_a(lap_a_id)


);



create table lap_a_korban (

id int primary key AUTO_INCREMENT, 
korban_nama varchar(100), 
korban_jk char(1),
korban_id_suku int, 
korban_umur int,
korban_id_pekerjaan int, 
korban_alamat varchar(255), 
lap_a_id int, 
CONSTRAINT fk2lap_ax FOREIGN KEY (lap_a_id)
REFERENCES lap_a(lap_a_id)


);



create table lap_a_saksi (

id int primary key AUTO_INCREMENT, 
saksi_nama varchar(100), 
saksi_jk char(1),
saksi_id_suku int, 
saksi_umur int,
saksi_id_pekerjaan int, 
saksi_alamat varchar(255), 
lap_a_id int, 
CONSTRAINT fk2lap_axs FOREIGN KEY (lap_a_id)
REFERENCES lap_a(lap_a_id)


);



create table lap_a_barbuk (

id int primary key AUTO_INCREMENT, 
barbuk_nama varchar(100), 
lap_a_id int, 
CONSTRAINT fk2lap_axsbar FOREIGN KEY (lap_a_id)
REFERENCES lap_a(lap_a_id)


);



create table lap_b(
lap_b_id int primary key AUTO_INCREMENT, 
tanggal date,
nomor varchar(100), 
id_gol_kejahatan int,
tindak_pidana varchar(255),
pasal varchar(100),
id_fungsi_terkait int, 
pelapor_nama varchar(100),
pelapor_tmp_lahir varchar(100),
pelapor_tgl_lahir date, 
pelapor_jk char(1), 
pelapor_id_pekerjaan int, 
pelapor_alamat varchar(200), 
pelapor_lapor_telpon varchar(30), 
pelapor_id_agama int,
pelapor_id_pendidikan int, 
pelapor_id_warga_negara int, 

kejadian_tanggal date, 
kejadian_jam time, 
kejadian_tempat varchar(200),
kejadian_apa varchar(200),
kejadian_uraian varchar(255),
kejadian_bagaimaan varchar(255),
kejadian_id_motif_kejahatan varchar(255),
kejadian_tanggal_lapor date, 
kejadian_jam_lapor time, 

pen_lapor_nama varchar(255),
pen_lapor_id_pangkat int,
pen_lapor_nrp varchar(20),
pen_lapor_kesatuan varchar(100),
pen_lapor_jabatan varchar(100),
pen_lapor_telpon varchar(50),

mengetahui_nama varchar(100),
pengetahui_id_pangkat int, 
mengetahui_nrp varchar(40),
mengetahui_jabatan varchar(100)

);






create table lap_b_tersangka (

id int primary key AUTO_INCREMENT, 
tersangka_nama varchar(100), 
tersangka_jk char(1),
tersangka_tmp_lahir varchar(200),
tersangka_tgl_lahir date,
tersangka_id_agama int,
tersangka_id_pekerjaan int, 
tersangka_alamat varchar(255), 
lap_b_id int, 
CONSTRAINT fk2lap_b FOREIGN KEY (lap_b_id)
REFERENCES lap_b(lap_b_id)


);



create table lap_b_korban (

id int primary key AUTO_INCREMENT, 
korban_nama varchar(100), 
korban_jk char(1),
korban_id_suku int, 
korban_umur int,
korban_id_pekerjaan int, 
korban_alamat varchar(255), 
lap_b_id int, 
CONSTRAINT fk2lap_bx FOREIGN KEY (lap_b_id)
REFERENCES lap_b(lap_b_id)


);



create table lap_b_saksi (

id int primary key AUTO_INCREMENT, 
saksi_nama varchar(100), 
saksi_jk char(1),
saksi_id_suku int, 
saksi_umur int,
saksi_id_pekerjaan int, 
saksi_alamat varchar(255), 
lap_b_id int, 
CONSTRAINT fk2lap_bxs FOREIGN KEY (lap_b_id)
REFERENCES lap_b(lap_b_id)


);



create table lap_b_barbuk (

id int primary key AUTO_INCREMENT, 
barbuk_nama varchar(100), 
lap_b_id int, 
CONSTRAINT fk2lap_bxsbar FOREIGN KEY (lap_b_id)
REFERENCES lap_b(lap_b_id)


);




create table lap_c(
lap_c_id int primary key AUTO_INCREMENT, 
tanggal date,
nomor varchar(100),  
pelapor_nama varchar(100),
pelapor_tmp_lahir varchar(100),
pelapor_tgl_lahir date, 
pelapor_jk char(1), 
pelapor_id_pekerjaan int, 
pelapor_alamat varchar(200), 
pelapor_lapor_telpon varchar(30), 
pelapor_id_agama int,
pelapor_id_warga_negara int, 


kejadian_uraian varchar(255),
kejadian_jam_lapor time,
kejadian_tanggal date, 

kejadian_jam time, 

kejadian_tempat varchar(200),


 

pen_lapor_nama varchar(255),
pen_lapor_id_pangkat int,
pen_lapor_nrp varchar(20),
pen_lapor_jabatan varchar(100)
 

);




create table lap_d(

lap_d_id int primary key AUTO_INCREMENT, 
tanggal date, 
nomor varchar(50),
kejadian_apa varchar(100),
kejadian_tempat varchar(255),
kejadian_ramai_sepi varchar(100), 
kejadian_kondisi_bangunan varchar(100),
kejadian_tanggal date, 
kejadian_apa_yang_terbakar varchar(200), 
kajadian_bagian_yang_terbakar varchar(100),
kejadian_tempat_timbul_api varchar(200), 
kejadian_cara_meluas_api varchar(200),
kejadian_luas_terbakar varchar(100),
mengatasi_dengan_damkar varchar(100),
mengatasi_cara_biasa varchar(100),
mengatasi_unit_damkar varchar(100),
korban_pemilik_rumah varchar(100),
korban_penghuni_rumah varchar(100),
korban_mati_l int, 
korban_mati_p int,
korban_luka_berat_l int, 
korban_luka_berat_p int, 
korban_luka_ringan_l int, 
korban_luka_ringan_p int, 
korban_sebab_mati varchar(100),
korban_rugi_hewan varchar(100),
korban_seluruh_jumlah varchar(100), 
korban_asuransi varchar(100),
tindakan_polisi varchar(100),
tindakan_petugas varchar(100),
tindakan_memeriksa_saksi varchar(100),
tindakan_lain varchar(100),
tindakan_lain_penampungan_korban varchar(100),
tindakan_lain_bantu_supply_korban varchar(100),
sebab_sengaja varchar(100),
sebab_sengaja_balas_dendam varchar(100), 
sebab_sengaja_menghilangkan_jejak varchar(100),
sebab_sengaja_penyakit varchar(100), 
sebab_lalai_listrik varchar(100),
sebab_lalai_kompor varchar(100), 
sebab_lalai_dapur varchar(100), 
sebab_lalai_barang_mudah_terbakar varchar(100), 
sebab_lalai_lain varchar(100),
sebab_alam_petir varchar(100),
sebab_alam_matahari varchar(100), 
sebab_alam_menyala_sendiri varchar(100), 
sebab_tidak_diketahui varchar(100), 

bukti_bekas_tertinggal varchar(100),
bukti_alat_pembakar varchar(100), 
bukti_alat_mudah_terbakar varchar(100), 
bukti_tidak_sesuai_alat_menyala varchar(100), 
bukti_tidak_sesuai_alat_mudah_terbakar varchar(100),
bukti_tidak_sesuai_kertas varchar(100),
bukti_tidak_sesuai_bhn_kimia varchar(100),
bukti_saksi_pertama varchar(100),

pen_lapor_nama varchar(255),
pen_lapor_id_pangkat int,
pen_lapor_nrp varchar(20),
pen_lapor_jabatan varchar(100)

);




create table lap_laka_lantas ( 

lap_laka_lantas_id int primary key AUTO_INCREMENT, 
nomor varchar(100), 
jam_dilaporkan time,
 

pelapor_nama varchar(255),
pelapor_id_pangkat int, 
pelapor_nrp varchar(20),
pelapor_jabatan varchar(50),
pelapor_kesatuan varchar(50),

kp_wktu time, 
kp_tanggal date, 
kp_tempat_kejadian varchar(200),
kp_apa_yang_terjadi varchar(255), 
kp_keadaan_jalan_cuaca varchar(255),
kp_pengendara_mobil_motor varchar(255), 
kp_kerusakan varchar(255), 
kp_perkiraan_rugi decimal(11,2),
kp_uraian varchar(255),
kp_kesimpulan varchar(255),
kp_tipe_kendaraan varchar(100),
kp_pengedara_helm varchar(100), 
kp_pasal varchar(50),
kp_orang_ditahan varchar(100),



mengetahui_nama varchar(100),
pengetahui_id_pangkat int, 
mengetahui_nrp varchar(40),
mengetahui_jabatan varchar(100)

); 


create table lap_laka_pengemudi(
lap_laka_lantas_pengemudi_id int primary key AUTO_INCREMENT, 
pengemudi_nama varchar(100),
pengemudi_jk char(1), 
pengemudi_umur int,
pengemudi_id_pekerjaan int, 
pengemudi_id_agama int, 
pengemudi_alamat varchar(255),
lap_laka_lantas_id int, 
CONSTRAINT fk2lap_laka FOREIGN KEY (lap_laka_lantas_id)
REFERENCES lap_laka_lantas(lap_laka_lantas_id)
);



create table lap_laka_saksi (

id int primary key AUTO_INCREMENT, 
saksi_nama varchar(100), 
saksi_jk char(1),
saksi_id_suku int, 
saksi_umur int,
saksi_id_pekerjaan int, 
saksi_id_agama int, 
saksi_alamat varchar(255), 
lap_laka_lantas_id int, 
CONSTRAINT fk2lap_lakax FOREIGN KEY (lap_laka_lantas_id)
REFERENCES lap_laka_lantas(lap_laka_lantas_id)
);



create table lap_laka_korban (

id int primary key AUTO_INCREMENT, 
korban_nama varchar(100), 
korban_jk char(1),
korban_id_suku int, 
korban_umur int,
korban_id_pekerjaan int, 
korban_id_agama int, 
korban_alamat varchar(255), 
korban_cidera varchar(255), 
korban_tmp_dirawat varchar(255), 
lap_laka_lantas_id int, 
CONSTRAINT fk2lap_lakaxx FOREIGN KEY (lap_laka_lantas_id)
REFERENCES lap_laka_lantas(lap_laka_lantas_id)
);



create table m_agama(
id_agama int primary key,
agama varchar(50)
); 


insert into m_agama values(1,'Islam');
insert into m_agama values(2,'Kristen');
insert into m_agama values(3,'Katholik');
insert into m_agama values(4,'Hindu');
insert into m_agama values(5,'Budha');
insert into m_agama values(6,'Kong Hu Cu');
insert into m_agama values(7,'Kepercayaan');
insert into m_agama values(8,'Protestan');

create table m_pekerjaan(
id_pekerjaan int,
pekerjaan varchar(255)
);


insert into m_pekerjaan values(1,'SWASTA');
insert into m_pekerjaan values(2,'MAHASISWA / i');
insert into m_pekerjaan values(3,'PENGEMUDI');
insert into m_pekerjaan values(4,'KARYAWAN');
insert into m_pekerjaan values(5,'POLRI');
insert into m_pekerjaan values(6,'BURUH');
insert into m_pekerjaan values(7,'PELAJAR');
insert into m_pekerjaan values(8,'WIRASWASTA');
insert into m_pekerjaan values(9,'TUNA KARYA / PENGANGGURAN');
insert into m_pekerjaan values(11,'TNI AU');
insert into m_pekerjaan values(12,'JURU BAHASA');
insert into m_pekerjaan values(13,'NELAYAN');
insert into m_pekerjaan values(14,'TANI');
insert into m_pekerjaan values(16,'PENGACARA');
insert into m_pekerjaan values(17,'DOSEN');
insert into m_pekerjaan values(18,'GURU');
insert into m_pekerjaan values(19,'SOPIR');
insert into m_pekerjaan values(20,'PNS');
insert into m_pekerjaan values(53,'PENDETA');
insert into m_pekerjaan values(54,'WARTAWAN');
insert into m_pekerjaan values(55,'NARAPIDANA');
insert into m_pekerjaan values(56,'HONORER');
insert into m_pekerjaan values(57,'ABK');
insert into m_pekerjaan values(58,'HAKIM');
insert into m_pekerjaan values(59,'JAKSA');
insert into m_pekerjaan values(60,'PENSIUNAN');
insert into m_pekerjaan values(61,'ADVOKAT');
insert into m_pekerjaan values(62,'DUKUN BERANAK');
insert into m_pekerjaan values(9000,'AKUNTAN');
insert into m_pekerjaan values(9001,'APOTEKER');
insert into m_pekerjaan values(9002,'ATLET / OLAHRAGAWAN');
insert into m_pekerjaan values(9003,'PELAUT');
insert into m_pekerjaan values(9004,'BURUH HARIAN');
insert into m_pekerjaan values(9005,'BIDAN');
insert into m_pekerjaan values(9006,'DOKTER');
insert into m_pekerjaan values(9007,'MUCIKARI');
insert into m_pekerjaan values(9008,'NOTARIS');
insert into m_pekerjaan values(9009,'PARAMEDIS');
insert into m_pekerjaan values(9010,'PARANORMAL');
insert into m_pekerjaan values(9011,'PILOT');
insert into m_pekerjaan values(9012,'SENIMAN ');
insert into m_pekerjaan values(9013,'POLITIKUS');
insert into m_pekerjaan values(9014,'PRAMUGARI');
insert into m_pekerjaan values(10000,'IBU RUMAH TANGGA');
insert into m_pekerjaan values(10003,'PRAMUGARA');
insert into m_pekerjaan values(10004,'PEMULUNG');
insert into m_pekerjaan values(10005,'TUKANG BANGUNAN');
insert into m_pekerjaan values(10006,'TUKANG KAYU');
insert into m_pekerjaan values(10007,'DIREKTUR PERUSAHAAN ');
insert into m_pekerjaan values(10008,'SATPAM / SECURITY PERUSAHAAN');
insert into m_pekerjaan values(10009,'CLEANING SERVICE');
insert into m_pekerjaan values(10010,'PEDAGANG');
insert into m_pekerjaan values(10011,'PENGEMUDI BENTOR');
insert into m_pekerjaan values(10012,'PENSIUNAN PNS');
insert into m_pekerjaan values(10013,'TEKONG');
insert into m_pekerjaan values(10014,'DEBT COLECTOR / PENAGIH HUTANG');
insert into m_pekerjaan values(10015,'PURNAWIRAWAN TNI');
insert into m_pekerjaan values(10016,'PEGAWAI BUMD');
insert into m_pekerjaan values(10017,'PEGAWAI BUMN');
insert into m_pekerjaan values(10018,'KONTRAKTOR');
insert into m_pekerjaan values(10019,'ANGGOTA DPRD');
insert into m_pekerjaan values(10020,'GUBERNUR');
insert into m_pekerjaan values(10021,'WAKIL GUBERNUR');
insert into m_pekerjaan values(10022,'PEDAGANG KAKI LIMA');
insert into m_pekerjaan values(10024,'IBU RUMAH TANGGA');
insert into m_pekerjaan values(10025,'TUKANG OJEK');
insert into m_pekerjaan values(10026,'MEKANIK');
insert into m_pekerjaan values(10029,'PENSIUNAN TNI AD');
insert into m_pekerjaan values(10030,'PENSIUNAN TNI AU');
insert into m_pekerjaan values(10031,'PENSIUNAN TNI AL');
insert into m_pekerjaan values(10032,'REPORTER TV');
insert into m_pekerjaan values(10033,'TUKANG KEBUN');
insert into m_pekerjaan values(10034,'JAGA MALAM');
insert into m_pekerjaan values(10035,'TUKANG LEDENG');
insert into m_pekerjaan values(10036,'PNS POLRI');
insert into m_pekerjaan values(10038,'TOT');
insert into m_pekerjaan values(10040,'PURNAWIRAWAN POLRI');
insert into m_pekerjaan values(10041,'WTS');
insert into m_pekerjaan values(10042,'TKI');
insert into m_pekerjaan values(10043,'TKW');
insert into m_pekerjaan values(10044,'TNI AL');
insert into m_pekerjaan values(10045,'TNI AD');
insert into m_pekerjaan values(10047,'BUPATI');
insert into m_pekerjaan values(10048,'WAKIL BUPATI');
insert into m_pekerjaan values(10049,'DPRD');
insert into m_pekerjaan values(10050,'PERANGKAT DESA');
insert into m_pekerjaan values(10051,'KEPALA DESA');
insert into m_pekerjaan values(10052,'KERNET MOBIL');
insert into m_pekerjaan values(10053,'PORTER PELABUHAN');
insert into m_pekerjaan values(10054,'PORTER BANDARA');
insert into m_pekerjaan values(10055,'SATPAM / SECURITY PERUMAHAN');
insert into m_pekerjaan values(10057,'JURU / TUKANG PARKIR');
insert into m_pekerjaan values(10058,'KOMISARIS PERUSAHAAN');
insert into m_pekerjaan values(10059,'LEGAL MANAGER');
insert into m_pekerjaan values(10060,'TUKANG PANGKAS RAMBUT');
insert into m_pekerjaan values(10061,'ASISTEN RUMAH TANGGA');
insert into m_pekerjaan values(10062,'PEGAWAI BEA dan CUKAI');
insert into m_pekerjaan values(10063,'KETUA KPK');
insert into m_pekerjaan values(10064,'WAKIL KETUA KPK');
insert into m_pekerjaan values(10065,'MONTIR MOBIL ');
insert into m_pekerjaan values(10066,'MONTIR MOTOR');
insert into m_pekerjaan values(10067,'PEMBERDAYAAN PEREMPUAN');
insert into m_pekerjaan values(10069,'TUKANG PIJIT');
insert into m_pekerjaan values(10070,'SOPIR');
insert into m_pekerjaan values(10071,'ULAMA / USTAZD');
insert into m_pekerjaan values(10072,'USTAZAH');
insert into m_pekerjaan values(10073,'TEKHNISI ELEKTRONIK');
insert into m_pekerjaan values(10074,'swasta');
insert into m_pekerjaan values(10076,'PENAMBANG');

create table m_pangkat ( 
id_pangkat int primary key,
pangkat varchar(100)
);


insert into m_pangkat values(1,'BRIPDA');
insert into m_pangkat values(2,'BRIPTU');
insert into m_pangkat values(3,'BRIGPOL');
insert into m_pangkat values(4,'BRIPKA');
insert into m_pangkat values(5,'AIPDA');
insert into m_pangkat values(6,'AIPTU');
insert into m_pangkat values(7,'IPDA');
insert into m_pangkat values(8,'IPTU');
insert into m_pangkat values(9,'AKP');
insert into m_pangkat values(10,'KOMPOL');
insert into m_pangkat values(11,'AKBP');
insert into m_pangkat values(12,'KOMBES');


create table m_suku (
id_suku int primary key, 
suku varchar(100)
);

insert into m_suku values(1,'Jawa');
insert into m_suku values(2,'Madura');
insert into m_suku values(3,'Sunda');
insert into m_suku values(4,'Bugis');
insert into m_suku values(5,'Batak');
insert into m_suku values(6,'Minangkabau');
insert into m_suku values(7,'Aceh');
insert into m_suku values(8,'Banjar');
insert into m_suku values(9,'Sumsel');
insert into m_suku values(10,'Papua');
insert into m_suku values(11,'Dayak');
insert into m_suku values(12,'Melayu');
insert into m_suku values(13,'Tionghoa');
insert into m_suku values(14,'WNA');

create table m_satuan (
id_satuan int primary key,
satuan varchar(255)

);


insert into m_satuan values (1,'Sat Krimsus');
insert into m_satuan values (2,'Sat Krimum');
insert into m_satuan values (3,'Sat Krim NKB');
insert into m_satuan values (4,'Sat Polair');
insert into m_satuan values (5,'Sat Sabhara');
insert into m_satuan values (6,'Sat Lantas');


create table m_kategori_tempat (

id_kategori_tempat int primary key AUTO_INCREMENT, 
kategori_tempat varchar(200)

);

insert into m_kategori_tempat values ('5','PEMUKIMAN');
insert into m_kategori_tempat values ('9','PERKANTORAN');
insert into m_kategori_tempat values ('2','PASAR');
insert into m_kategori_tempat values ('4','JALAN UMUM');
insert into m_kategori_tempat values ('13','TERMINAL ');
insert into m_kategori_tempat values ('14','PELABUHAN');
insert into m_kategori_tempat values ('15','BANDARA');
insert into m_kategori_tempat values ('16','STASIUN');
insert into m_kategori_tempat values ('17','SPBU');
insert into m_kategori_tempat values ('18','BANK');
insert into m_kategori_tempat values ('1','PERTOKOAN');
insert into m_kategori_tempat values ('19','PEGADAIAN');
insert into m_kategori_tempat values ('20','PERAIRAN');
insert into m_kategori_tempat values ('21','PERKEBUNAN');
insert into m_kategori_tempat values ('22','PERTAMBANGAN');
insert into m_kategori_tempat values ('23','PERSAWAHAN');
insert into m_kategori_tempat values ('24','HUTAN ');
insert into m_kategori_tempat values ('3','LEMBAGA PENDIDIKAN');
insert into m_kategori_tempat values ('25','MAKO POLRI');
insert into m_kategori_tempat values ('6','RUMAH IBADAH');
insert into m_kategori_tempat values ('26','RUMAH VIP/VVIP');
insert into m_kategori_tempat values ('27','KANTOR PEMERINTAHAN');
insert into m_kategori_tempat values ('28','KEDUTAAN BESAR/KONSULAT JENDERAL');
insert into m_kategori_tempat values ('29','ISTANA NEGARA');
insert into m_kategori_tempat values ('30','DPR/DPRD');
insert into m_kategori_tempat values ('31','DEPO PERTAMINA');
insert into m_kategori_tempat values ('32','JALAN TOL');
insert into m_kategori_tempat values ('8','PERPARKIRAN');
insert into m_kategori_tempat values ('12','TEMPAT HIBURAN');
insert into m_kategori_tempat values ('7','HOTEL');
insert into m_kategori_tempat values ('10','OBYEK WISATA');
insert into m_kategori_tempat values ('11','ANGKUTAN UMUM (BUS/KERETA/KAPAL LAUT DAN PESAWAT)');

