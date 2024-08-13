
<html>
  <head>
    <style>
             
footer {
  background: var(--eerie-black);
  padding: 20px 0;
}

.footer-nav {
  border-bottom: 1px solid var(--onyx);
  padding-bottom: 20px;
  margin-bottom: 20px;
}


.footer-nav .nav-title {      /**    footer heading **/
  position: relative;
  color: var(--white);
  font-size: var(--fs-7);
  text-transform: uppercase;
  margin-bottom: 15px;
  padding-bottom: 5px;
}

.footer-nav .nav-title::before {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  background: var(--salmon-pink);
  width: 60px;
  height: 1px;
}

.footer-nav-item { padding: 3px 0; }


.footer-nav-item .content {

  color: var(--sonic-silver);
  font-size: var(--fs-7);
  text-transform: capitalize;
}

.footer-nav-link:hover { color: var(--salmon-pink); }


.footer-nav-item .content {
  font-style: normal;
  margin-bottom: 5px;
}


.footer-nav-link{
  color: var(--sonic-silver);
}

.copyright {
  color: var(--sonic-silver);
  font-size: var(--fs-8);
  font-weight: var(--weight-500);
  text-transform: capitalize;
  letter-spacing: 1.2px;
}

.copyright a {
  display: inline;
  color: inherit;
  
}

.copyright{
  text-align: center;
  
}
.copyright { --fs-8: 0.875rem; }

.footer {
  position: relative;
  margin-top: -100px;
}

      </style>
</head>
<body>
<footer >

<div class="footer-nav">

  <div class="container">

    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Popular Categories</h2>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Fashion</a>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Gloves</a>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Energy Drinks</a>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Hockey</a>
      </li>

      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Shoes</a>
      </li>

    </ul>

    <ul class="footer-nav-list">
    
      <li class="footer-nav-item">
        <h2 class="nav-title">Products</h2>
      </li>
  
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">New products</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Best sales</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Contact us</a>
      </li>

    </ul>

    <ul class="footer-nav-list">
    
      <li class="footer-nav-item">
        <h2 class="nav-title">Our Company</h2>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Legal Notice</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="#" class="footer-nav-link">Terms and conditions</a>
      </li>
    
      <li class="footer-nav-item">
        <a href="AboutUs.html" class="footer-nav-link">About us</a>
      </li>
    </ul>


    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Contact</h2>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="location-outline"></ion-icon>
        </div>

        <address class="content">
          Computer Science Department, Smt. C.H.M College, Station Road, Ulhasnagar-421004
        </address>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="call-outline"></ion-icon>
        </div>

        <a href="tel:+91 9876543210" class="footer-nav-link">(+91) 9876543210</a>
      </li>

      <li class="footer-nav-item flex">
        <div class="icon-box">
          <ion-icon name="mail-outline"></ion-icon>
        </div>

        <a href="mailto:example@gmail.com" class="footer-nav-link">sporto-ecom@gmail.com</a>
      </li>
    </ul>

    <ul class="footer-nav-list">

      <li class="footer-nav-item">
        <h2 class="nav-title">Follow Us</h2>
      
        </ul>
      </li>
    </ul>
  </div>
</div>
    <p class="copyright" >
       Copyright &copy; <a href="#">Sporto</a> all rights reserved.
    </p>
</div>
</footer>
</body>
</html>