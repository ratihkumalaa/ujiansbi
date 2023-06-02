<style type="text/css">
    .ttd {
        position: absolute;
        z-index: -5;
        width: 324px;
        height: 206px
    }
</style>
<?php
require("../../config/config.default.php");
require("../../config/config.function.php");
require("../../config/functions.crud.php");
(isset($_SESSION['id_pengawas'])) ? $id_pengawas = $_SESSION['id_pengawas'] : $id_pengawas = 0;
($id_pengawas == 0) ? header('location:index.php') : null;
$id_kelas = @$_GET['id_kelas'];

$kelas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas "));
?>
<style>
    * {
        font-size: x-small;
    }

    .box {
        border: 1px solid #000;
        width: 100%;
        height: 150px;
    }

    .ukuran {
        font-size: 11px;
        font-weight: bold;
        text-align: left;



    }

    .ukuran2 {
        font-size: 12px;
    }

    .user {
        font-size: 15px;
    }
</style>

<table width='100%' align='center' cellpadding='3'>
    <tr>
        <?php $siswaQ = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id_kelas"); ?>
        <?php while ($siswa = mysqli_fetch_array($siswaQ)) : ?>
            <?php
            $nopeserta = $siswa['no_peserta'];
            $no++;
            ?>

            <td width='50%'>

                <table style="text-align:left; width:324px ; background:url(kartu.png); background-size:cover; height:206px">
                    <tr>
                        <td style="text-align:left; vertical-align:center; width:90px;" rowspan="8">
                            <?php
                            $foto = str_replace("'", "", $siswa['nama']);
                            echo "<img src='$homeurl/foto/fotosiswa/$siswa[id_kelas]/{$foto}_.jpg' class='img'  style='max-width:60px;margin-left:16px;margin-top:40px' >";
                            ?>
                        </td>
                    </tr>
                    <tr>

                        <td class="ukuran">
                            <table style='margin-top:41px;font-weight:bold;color:#0a3064'>
                                <tr>
                                    <td style='width:70px;'>NISN</td>
                                    <td style='width:1px;'>:</td>
                                    <td style='vertical-align:center'> <span> <?= $siswa['no_peserta'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style='vertical-align:top'>NAMA</td>
                                    <td style='vertical-align:top'>:</td>
                                    <td> <span> <?= $siswa['nama'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style='vertical-align:top'>TGL LAHIR</td>
                                    <td style='vertical-align:top'>:</td>
                                    <td> <span> <?= $siswa['tempat_lahir'] ?></span></td>
                                </tr>
                                <tr>
                                    <td style='vertical-align:top'>ALAMAT</td>
                                    <td style='vertical-align:top'>:</td>
                                    <td> <span> <?= $siswa['alamat'] ?></span></td>
                                </tr>
                            </table>


                        </td>
                    </tr>



                </table>

                <?php if (($no % 10) == 0) : ?>

                <?php endif; ?>
            </td>
            <?php if (($no % 2) == 0) : ?>
    </tr>
    <tr>
    <?php endif; ?>
<?php endwhile; ?>
    </tr>
</table>