@extends('layouts.main')
@section('page-css')
    <link rel="stylesheet" href="{{ asset('/css/tentangkami.css') }}">
@endsection
@section('container-main')
    <!-- Info1 -->
    <div class="info1">
        <div class="text-info1">
            <h2>Judul Info 1</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                anim id est laborum.</p>
        </div>
        <img src="/images/galeri/pemandangan/jalanHutanBambu_2.jpg" alt="Gambar Info 1" class="gambar-info1">
    </div>

    <!-- Info2 -->
    <div class="info2">
        <img src="/images/galeri/pemandangan/jalanHutanBambu.jpg" alt="Gambar Info 2" class="gambar-info2">
    </div>

    <!-- Info3 (gambar di kiri, teks di kanan) -->
    <div class="info3">
        <div class="text-info3">
            <h2>Judul Info 3</h2>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
                aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni
                dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor
                sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore
                magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
                suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in
                ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas
                nulla pariatur?</p>
        </div>
        <img src="/images/galeri/pemandangan/pohonBambu.jpg" alt="Gambar Info 3" class="gambar-info3">
    </div>
@endsection
