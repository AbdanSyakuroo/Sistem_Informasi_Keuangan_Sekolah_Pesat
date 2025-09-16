<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>FINSchool</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />


    <style>
/* Anda mungkin sudah punya style ini dari respons sebelumnya, pastikan ada di main.css Anda */
.icon-container {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    font-size: 24px;
}

    .icon-container {
        width: 45px;
        height: 45px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        font-size: 24px;
    }
    .step-number-container {
        flex-shrink: 0;
    }
    .step-number {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #4A6CF7; /* Warna primer dari template Anda */
        color: white;
        font-weight: bold;
        font-size: 18px;
    }
    .step-content {
        padding-top: 5px; /* Agar sejajar dengan teks di step-number */
    }
</style>
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    <x-sidenav></x-sidenav>
    
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
      <x-topheader></x-topheader>
      <!-- ========== header end ========== -->

      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title">
                  <h2>Dashboard</h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="#0">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        FINSchool
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
          <div class="row">
  <!-- Total Penerimaan -->
  <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon success">
        <i class="lni lni-dollar"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Total Penerimaan</h6>
        <h3 class="text-bold mb-10">
          Rp {{ number_format($totalPenerimaan, 0, ',', '.') }}
        </h3>
      </div>
    </div>
  </div>

  <!-- Total Pengeluaran -->
  <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon danger">
        <i class="lni lni-credit-cards"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Total Pengeluaran</h6>
        <h3 class="text-bold mb-10">
          Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
        </h3>
      </div>
    </div>
  </div>

  <!-- Sisa Saldo -->
  <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon primary">
        <i class="lni lni-wallet"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Sisa Saldo</h6>
        <h3 class="text-bold mb-10">
          Rp {{ number_format($sisaSaldo, 0, ',', '.') }}
        </h3>
      </div>
    </div>
  </div>

  <!-- Jumlah Kegiatan -->
  <div class="col-xl-3 col-lg-4 col-sm-6">
    <div class="icon-card mb-30">
      <div class="icon orange">
        <i class="lni lni-book"></i>
      </div>
      <div class="content">
        <h6 class="mb-10">Jumlah Kegiatan</h6>
        <h3 class="text-bold mb-10">{{ $jumlahKegiatan }}</h3>
      </div>
    </div>
  </div>
</div>




         <div class="row">
  <div class="col-12">
    <div class="card-style-3 mb-30">
      <div class="card-content">
        <div class="d-flex align-items-center mb-3">
            <div class="icon-container bg-primary text-white me-3">
                <i class="lni lni-target-revenue"></i>
            </div>
            <div>
                <h4>Tujuan Sistem Informasi Keuangan FINSchool</h4>
            </div>
        </div>
        
        <p class="mt-4">
          Selamat datang di <strong>FINSchool ITXPRO</strong>. Sistem ini dirancang secara khusus untuk menjadi pusat pengelolaan keuangan sekolah Anda. Tujuan utama kami adalah untuk menyederhanakan, mengefisienkan, dan meningkatkan transparansi dalam setiap aspek administrasi keuangan, mulai dari pencatatan transaksi harian hingga pembuatan laporan akhir tahun.
        </p>

        <h6 class="mt-4">Manfaat Utama yang Anda Dapatkan:</h6>
        <ul>
          <li><strong>Efisiensi Waktu:</strong> Mengurangi pekerjaan manual dalam pencatatan dan rekapitulasi data keuangan.</li>
          <li><strong>Transparansi Data:</strong> Semua data keuangan terpusat, memudahkan pemantauan dan audit.</li>
          <li><strong>Akurasi Tinggi:</strong> Meminimalkan risiko kesalahan manusia (human error) dalam perhitungan.</li>
          <li><strong>Pelaporan Cepat:</strong> Menghasilkan laporan keuangan (bulanan, semester, tahunan) secara otomatis hanya dengan beberapa klik.</li>
        </ul>
      </div>
    </div>
  </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                
                <div class="d-flex align-items-center">
                    <div>
                        <h4>Alur Kerja dan Petunjuk Penggunaan</h4>
                    </div>
                </div>

                <p class="mt-2">
                    Ikuti alur kerja berikut untuk menggunakan aplikasi FINSchool ITXPRO secara optimal, mulai dari pengaturan awal hingga pelaporan.
                </p>
                <hr class="my-4">

                <div class="single-step d-flex">
                    <div class="step-number-container me-4">
                        <span class="step-number">1</span>
                    </div>
                    <div class="step-content">
                        <h6 class="mb-2">Pengaturan Setup Awal</h6>
                        <p class="text-sm">Langkah ini krusial dan hanya perlu dilakukan sekali di awal. Pastikan data ini lengkap sebelum melakukan transaksi.</p>
                        <div class="sub-step mt-3">
                            <strong>A. Input Jenis Kegiatan:</strong>
                            <p class="text-sm mb-2">Buka menu <strong>"Kegiatan"</strong> dan masukkan semua jenis kegiatan yang mungkin memerlukan anggaran (Contoh: Pembelian ATK, Studi Tur, Bayar Listrik).</p>
                        </div>
                        <div class="sub-step mt-2">
                            <strong>B. Input Jenis Sumber Dana:</strong>
                            <p class="text-sm mb-0">Buka menu <strong>Sumber Dana > Jenis Sumber Dana</strong>. Masukkan jenis sumber dana yang diperoleh untuk Sekolah (Contoh: Dana BOS, Dana Komite, Kas Sekolah).</p>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="single-step d-flex">
                    <div class="step-number-container me-4">
                        <span class="step-number">2</span>
                    </div>
                    <div class="step-content">
                        <h6 class="mb-2">Mencatat Semua Penerimaan Dana</h6>
                        <p class="text-sm">Catat setiap dana yang masuk sesuai dengan jenisnya.</p>
                        <div class="sub-step mt-3">
                            <strong>A. Penerimaan Dana Spesifik:</strong>
                            <p class="text-sm mb-2">Gunakan menu <strong>Sumber Dana > Penerimaan Dana</strong> untuk mencatat dana besar yang diterima (Contoh: Dana BOS). Ini akan menambah saldo di pos dana yang dapat di cek pada halaman laporan > realisasi.</p>
                        </div>
                        <div class="sub-step mt-2">
                            <strong>B. Penerimaan Harian:</strong>
                            <p class="text-sm mb-0">Gunakan menu <strong>"Penerimaan Harian"</strong> untuk dana tunai operasional (Contoh: Penjualan formulir). Ini akan menambah saldo kas harian Anda.</p>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="single-step d-flex">
                    <div class="step-number-container me-4">
                        <span class="step-number">3</span>
                    </div>
                    <div class="step-content">
                        <h6 class="mb-2">Mencatat Pengeluaran</h6>
                        <p class="text-sm">
                            Buka menu <strong>"Pengeluaran"</strong>, klik "Tambah Data". Isi formulir dengan memilih <strong>Kegiatan</strong> dan <strong>Sumber Dana</strong> yang sesuai dari dropdown. Nominal yang diinput akan otomatis mengurangi saldo dari sumber dana yang Anda pilih dan dapat diperiksa di halaman laporan > realisasi.
                        </p>
                    </div>
                </div>

                <hr class="my-4">

                <div class="single-step d-flex">
                    <div class="step-number-container me-4">
                        <span class="step-number">4</span>
                    </div>
                    <div class="step-content">
                        <h6 class="mb-2">Melihat Laporan Keuangan</h6>
                        <p class="text-sm">
                            Buka menu <strong>"Laporan"</strong> untuk memantau keuangan. Gunakan laporan > <strong> Realisasi </strong> dengan filter untuk melihat penggunaan per sumber dana, atau laporan ><strong>Keseluruhan</strong> untuk melihat arus kas operasional harian.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

          <div class="row">
  <div class="col-12">
    <div class="card-style mb-30">
      <h4 class="mb-4">Frequently Asked Questions / Pertanyaan yang Sering Diajukan</h4>

      <div class="accordion" id="accordionPetunjuk">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingSatu">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSatu" aria-expanded="false" aria-controls="collapseSatu">
              <strong>Bagaimana cara melihat ringkasan keuangan harian?</strong>
            </button>
          </h2>
          <div id="collapseSatu" class="accordion-collapse collapse" aria-labelledby="headingSatu" data-bs-parent="#accordionPetunjuk">
            <div class="accordion-body">
              Anda dapat melihatnya di <strong>Halaman Dashboard</strong> Di sana tersedia informasi total penerimaan harian, total pengeluaran, dan sisa saldo saat ini.
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingDua">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDua" aria-expanded="false" aria-controls="collapseDua">
              <strong>Di mana saya bisa mencatat dana yang diterima sekolah?</strong>
            </button>
          </h2>
          <div id="collapseDua" class="accordion-collapse collapse" aria-labelledby="headingDua" data-bs-parent="#accordionPetunjuk">
            <div class="accordion-body">
              Pertama, di menu <strong>Sumber Dana > Jenis,</strong> Anda perlu mendaftarkan jenis-jenis sumber dana yang ada. <br> Kedua, di menu<strong>Sumber Dana > Penerimaan Dana,</strong> Anda mencatat nominal dana yang diterima untuk setiap jenis yang sudah Anda daftarkan.
            </div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="headingTiga">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTiga" aria-expanded="false" aria-controls="collapseTiga">
              <strong>Bagaimana cara mencatat uang masuk harian dari kegiatan sekolah?</strong>
            </button>
          </h2>
          <div id="collapseTiga" class="accordion-collapse collapse" aria-labelledby="headingTiga" data-bs-parent="#accordionPetunjuk">
            <div class="accordion-body">
             Gunakan menu <strong>Penerimaan Harian.</strong> Halaman ini khusus untuk mencatat penerimaan nominal yang diterima secara langsung.
            </div>
          </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="headingEmpat">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEmpat" aria-expanded="false" aria-controls="collapseEmpat">
                <strong>Jika ingin mencatat pengeluaran, apakah saya harus mengisi data kegiatan terlebih dahulu?</strong>
              </button>
            </h2>
            <div id="collapseEmpat" class="accordion-collapse collapse" aria-labelledby="headingEmpat" data-bs-parent="#accordionPetunjuk">
              <div class="accordion-body">
                Ya. Sebelum mencatat pengeluaran, Anda harus terlebih dahulu memasukkan nama-nama kegiatan di menu <strong>Kegiatan.</strong>  Nama-nama ini akan muncul sebagai opsi yang bisa Anda pilih saat mengisi formulir pengeluaran.
              </div>
            </div>
          </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingLima">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLima" aria-expanded="false" aria-controls="collapseLima">
                <strong>Data apa saja yang harus diisi saat mencatat pengeluaran?</strong>
              </button>
            </h2>
            <div id="collapseLima" class="accordion-collapse collapse" aria-labelledby="headingLima" data-bs-parent="#accordionPetunjuk">
              <div class="accordion-body">
                Saat mencatat pengeluaran di menu Pengeluaran, Anda akan mengisi formulir yang mencakup: <br>
<strong>1. Tanggal pengeluaran <br>
2. Kegiatan (pilih dari daftar yang sudah Anda input sebelumnya) <br>
3. Sumber dana yang digunakan (sesuai dengan yang sudah didaftarkan) <br>
4. Uraian dan nominal pengeluaran</strong>
              </div>
            </div>
          </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingEnam">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEnam" aria-expanded="false" aria-controls="collapseEnam">
                <strong>Bagaimana cara melihat laporan keuangan secara keseluruhan?</strong>
              </button>
            </h2>
            <div id="collapseEnam" class="accordion-collapse collapse" aria-labelledby="headingEnam" data-bs-parent="#accordionPetunjuk">
              <div class="accordion-body">
                Saat mencatat pengeluaran di menu Pengeluaran, Anda akan mengisi formulir yang mencakup: <br>
<strong>1. Realisasi: </strong> Menampilkan total penerimaan dan pengeluaran. Anda bisa melihat detail pengeluaran berdasarkan sumber dana yang dipilih dan menggunakan filter untuk mencari data tertentu. <br>
<strong>2. Keseluruhan: </strong> Menampilkan data operasi keuangan secara menyeluruh, mencakup penerimaan langsung dan pengeluaran yang mengurangi saldo. <br>

              </div>
            </div>
          </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTujuh">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTujuh" aria-expanded="false" aria-controls="collapseTujuh">
                <strong>Apakah data saldo sumber dana akan otomatis terpotong saat saya mencatat pengeluaran?</strong>
              </button>
            </h2>
            <div id="collapseTujuh" class="accordion-collapse collapse" aria-labelledby="headingTujuh" data-bs-parent="#accordionPetunjuk">
              <div class="accordion-body">
                Ya. Ketika Anda mencatat pengeluaran dan memilih sumber dana yang digunakan, sistem akan secara otomatis mengurangi saldo dari sumber dana tersebut.
              </div>
            </div>
          </div>
      </div>

    </div>
  </div>
</div>

{{-- <div class="row">
  <div class="col-12">
    <div class="card-style-3 mb-30">
      <div class="card-content">
        
        <div class="d-flex align-items-center mb-3">
            <div class="icon-container bg-primary text-white me-3">
                <i class="lni lni-book"></i>
            </div>
            <div>
                <h4>Petunjuk Lengkap Penggunaan FINSchool</h4>
            </div>
        </div>

        <p class="mt-4">
          Berikut adalah panduan langkah demi langkah untuk memanfaatkan fitur-fitur utama dalam sistem FINSchool secara efektif. Ikuti alur kerja ini untuk memastikan pengelolaan keuangan yang rapi dan akurat.
        </p>
        <hr class="my-4">

        <div class="row">
          <div class="col-lg-6 mb-4">
            <div class="d-flex">
              <div class="me-3 fs-4 text-primary">
                <i class="lni lni-rocket"></i>
              </div>
              <div>
                <h6 class="mb-2">Langkah 1: Orientasi Dashboard</h6>
                <p class="text-sm">
                  Saat pertama kali masuk, kenali dashboard utama Anda. Perhatikan kartu ringkasan di bagian atas yang menampilkan **Total Penerimaan, Pengeluaran, dan Sisa Saldo** secara real-time. Ini adalah pusat pantauan kesehatan keuangan sekolah Anda.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="d-flex">
              <div class="me-3 fs-4 text-success">
                <i class="lni lni-arrow-up-circle"></i>
              </div>
              <div>
                <h6 class="mb-2">Langkah 2: Mencatat Semua Pemasukan</h6>
                <p class="text-sm">
                  Setiap dana yang masuk ke sekolah harus dicatat. Buka menu <strong>"Pemasukan"</strong>, klik "Tambah Data", dan isi semua kolom dengan detail: tanggal, sumber dana (misal: SPP, Dana BOS), jumlah, dan keterangan yang jelas.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="d-flex">
              <div class="me-3 fs-4 text-danger">
                <i class="lni lni-arrow-down-circle"></i>
              </div>
              <div>
                <h6 class="mb-2">Langkah 3: Mencatat Semua Pengeluaran</h6>
                <p class="text-sm">
                  Sama pentingnya dengan pemasukan, catat setiap dana yang keluar. Buka menu <strong>"Pengeluaran"</strong>, klik "Tambah Data", dan lengkapi informasinya. Jika memungkinkan, lampirkan bukti transaksi untuk arsip digital yang kuat.
                </p>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="d-flex">
              <div class="me-3 fs-4 text-dark">
                <i class="lni lni-printer"></i>
              </div>
              <div>
                <h6 class="mb-2">Langkah 4: Membuat dan Menganalisis Laporan</h6>
                <p class="text-sm">
                  Setelah data terkumpul, saatnya membuat laporan. Buka menu <strong>"Laporan"</strong>, pilih periode yang diinginkan (harian, bulanan, tahunan), lalu sistem akan menyusunnya secara otomatis. Gunakan laporan ini untuk evaluasi dan perencanaan.
                </p>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</div> --}}


<style>

</style>
          
      <!-- ========== footer start =========== -->

      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>


  </body>
</html>


    
