@extends('layouts.app')

@section('content')

<div class="page-content">
	<div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="myChart"></canvas>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('ajax')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    var xValues = ["Belum Ditindaklanjuti", "Tidak Dapat Ditindaklanjuti", "Sesuai", "Belum Sesuai"];
    var yValues = [
        {{ $belumTindakLanjut }},
        {{ $tidakDapatDitindaklanjuti }},
        {{ $sesuai }},
        {{ $belumSesuai }}
    ];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9"
    ];

    new Chart("myChart", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "Tahun 2022"
        }
      }
    });
    </script>
@endpush

