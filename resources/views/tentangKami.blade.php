@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/tentangkami.css') }}">
@endsection
@section('container-main')
    <!-- Info1 -->
    <div class="info1 mt-5">
        <div class="text-info1 mt-4">
            <h2>Sejarah</h2>
            <p>Petung Park, terletak di Desa Belik yang memiliki arti "mata air kecil," memanfaatkan potensi alam desa yang kaya akan sumber mata air alami. 
                Salah satu yang paling menonjol adalah hutan bambu Petung, seluas 3,5 hektar, yang dipenuhi oleh bambu Petung berusia ratusan tahun. 
                Hutan ini bahkan disebut sebagai salah satu yang tertua di Jawa Timur. Awalnya, Desa Belik hanya menjadi jalur lintas di perbatasan Trawas dan Prigen, 
                hingga kepala desa memutuskan untuk mengembangkan potensi wisatanya. </p>
                
                <p>Petung Park menawarkan pemandangan sawah hijau, hutan bambu yang rimbun, serta udara segar yang sejuk. 
                Fasilitas wisata semakin lengkap dengan dibangunnya pujasera dan gazebo unik di tahun 2021, yang mengalirkan air langsung dari sumber mata air alami. 
                Pengunjung dapat menikmati hidangan sambil bermain air di gazebo dengan latar pemandangan Gunung Penanggungan. 
                Petung Park kini menjadi destinasi wisata populer yang menawarkan pengalaman alam 
                eksotis dan relaksasi dengan harga terjangkau, ideal untuk bersantai dan menghilangkan penat.</p>
        </div>
        <img src="/images/galeri/pemandangan/jalanHutanBambu_2.JPG" alt="Gambar Info 1" class="gambar-info1">
    </div>

    <!-- Info2 -->
    <div class="info2">
        <img src="/images/galeri/pemandangan/jalanHutanBambu.JPG" alt="Gambar Info 2" class="gambar-info2">
    </div>

    <!-- Info3 (gambar di kiri, teks di kanan) -->
    <div class="info3">
        <div class="text-info3">
            <h2>Visi dan Misi</h2>
            <p>Mewujudkan Dusun Jibru, Desa Belik sebagai desa mandiri dengan potensi wisata alam yang dikelola secara berkelanjutan, 
                melalui pelestarian kearifan lokal dan sumber daya alam seperti bambu petung, serta meningkatkan kesejahteraan masyarakat 
                melalui pengembangan sektor pariwisata.</p>

            <p>Menjaga kelestarian bambu petung sebagai ikon wisata dan sumber daya alam, 
                serta mengembangkan Petung Park untuk mendukung perekonomian lokal. Selain itu, misi ini mendorong kemandirian desa melalui pengelolaan wisata berbasis desa yang berkelanjutan, 
                dengan melibatkan partisipasi aktif masyarakat dalam menjaga lingkungan dan memanfaatkan sumber daya alam demi kesejahteraan bersama.</p>
        </div>
        <img src="/images/galeri/pemandangan/pohonBambu.JPG" alt="Gambar Info 3" class="gambar-info3">
    </div>
@endsection
