$(document).ready(function(){

  var jumlah_simpanan = document.getElementById("jumlah_simpanan");
  jumlah_simpanan.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    jumlah_simpanan.value = formatRupiah(this.value, "Rp. ");
  });
  
});