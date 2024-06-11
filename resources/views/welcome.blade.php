@extends('layouts.template')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Hallo Apa Kabar</h3>
        <div class="card-tools"></div>
    </div>
    <class="card-body">
        <p>Selamat Datang semua, ini adalah halaman utama aplikasi ini yang dibuat.</p>
        <div class="row">
            <div class="col-md-4">
                <div class="info-box bg-success">
                    <span class="info-box-icon"><i class="fas fa-house-user"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah RT</span>
                        <span class="info-box-number">{{ $jumlah_rt }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Warga</span>
                        <span class="info-box-number">{{ $jumlah_warga }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fas fa-address-book"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Warga Sementara</span>
                        <span class="info-box-number">{{ $jumlah_sementara }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="info-box bg-primary">
                    <span class="info-box-icon"><i class="fas fa-male"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Laki-laki</span>
                        <span class="info-box-number">{{ $jumlah_laki + $jumlah_sementara_laki }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-box bg-danger">
                    <span class="info-box-icon"><i class="fas fa-female"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Perempuan</span>
                        <span class="info-box-number">{{ $jumlah_perempuan + $jumlah_sementara_perempuan }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <div class="info-box bg-secondary">
                    <span class="info-box-icon"><i class="fas fa-hand-holding-heart"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Bansos</span>
                        <span class="info-box-number">{{ $jumlah_bansos }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
              <div class="info-box bg-dark">
                  <span class="info-box-icon"><i class="fas fa-hand-holding"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text">Jumlah Pengajuan Bansos</span>
                      <span class="info-box-number">{{ $jumlah_pending_bansos }}</span>
                  </div>
              </div>
          </div>
            <div class="col-md-4">
                <div class="info-box bg-dark">
                    <span class="info-box-icon"><i class="fas fa-hand-holding"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Penerima Bansos</span>
                        <span class="info-box-number">{{ $jumlah_penerima_bansos }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-center">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Data Warga
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#" onclick="showWargaChart()">Warga</a>
                        <a class="dropdown-item" href="#" onclick="showWargaSementaraChart()">Warga Sementara</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12 d-flex justify-content-center">
                <canvas id="genderChart" width="300" height="300"></canvas>
            </div>
        </div>
        <div class="row mt-3">
          <div class="col-md-12 d-flex justify-content-center">
              <canvas id="lineChart" width="300" height="300"></canvas>
          </div>
      </div>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
      var genderCtx = document.getElementById('genderChart').getContext('2d');
  
      var wargaData = {
          labels: ['Laki-laki', 'Perempuan'],
          datasets: [{
              label: 'Jumlah Total',
              data: [{{ $jumlah_laki }}, {{ $jumlah_perempuan }}],
              backgroundColor: ['#007bff', '#dc3545'],
          }]
      };
  
      var sementaraData = {
          labels: ['Laki-laki', 'Perempuan'],
          datasets: [{
              label: 'Jumlah Total',
              data: [{{ $jumlah_sementara_laki }}, {{ $jumlah_sementara_perempuan }}],
              backgroundColor: ['#007bff', '#dc3545'],
          }]
      };
  
      var genderChart = new Chart(genderCtx, {
          type: 'pie',
          data: wargaData,
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: {
                      position: 'top',
                  },
                  title: {
                      display: true,
                      text: 'Jumlah Total Warga Berdasarkan Jenis Kelamin'
                  }
              }
          }
      });
  
      window.showWargaChart = function() {
          genderChart.data = wargaData;
          genderChart.update();
      };
  
      window.showWargaSementaraChart = function() {
          genderChart.data = sementaraData;
          genderChart.update();
      };

      var lineCtx = document.getElementById('lineChart').getContext('2d');
      var kasDate = @json($kas_date);
      var jumlahKasMasuk = @json($jumlah_kas_masuk);
      var jumlahKasKeluar = @json($jumlah_kas_keluar);

      // Calculate cumulative sum of kas masuk and kas keluar
      var cumulativeKasMasuk = jumlahKasMasuk.reduce((acc, curr, index) => {
          if (index === 0) {
              acc.push(curr);
          } else {
              acc.push(acc[index - 1] + curr);
          }
          return acc;
      }, []);

      var cumulativeKasKeluar = jumlahKasKeluar.reduce((acc, curr, index) => {
          if (index === 0) {
              acc.push(curr);
          } else {
              acc.push(acc[index - 1] + curr);
          }
          return acc;
      }, []);

      var lineChartData = {
          labels: kasDate,
          datasets: [{
              label: 'Saldo Kas',
              data: cumulativeKasMasuk.map((value, index) => value - cumulativeKasKeluar[index]),
              borderColor: '#007bff',
              fill: false
          }]
      };

      var lineChart = new Chart(lineCtx, {
          type: 'line',
          data: lineChartData,
          options: {
              responsive: true,
              maintainAspectRatio: false,
              scales: {
                  y: {
                      type: 'linear',
                      position: 'left',
                      title: {
                          display: true,
                          text: 'Jumlah Uang Masuk'
                      },
                      ticks: {
                          beginAtZero: true,
                          callback: function(value, index, values) {
                              return value.toLocaleString('id-ID'); // Format angka ke format Indonesia
                          }
                      }
                  }
              },
              plugins: {
                  legend: {
                      position: 'top',
                  },
                  title: {
                      display: true,
                      text: 'Perkembangan Jumlah Saldo Kas'
                  }
              }
          }
      });
    });
</script>

@endsection
