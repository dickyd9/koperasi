$(document).ready(function(){
  $('#tenor').keyup(function (){
    
      var tenor = parseInt($('#tenor').val());
    
      var jml = parseFloat($('#jml').val().replace(/\,/g,''),10);
      $('#jml').val(jml.toLocaleString());

      var bulan = jml+(jml*10/100);
      var angsuran = parseFloat(bulan / tenor);
    
      $('#angsuran').val('Rp. ' + angsuran.toLocaleString(undefined, {
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
      }));
  });
});