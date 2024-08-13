
<style>
*{
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
.hero{
    background-color: #dfe6e9;
    overflow: hidden;
}

.heading h1{
    color: #ff3d54;
    font-size: 55px;
    text-align: center;
    margin-top: 35px;
}

.container{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 90%;
    margin: 65px auto;
}
.hero-content{
    flex: 1;
    width: 600px;
    margin:0px 25px;
    animation: fadeInUp 2s ease;
}
.hero-content h2{
    font-size: 38px;
    margin-bottom: 20px;
    color: #333;
}

.hero-content p{
    font-size: 24px;
    line-height: 1.5;
    margin-bottom: 40px;
}
.hero-content span{
    font-size: 24px;
    line-height: 1.5;
    margin-bottom: 40px;
}

.hero-image{
    flex:1;
    width:500px;
    margin: auto;
    animation: fadeInRight 2s ease;
}
img{
    width: 100%;
}

@media screen and (max-width:768px) {
    .heading h1{
        font-size: 45px;
        margin-top: 30px;

    }
    .hero{
        margin: 0px;
    }
    .container{
        width: 100%;
        flex-direction: column;
        margin: 0px;
        padding: 0px 40px;
    }
    .hero-content{
    width: 100%;
    margin: 35px 0px;
}
   .hero-content h2{
    font-size: 30px;
   }

   .hero-content p{
    font-size: 18px;
    margin-bottom: 20px;
   }

   .hero-content span{
    font-size: 18px;
    margin-bottom: 20px;
   }

   .hero-image{
    width: 100%;
   }

}
@keyframes fadeInUp {
    0%{
        opacity: 0;
        transform: translateY(50px);
    }
    100%{
        opacity: 1;
        transform: translateY(0px);
    }
    
}

@keyframes fadeInRight {
    0%{
        opacity: 0;
        transform: translateX(-50px);
    }
    100%{
        opacity: 1;
        transform: translateX(0px);
    }
    
} 
.read-more-btn{
    color: #0984e3;
    cursor: pointer;
}

.read-more-text{
    display: none;
   
}
.read-more-text--show{
    display: inline;
}
</style>
</head>

<?php include('partials-front/menu.php') ?>
    <section class="hero">
        <div class="heading">
            <h1>About Us</h1>
        </div>
        <div class="container">
            <div class="hero-content">
                <h2>Welcome To Our Website Sporto</h2>
                <p> Welcome to our sports accessories website, where we strive to provide athletes of all levels with the highest quality gear and equipment to enhance their performance. 
                    <br> <br>
                    At our online store, we understand the importance of having the right tools to excel in your chosen sport. 
                    That's why we have curated a wide range of sports accessories, carefully selected from top brands
                     known for their durability, innovation, and functionality.   
                    <br><br>               
                    Whether you are a professional athlete or a passionate amateur, we have everything you need totake your game to the next level.
                    <br> From protective gear such as helmets and pads, to performance-enhancing apparel
                     like compression wear and moisture-wicking clothing, we have you covered from head to toe.</p>
               <span class="read-more-text">
                Our extensive collection also includes a variety of accessories designed to improve your training and recovery. Choose from a range of fitness trackers, 
                heart rate monitors, and smartwatches to track your progress and optimize your workouts. We also offer recovery tools such as foam rollers and massage
                 balls to help you bounce back quickly after intense training sessions.
                <br><br>    
                We pride ourselves on offering exceptional customer service and a seamless shopping experience. Our knowledgeable team is always available to answer any
                 questions you may have and guide you towards the perfect products for your specific needs.
                <br><br>
                With our commitment to quality, affordability, and customer satisfaction, we aim to be your go-to destination
                 for all your sports accessory needs. Shop with us today and unlock your full athletic potential!    
            </span>

                <span class="read-more-btn">Read More....</span>
            </div>
            <div class="hero-image">
                <img src="https://i.postimg.cc/Hsx5Tp2Y/logo2.jpg" alt="logo Image">
            </div>
        </div>
    </section>
    <script src="AboutUs.js"></script>
    <?php include('partials-front/footer.php') ?>
