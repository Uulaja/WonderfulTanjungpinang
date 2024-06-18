<?php
class Artikel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahArtikel($judul, $isi, $kategori, $tanggal, $cover = null) {
        try {
            if ($cover) {
                $sql = "INSERT INTO post (judul, isi, kategori, tanggal, cover_url) VALUES (?, ?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$judul, $isi, $kategori, $tanggal, $cover]);
            } else {
                $sql = "INSERT INTO post (judul, isi, kategori, tanggal) VALUES (?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$judul, $isi, $kategori, $tanggal]);
            }

            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
