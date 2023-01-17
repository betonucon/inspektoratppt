<!DOCTYPE html>
<html>
<head>
	<title>Penerbitan Surat Perintah</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{url_plug()}}/img/icon.png">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Penerbitan Surat Perintah</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
			<tr>
                <th >No</th>
                <th >Nomor PKPT</th>
                <th >Jenis</th>
                <th >PKP</th>
                <th >Nota Dinas</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $e=>$p)
			<tr>
				<td>{{ $e+1 }}</td>
				<td>{{$p->id_pkpt}}</td>
				<td>{{$p->jenis}}</td>
				<td><center><img src="{{public_path('img/pdf-file.png')}}" width="30px" height="30px"></center></td>
				<td><center><img src="{{public_path('img/pdf-file.png')}}" width="30px" height="30px"></center></td>
			</tr>
			@endforeach
		</tbody>
	</table>

    <br>
    <br>
    <h6>Cilegon, 14 Desember 2022</h6>
    <br>
    <br>
    <br>
    <h6 class="ml-5">Sekretariat</h6>

</body>
</html>
