<!DOCTYPE HTML>
<html><head><script>
function subst() {
  var vars={};
  var x=document.location.search.substring(1).split('&');
  for(var i in x) {var z=x[i].split('=',2);vars[z[0]] = unescape(z[1]);}
  var x=['frompage','topage','page','webpage','section','subsection','subsubsection'];
  for(var i in x) {
    var y = document.getElementsByClassName(x[i]);
    for(var j=0; j<y.length; ++j) y[j].textContent = vars[x[i]];
  }
}
</script></head>
<body style="border:0; margin: 0;" onload="subst()">
<table style="none;text-align:left;width:100%;" cellpadding="0" cellspacing="0">
  <tr>
    <td style="text-align:center;">
      <!-- <img src="http://localhost/lms/theme/LamanPuteri/images/logo_collections.png" height="52px" width="614px;"> -->
      <?php 
        echo $this->Html->image('http://'.$_SERVER['SERVER_NAME'].Router::url('/')."theme/LamanPuteri/images/logo_collections.jpeg", array('height'=> '52px', 'width'=>'614px'));
      ?>
    </td>
  </tr>
  <tr>
    <td style="text-align:center">
      Page <span class="page"></span> of <span class="topage"></span>
    </td>
  </tr>
</table>