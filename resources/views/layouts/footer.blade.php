</body>
</html>
<footer class="footer">
    <div class="footer-content">
        <img src="/images/footer/logoPetungPark.png" alt="Logo Instansi" class="logo-instansi">
        <div class="alamat">
            <p><b>Alamat</b></p>
            <p>{{ $footerInfo['alamat'] }}</p>
            <div class="d-flex align-items-center">
                <img src="{{ $footerInfo['whatsapp_logo'] }}" alt="Logo WA">
                <p>{{ $footerInfo['whatsapp'] }}</p>
            </div>
        </div>
        <div class="tautan">
            <p><b>Tautan</b></p>
            <a href="{{ $footerInfo['alamat'] }}"><u>Desa Belik</u></a>
        </div>
        <div class="sosmed">
            <p><b>Sosial Media</b></p>
            <a href="{{ $footerInfo['instagram'] }}">
                <img src="{{ $footerInfo['instagram_logo'] }}" alt="Instagram" class="logo-sosmed">
            </a>
            <a href="{{ $footerInfo['tiktok'] }}">
                <img src="{{ $footerInfo['tiktok_logo'] }}" alt="TikTok" class="logo-sosmed">
            </a>
            <a href="{{ $footerInfo['youtube'] }}">
                <img src="{{ $footerInfo['youtube_logo'] }}" alt="Youtube" class="logo-sosmed">
            </a>
        </div>
    </div>
</footer>
