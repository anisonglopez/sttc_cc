<!-- Default Card Example -->
<div class="card mb-4 small">
    <div class="card-header bg-dark">
      <div class="row">
        <div class="col-md-12 font-weight-bold text-white">
               {{-- แสดงรายงานสถานะใบงาน --}}
               <div class="form-group row">
                <label for="desc" class="col-md-2 col-form-label text-right">{{ __('ช่วงวันที่') }}</label>  
                <div class="col-md-5  input-group"> 
                  <input id="searchdate" type="text" class="form-control form-control-sm" name="searchdate" >
                  <div class="input-group-append">
                      <a id="searchdate_btn" href="#" class="btn btn-outline-success btn-sm"><span class="fa fa-search"></span></a>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-md-6 text-right">
            
        </div>
      </div>        
    </div>
  <!-- end card header -->
    <div class="card-body">
      <div class="col-md-12">
          
      <div class="table-responsive">
        {{-- <div class="chart-pie pt-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div> --}}
        {{-- <canvas id="myPieChart" width="652" height="506" class="chartjs-render-monitor" style="display: block; height: 253px; width: 326px;"></canvas> --}}
        <canvas id="myChartline" width="652" height="300"></canvas>
        {{-- </div> --}}
      </div>
      </div>
      </div>
  </div>

  <script>
    var ctx = document.getElementById('myChartline').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: '# of Votes',
                data: [12, 100, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
 