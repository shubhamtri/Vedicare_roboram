<?php  
$connect = mysql_connect("localhost","root","");
$query = "SELECT * FROM abhi";
$result = mysql_query($connect,$query);
$chart_data = '';
while ($row = mysql_fetch_array($result)) {
	$chart_data .="{ age:'".$row["age"]."',medication:".$row["medication"].",medical_condition:".$row["medical_condition"]."}, "; 
}
$chart_data = substr ($chart_data, 0, -2);
?>
<html>
	<head>
		<title>graph</title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.8/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris-min.js"></script>
	</head>		
	<body>
		<br /> <br /> 
		<div class="container" style="width:900px;"></div>
		<h2 align="center"> GRAPH</h2>
		<br /> <br />
		<div id="chart"></div>
	</body>
</html>
<script>
	Morris.Bar {{
		element : 'chart',
		data :[<?php echo $chart_data; ?>],
		xkey : 'age',
		ykeys: [ 'medication','medical_condition'],
		Labels: [ 'medication','medical_condition'],
		hideHover:'auto',
	}};
</script>
