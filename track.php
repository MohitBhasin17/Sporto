
<style>
.wrapper{
    background-image: url(./assets/images/background.jpg); 
    background-repeat: no-repeat;
    background-size: 100% 100%;
    padding: 1%;
    width:100%;
    margin: 0 auto;
    height: 80%;
}

.tbl-full{
    width:100%;
}


table tr th{
    border-bottom: 1px solid black;
    padding: 1%;
    text-align:left;
}

table tr td{
  padding: 1%;
}
.track{
    padding-left: 70px;
}

.search-size{
    width: 45%;
}

</style>
</head>

<?php include('partials-front/menu.php') ?>


<div class="main-content">
<div class="wrapper">
    <br> <br>
    <div class="track">
    <h1>Track Your Order</h1>
    <div class="search-size">
    <div class="header-search-container">
        <form action="<?php echo SITEURL; ?>product-track.php" method="POST">
          <input type="search" name="search" class="search-field" placeholder="Enter Contact / Email to track...">
</div> </div>
        </form>  
        </div>

        
</div>
</div>
  <!-- FOOTER -->

  <?php include('partials-front/footer.php') ?>