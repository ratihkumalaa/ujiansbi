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

                <table style="text-align:left; width:324px ; background:url(kartub.png); background-size:cover; height:206px">
                    <tr>

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