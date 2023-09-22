## Bahasa Pemrograman
 - PHP
 - Javascript
## Framework
 - Laravel
 - Bootstrap
## Dokumentasi
 - User
	 - User dapat login melalui google atau dapat membuat akun melalui register
	 - User dapat melihat event berdasarkan tanggal atau jenis event
	 - User dapat melihat detail event dan akan ada button beli tiket jika belum expired ( jika event sudah melewati tanggal sekarang )
	 - Ketika beli tiket user akan melihat nama event dan harga nya serta memasukan card credit untuk melanjutkan pembelian
	 - Jika user berhasil membeli maka akan berpindah halaman ke detail tiket dan QR
	 - Pada halaman tiket user dapat melihat ulang detail tiket yang sudah dibeli dan dapat melakukan pembatalan
	 - Jika user membatalkan maka akan mengembalikan uang nya kedalam saldo yang dapat dilihat pada pengaturan
	 - Pada halaman pengaturan user dapat merubah akun menjadi promotor, dan juga dapat melakukan penarikan uang
 - Promotor
	 - Promotor dapat login melalui google atau dapat membuat akun melalui register namun akan menjadi akun user terlebih dahulu
	 - Promotor dapat mengelola jenis event 
	 - Promotor dapat mengelola event 
	 - Promotor dapat melihat detail event dan akan muncul tabel pembelian siapa saja yang sudah membeli tiket pada event tersebut
	 - Jika user membatalkan event yang dibuat oleh promotor maka saldo akun promotor akan langsung berkurang sesuai pembelian user dan akan dikembalikan ke saldo user
	 - Promotor dapat melihat saldo pada pengaturan
	 - Pada halaman pengaturan promotor dapat merubah akun menjadi user, dan juga dapat melakukan penarikan uang
