@extends('layouts.app')

@section('content')

<div class="page-content">
	<div class="container-fluid">
        {{-- <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 h-50">
                        <canvas id="myChart"></canvas>
                     </div>
                    <div class="col-md-6">
                        <canvas id="myChart"></canvas>
                     </div>
                </div>
            </div>
        </div> --}}
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Basic Bar Chart</h4>
          </div><!-- end card header -->          
          <div class="card-body">
              {{-- <div class="row">
                <div class="col-md-6"> --}}
                  <div>
                      <canvas id="myChart" width="300" height="300"></canvas>
                  </div>
                {{-- </div>
              </div> --}}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Basic Bar Chart</h4>
          </div>
          <div class="card-body">
            {{-- <div class="col-md-6"> --}}
              <div id="bar_chart" class="apex-charts" >
                  <canvas id="donat" width="300" height="300"></canvas>
              </div>
            {{-- </div> --}}
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
  const d = new Date();
  let year = d.getFullYear();

    $.getJSON("{{ url('/dashboard-json') }}", function(result){
      // $.each(result, function(i, field){
        console.log(result.xValues)
        new Chart("myChart", {
          type: "bar",
          data: {
            labels: result.xValues,
            datasets: [{
              backgroundColor: result.barColors,
              data: result.yValues,
              barPercentage: 0.5,
              barThickness: 6,
              maxBarThickness: 8,
              minBarLength: 2,
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: 'Tahun '+year
            }
          }
        });
        // });
        new Chart("donat", {
          type: 'pie',
          data: {
            labels: result.labels,
            datasets: [{
              backgroundColor: result.donutColors,
              data: result.donut
              
            }]
          },
          options: {
            legend: {display: false},
            title: {
              display: true,
              text: 'Tahun '+year
            }
          }
        });
    
      });
    </script>
@endpush

