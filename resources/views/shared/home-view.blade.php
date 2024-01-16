<style>
     .card-container {
      display: flex;
      flex-direction: column;
      /* align-items: center;  */
    }

    .card {
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s;
    }

    .card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card img {
      transition: transform 0.3s;
    }

    .card:hover img {
      transform: scale(1.01);
      filter: brightness(1.2);
    }

    .card-body {
      padding: 1.5rem;
    }

    .footer{
        margin-top: 3em !important;
    }
</style>

@if(session('success'))
<div class="alert alert-success mt-3">
    {{ session('success') }}
</div>
@endif

<div class="container jumbotron-container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="jumbotron-text">
                <h1>Cimol Kering!</h1>
                <p>Temukan cimol kering terlezat di sini.</p>
            </div>
        </div>
        <div class="col-md-6">
            <a href="{{ route('products.index') }}">
            <div class="jumbotron-image"></div>
            </a>
        </div>
    </div>
</div>


<div class="container card-container mt-5">
  <h2 class="text mb-4 mt-5">Bite into Uniqueness: Exploring the Delight of Cimol</h2>
<div class="card mb-5 mt-2" style="max-width: 1200px">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('img/Pkk.png') }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Explain</h5>
        <p class="card-text" style="text-align: left;">
          Cimol is a traditional Sundanese snack made from tapioca flour. The name "cimol" is derived from "aci digemol," 
          meaning tapioca flour shaped into round balls. Typically sold by street vendors, cimol is prepared by forming tapioca flour dough into small rounds and frying them. 
          It is often enjoyed with additional seasonings. When bitten, it has a slightly chewy texture and is best enjoyed warm.</p>
      </div>
    </div>
  </div>
</div>

<div class="card mb-5" style="max-width: 1200px">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('img/Pkk2.png') }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Uniqueness</h5>
        <p class="card-text mt-4" style="text-align: left;">
          1. Crunchy-Chewy Bliss: "Cimol's Irresistible Texture"<br>
          2. Original Savory Flavor: "The Signature Taste of Cimol"<br>
          3. Mini and Convenient: "Snacking Anywhere with Cimol"<br>
          4. Perfect Frying Technique: "Crispy Outside, Tender Inside"
        </p>
      </div>
    </div>
  </div>
</div>
</div>
{{-- <div class="container cimol ">
    <h2>Cimolllllllll</h2>
    <div class="row">
      <div class="col mt-3">
        <h4>Explan</h4> 
        <p>Cimol (Aksara Sunda: ᮎᮤᮙᮧᮜ᮪, Sunda: cimol) adalah makanan ringan khas Sunda yang dibuat dari tepung kanji.
           Cimol berasal dari kata aci digemol yang artinya tepung kanji dibentuk bulat-bulat. Cimol biasanya dijual di pinggir jalan. 
           Cara membuatnya, adonan tepung kanji dibentuk bulat-bulat, kemudian digoreng. Biasanya, cimol dimakan dengan bumbu-bumbu tambahan (istilahnya semacam seasoning). 
           Kalau digigit, rasanya memang agak kenyal-kenyal. Paling enak jika dimakan hangat-hangat.</p>
      </div>
      <div class="col mt-3">
        <h4>Uniqueness</h4> 
        <p> 1. Tekstur Kriuk & Kenyal: 
            Cimol memberikan sensasi gigitan kriuk dan kenyal, menciptakan pengalaman makan yang memuaskan. <br>
            2. Cita Rasa Gurih Original: Cimol dikenal dengan cita rasa gurih khas dan sentuhan pedas yang pas, cocok untuk penggemar rasa tradisional. <br>
            
            3. Bentuk Mini & Praktis: Ukuran kecil dan praktis membuat Cimol menjadi camilan yang mudah dinikmati di mana saja.<br>
            
            4.Proses Goreng Tepat: Proses penggorengan yang tepat menghasilkan lapisan luar garing dan bagian dalam yang lembut.</p>
      </div>
      <div class="col mt-3">
        <h4>Flavor Variations</h4>
        <p>- Original Gurih: Cimol dengan cita rasa gurih asli yang disukai penggemar rasa tradisional. <br>

           - Pedas Mantap: Varian pedas untuk pecinta sensasi pedas yang menggoda. <br>
            
           - Keju Leleh: Cimol dengan lapisan keju leleh, menciptakan kombinasi rasa yang menggugah selera. <br>
        
           - Balado Khas Indonesia: Kombinasi pedas khas Indonesia untuk pengalaman rasa autentik. <br>
            
           - Black Pepper Blast: Rasa pedas dan hangat dari lada hitam memberikan dimensi baru pada rasa Cimol.</p>
      </div>
    </div>
  </div> --}}




  {{-- <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="{{ asset('img/banner1.png') }}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="..." class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> --}}

  <div class="service">
    <h2>Our Services</h2>
    <div class="service-content">
        <div class="service-item">
            <i class="bi bi-list"></i>
            <h4>Menu Options</h4>
            <p>Discover a variety of delicious dishes on our menu. From appetizers to main courses and desserts, we have something for everyone.</p>
        </div>
        <div class="service-item">
            <i class="bi bi-cart"></i>
            <h4>Online Ordering</h4>
            <p>Conveniently order your favorite dishes online. Explore our menu and place your order from the comfort of your home.</p>
        </div>
        <div class="service-item">
            <i class="bi bi-credit-card"></i>
            <h4>Payment Methods</h4>
            <p>Choose from a variety of payment methods, including credit cards, online payments, and more. We prioritize secure and easy transactions.</p>
        </div>
    </div>
</div>

         