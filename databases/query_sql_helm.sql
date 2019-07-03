SELECT * FROM produk;
SELECT * FROM ukuran_helm;
SELECT * FROM USER;
SELECT * FROM data_master;
SELECT * FROM penjualan;


SELECT id_master, X.id_produk, Y.nama, Z.id_ukuran, nama_ukuran, stok, harga
FROM data_master X
INNER JOIN produk Y ON X.`id_produk` = Y.`id_produk`
INNER JOIN ukuran_helm Z ON X.`id_ukuran` = Z.`id_ukuran`;

SELECT id_master, Y.nama, nama_ukuran, stok, harga
FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran;

SELECT * FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran 
WHERE X.`id_master` = 'M002' ORDER BY id_master; 

SELECT X.id_master, Y.id_produk, Z.id_ukuran, gambar, nama, Z.nama_ukuran, stok, CONCAT('RP. ',FORMAT(harga,0)) AS harga, CONCAT('Rp. ',FORMAT(harga * stok,0)) AS total FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran ORDER BY id_master ASC;

SELECT X.id_produk, Y.nama, SUM(stok) AS stok
FROM data_master X
RIGHT JOIN produk Y ON X.id_produk = Y.id_produk;

SELECT CONCAT('Rp. ',FORMAT(SUM(harga * stok),0)) AS total FROM data_master X
INNER JOIN produk Y ON X.id_produk = Y.id_produk
INNER JOIN ukuran_helm Z ON X.id_ukuran = Z.id_ukuran ORDER BY id_master ASC;

CONCAT('Rp. ',FORMAT(harga,0)) AS Harga,

SELECT * FROM penjualan;
SELECT * FROM data_master ORDER BY id_master ASC;