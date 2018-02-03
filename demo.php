<?php if ($_GET['do']) {
     error_reporting(0);
     set_time_limit(5);
    $i=(int)$_GET['do'];
for ($i; $i <= 300; $i++) {
    if ($i%29==0 and $i>0){
    echo ' '.$i+1;
    die;
    }
    //echo ' '.$i;
    sleep(1);
}
    die(' ok');
} else { ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<title>test</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
<script type="text/javascript">
function neverdie(i){
    if (i==undefined)
    i=1;
var jqxhr = $.get( "/<?php echo trim($_SERVER["REQUEST_URI"],'/');?>",
   {
    'do': i
  }, function(data) {
  console.log( "success"+data );
  var arr = data.split(' ');
   if (parseInt(arr[arr.length-1])!=arr[arr.length-1] && arr[arr.length-1]!=='ok') {
    console.log( "php say:"+data );
    return;
  }
  if (arr[arr.length-1]!=='ok'){
    neverdie(arr[arr.length-1]);
  } else {
    $('#result-count').css('color','green');
  }
  $('#result-count').text(data);
})
  .fail(function() {
    console.log( "error" );
  });
return ;
}
</script>
<button onclick="neverdie()">do</button>
<div id="result-count"></div>


</body>
</html>
<?php } ?>