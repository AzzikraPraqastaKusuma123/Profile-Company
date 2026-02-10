<?php
function tanggal_indonesia($date = null) {
    if ($date == null) {
        $date = date('Y-m-d');
    }
    
    $bulan_indonesia = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    
    $pecah_tanggal = explode('-', $date);
    
    return $pecah_tanggal[2] . ' ' . $bulan_indonesia[(int)$pecah_tanggal[1]] . ' ' . $pecah_tanggal[0];
}

function potong_text($text, $limit = 100) {
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit);
        $last_space = strrpos($text, ' ');
        $text = substr($text, 0, $last_space);
        $text = $text . '...';
    }
    
    return $text;
}

function bersihkan_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}

function is_logged_in() {
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    }
    return false;
}

function redirect($url) {
    if (!headers_sent()) {
        header('Location: ' . $url);
        exit();
    } else {
        echo '<script>window.location.href="' . $url . '";</script>';
        exit();
    }
}

function random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $random_string = '';
    
    for ($i = 0; $i < $length; $i++) {
        $random_string .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    return $random_string;
}

function debug($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
?>
