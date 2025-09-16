<?php
// cek session
if (!empty($_SESSION['admin'])) {
    $query = mysqli_query($config, "SELECT * FROM tbl_instansi");
    while ($data = mysqli_fetch_array($query)) {
        echo '
        <div class="col s12" id="header-instansi" style="margin-bottom:20px;">
            <div style="display:flex; align-items:center; justify-content:center;">
                
                <!-- LOGO -->
                <div style="flex:0 0 auto; margin-right:10px;">
        ';

        if (!empty($data['logo'])) {
            echo '<img class="logo" src="./upload/' . $data['logo'] . '" 
                    style="max-width:200px; height:auto; 
                           background:#fff
                           border-radius:5px; 
                           padding:5px;"/>';
        } else {
            echo '<img class="logo" src="./asset/img/logo.png" 
                    style="max-width:200px; height:auto; 
                           background:#fff; 
                           border-radius:5px; 
                           padding:5px;"/>';
        }

        echo '
                </div>

                <!-- TEKS INSTANSI -->
                <div style="flex:1; text-align:center; line-height:1.4;">
        ';

        if (!empty($data['institusi'])) {
            echo '<h4 style="margin:0; font-weight:bold; font-family:\'Times New Roman\', serif;">' . strtoupper($data['institusi']) . '</h4>';
        } else {
            echo '<h4 style="margin:0; font-weight:bold; font-family:\'Times New Roman\', serif;">PEMERINTAH PROVINSI SULAWESI SELATAN</h4>';
        }

        if (!empty($data['nama'])) {
            echo '<h4 style="margin:0; font-weight:bold; font-family:\'Times New Roman\', serif;">' . strtoupper($data['nama']) . '</h4>';
        } else {
            echo '<h4 style="margin:0; font-weight:bold; font-family:\'Times New Roman\', serif;">DINAS PENDIDIKAN</h4>';
        }

        // Alamat + Laman + Email
        echo '
            <p style="margin:5px 0; font-size:20px; font-family:\'Times New Roman\', serif;">
                Jalan Perintis Kemerdekaan KM. 10 Tamalanrea, Makassar 90245 <br>
                Laman : disdik.sulselprov.go.id | Email : @sulselprov.go.id
            </p>
        ';

        echo '
                </div>
            </div>

            <!-- GARIS PEMISAH -->
            <div style="border-bottom:3px solid black; margin-top:10px;"></div>
            <div style="border-bottom:1px solid black; margin-top:2px;"></div>
        </div>';
    }
} else {
    header("Location: ../");
    die();
}
?>
