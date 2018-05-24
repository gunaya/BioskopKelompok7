@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$transaksi}}</h3>

              <p>Total Transaksi</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="/admin/transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$film}}</h3>

              <p>Total Film</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/admin-film" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$member}}</h3>

              <p>Total Member</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/member" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$booking}}</h3>

              <p>Transaksi Menunggu Verifikasi</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/konfirmasi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="container">
      <canvas id="canvas" height="280" width="1000" style="width: 100px !important"></canvas>
    </div>

<script>
    var month = <?php echo $month;?>;
    var data_viewer = <?php echo $hasil; ?>;

    var barChartData = {
        labels: month,
        datasets: [{
            label: 'Total Transaksi',
            backgroundColor: "rgba(151,187,205,0.5)",
            data: data_viewer
        }]
    };


    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 1,
                        borderColor: 'rgb(255, 80, 80)',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Total Transaksi Tiap Bulan'
                }, 
                scales : {
                    yAxes : [{
                      ticks : {
                        beginAtZero : true
                      }
                    }]
                }
            }
        });


    };
</script>

@endsection
