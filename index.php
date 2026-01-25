<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wastra Nusantara | Home</title>
  <link rel="stylesheet" href="./style.css">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./asset/favicon.ico" type="image/x-icon">
</head>
<script src="script.js" defer></script>
<script>
    window.addEventListener("load", () => {
        document.body.classList.add("loaded");
    });
</script>

<body>
  <nav>
        <img src="./asset/Wastra Logo.png" alt="" class="logo">

        <ul class="nav-links" id="navLinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="about-us">Tentang Kami</a></li>
        <li><a href="produk">Produk</a></li>
        <li><a href="#gallery">Galeri</a></li>
        <li class="mobile-login"><a id="mobileLoginText" href="./loginsignup">Login</a></li>
        
        
        </ul>

        
        </a>
        <a href="./loginsignup" class="login-desktop">
        
        <div class="login-btn">
          <h5 id="loginText">Login</h5>
          <img src="./asset/default-avatar-icon-of-social-media-user-vector.jpg" 
            alt="User" 
            id="userAvatar" 
            class="logo" 
            style="cursor:pointer; width:40px; height:40px; border-radius:50%; display:none;">

        </div>

        </a>

        <div class="hamburger" id="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
    </nav>  
  <script>
    const hamburger = document.getElementById("hamburger");
    const navLinks = document.getElementById("navLinks");

    hamburger.addEventListener("click", () => {
      navLinks.classList.toggle("active");
      hamburger.classList.toggle("active");
    });
  </script>
  
    <div class="announcement" id="announcement">
        <span>
          📢 <b>PENGUMUMAN PENTING</b><br>
          WEBSITE WASTRA NUSANTARA INI AKAN SEGERA DITUTUP PADA 16 FEBRUARI 2026. Untuk Source code akan segera diunggah ke Github! Terimakasih atas dukungannya! <a href="https://github.com/mic3103">Klik untuk ke laman github!</a>
        </span>
        <button onclick="closeAnnouncement()">✕</button>
    </div>
  <script>
  function closeAnnouncement() {
    document.getElementById("announcement").style.display = "none";
  }
  </script>


  <header>
    <div class="left-hd">
      <h1>Wastra Nusantara</h1>
      <p>Warisan Tradisi Anak Bangsa</p>
      <dl>Sebuah ruang untuk mengenal, merayakan, dan melestarikan keindahan kain tradisional Indonesia—warisan budaya yang hidup dari generasi ke generasi.</dl>
      <div class="join-us">
        <p>Bergabunglah!</p>
      </div>
      <script>
          document.querySelector(".join-us").addEventListener("click", function(){
            window.location.href = "https://api.whatsapp.com/send?phone=6282111557981&text=Halo%2C%20saya%20mau%20bergabung%20menjadi%20mitra%20WASTRA%20NUSANTARA!";
          });
      </script>
    </div>
    <div class="right-hd">
      <img src="./asset/aset-header.png" alt="">
    </div>
  </header>
  <div id="about-us">
    <img src="./asset/Wastra Logo.png" alt="" class="logo-about">
    <div class="about-text">
      <h2>Sekilas Tentang Kami</h2>
      <div class="gariskuy"></div>
      <p>Wastra Nusantara hadir sebagai ruang yang merayakan keindahan warisan tekstil Indonesia—dari motif klasik hingga karya kontemporer. Setiap produk yang kami tampilkan merekam jejak budaya, ketelatenan, dan identitas bangsa.Kami percaya bahwa warisan tidak hanya dijaga, tetapi juga dihidupkan kembali melalui kreativitas anak bangsa, terutama para pelaku UMKM yang menjadi tulang punggung lahirnya karya-karya istimewa ini.</p>
      <div class="selengkapnya1">
        <p>Lihat Selengkapnya!</p>
    </div>
    <script>
      document.querySelector(".selengkapnya1").addEventListener("click", function(){
        window.location.href = "about-us";
      });
    </script>
    </div>
  </div>
  <div id="product">
    <h2>Produk Unggulan Kami</h2>
    <div class="garisku"></div>

    <div class="product-container">
      <div class="product-card">
        <img src="./asset/btk_tulis.png" alt="">
        <h3>Kain Batik Tulis</h3>
        <p>Kain batik tulis dengan motif klasik yang memukau, hasil karya pengrajin lokal.</p>
      </div>
      <div class="product-card">
        <img src="./asset/Batik Pakai.png" alt="">
        <h3>Batik Jadi</h3>
        <p>Busana batik siap pakai dengan motif khas Nusantara, memadukan tradisi dan gaya modern.</p>
      </div>
      <div class="product-card">
        <img src="./asset/aset-header.png"alt="">
        <h3>Kain Songket & Tenun</h3>
        <p>Kain tradisional Nusantara dengan motif khas, ditenun dengan teknik warisan budaya dan sentuhan elegan.</p>
      </div>
    </div>

    <div class="selengkapnya">
        <p>Lihat Selengkapnya!</p>
    </div>
    <script>
      document.querySelector(".selengkapnya").addEventListener("click", function(){
        window.location.href = "produk";
      });
    </script>

  </div>

  <div id="gallery">
    <h2>Galeri Kain Tradisional</h2>
    <div class="garisku"></div>
    <div class="gallery-container">
      <div class="gallery-item">
        <img src="./asset/btk_tulis.png" alt="">
      </div>
      <div class="gallery-item">
        <img src="./asset/btk.png" alt="">
      </div>
      <div class="gallery-item">
        <img src="./asset/btk-2.png" alt="">
      </div>
      <div class="gallery-item">
        <img src="./asset/btk-3.png" alt="">
      </div>
    </div>
  </div>

  <div id="sponsor">
    <h2>Didukung Penuh Oleh</h2>
    <div class="garisku"></div>

    <div class="sponsor-track">
        <div class="sponsor-logos">
            <img src="./asset/1.png" alt="Yayasan Marsudirini">
            <img src="./asset/2.png" alt="Lensa Jagad.id">
            <img src="./asset/3.png" alt="Tahoe Tempe Production">
            <img src="./asset/5.png" alt="Persekutuan Organis Asrama Marsudirini">

            <img src="./asset/1.png" alt="Yayasan Marsudirini">
            <img src="./asset/2.png" alt="Lensa Jagad.id">
            <img src="./asset/3.png" alt="Tahoe Tempe Production">
            <img src="./asset/5.png" alt="Persekutuan Organis Asrama Marsudirini">
        </div>
      </div>
  </div>

  <script>
      document.addEventListener("DOMContentLoaded", function () {
          const loginText = document.getElementById("loginText");
          const userAvatar = document.getElementById("userAvatar");
          const mobileLoginText = document.getElementById("mobileLoginText");

          const isLogin = localStorage.getItem("wastra_login");

          if (isLogin === "true") {
              // Desktop: tampilkan avatar
              loginText.style.display = "none";
              userAvatar.style.display = "block";

              // Mobile: jadi Logout
              mobileLoginText.textContent = "Logout";
              mobileLoginText.href = "#";
          } else {
              // Desktop: tampilkan Login
              loginText.style.display = "block";
              userAvatar.style.display = "none";

              // Mobile: tetap Login
              mobileLoginText.textContent = "Login";
              mobileLoginText.href = "./loginsignup";
          }

          // Klik avatar (desktop) = logout
          userAvatar.addEventListener("click", function (e) {
              e.preventDefault();
              handleLogout();
          });

          // Klik Logout (mobile) = logout
          mobileLoginText.addEventListener("click", function (e) {
              if (isLogin === "true") {
                  e.preventDefault();
                  handleLogout();
              }
          });

          function handleLogout() {
              const confirmLogout = confirm("Yakin mau logout?");
              if (confirmLogout) {
                  localStorage.removeItem("wastra_login");
                  localStorage.removeItem("wastra_cart"); 
                  alert("Berhasil logout. Sampai jumpa lagi 👋");
                  window.location.href = "index.php";
              }
          }
      });
    </script>

  <footer>
    <div class="footerkiri">
      <div class="footer-kiri-logo">
        <img src="./asset/Wastra Logo.png" alt="" class="logo-footer">
        <div class="keterangan-logo">
          <h1>Wastra Nusantara</h1>
          <p>Warisan Tradisi Anak Bangsa</p>
        </div>
      </div>
      
      <div class="footerkiri-menu">
        <div class="footerkiri-menu1">
          <h2>Tautan Cepat</h2>
          <div class="gariskuy"></div>
          <ul>
            <li><a href="index">Home</a></li>
            <li><a href="about-us">Tentang Kami</a></li>
            <li><a href="produk">Semua Produk</a></li>
            <li><a href="index.php#gallery">Galeri</a></li>
            <li><a href="mailto:michaelsatrian@gmail.com">Bantuan</a></li>
          </ul>
        </div>
        <div class="footerkiri-menu2">
          <h2>Mitra</h2>
          <div class="gariskuy"></div>
          <ul>
            <li><a href="https://api.whatsapp.com/send?phone=6282111557981&text=Halo%2C%20saya%20mau%20bergabung%20menjadi%20mitra%20WASTRA%20NUSANTARA!">Jadi Mitra Penjualan</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footerkanan">
      <div class="map-container">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1655.8564521806193!2d106.70268739354648!3d-6.482737044774017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c60359a515b5%3A0xea2556697fe39eac!2sSMA%20Marsudirini%20Bogor!5e0!3m2!1sid!2sid!4v1765519638667!5m2!1sid!2sid"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>

      <p>Jl. Perumahan Telaga Kahuripan No.Km. 47, RW.5, Tegal, Kec. Kemang, Kabupaten Bogor, Jawa Barat 16310</p>
    </div>

  </footer>

  
</body>
<div id="loading-screen">
  <div class="loader-content">
    <div class="logo">WASTRA NUSANTARA</div>
    <div class="tagline">Warisan Tradisi Anak Bangsa</div>
  </div>
</div>

<script>
  window.addEventListener("load", function () {
    const loader = document.getElementById("loading-screen");
    loader.classList.add("hidden");
  });
</script>
</html>