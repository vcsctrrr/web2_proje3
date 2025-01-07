<?php
// Veritabanı bağlantı bilgileri
$servername = "localhost";
$username = "root"; // Veritabanı kullanıcı adı
$password = "";     // Veritabanı şifresi
$dbname = "iletisim";

// Veritabanına bağlan
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol et
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Formdan gelen verileri al
$adsoyad = $_POST['adsoyad'];
$email = $_POST['email'];
$telefon = $_POST['telefon'];
$mesaj = $_POST['mesaj'];

// Eğer herhangi bir alan boşsa hata mesajı göster
if (empty($adsoyad) || empty($email) || empty($telefon) || empty($mesaj)) {
    echo "<h2>Lütfen tüm alanları doldurun!</h2>";
    echo '<a href="index.html">Geri Dön</a>';
    exit;
}

// Veriyi veritabanına kaydet
$sql = "INSERT INTO iletisim_bilgileri (adsoyad, email, telefon, mesaj) 
        VALUES ('$adsoyad', '$email', '$telefon', '$mesaj')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Bilgiler başarıyla kaydedildi!</h2>";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}

// Bağlantıyı kapat
$conn->close();
?>
