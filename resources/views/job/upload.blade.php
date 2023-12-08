@extends("layouts.main")
@section("head")
<link rel="stylesheet" type="text/css" href="{{ asset("css/upload.css") }}">
@endsection
@section("content")
<section>
    <div class="topic-pfupload">
        <div class="event">
            <a href="/"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
        </div>
        <img src="images/banner-upload.jpg">
    </div>
</section>

<section>
    <div class="profile">
        <img src="images/profile-stroke.png">
        <p>Thanadol</p>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <button class="uploadbtn">Upload Works</button>
        <h1>Following</h1>
        <h2>30</h2>
        <h3>Followers</h3>
        <h4>4k</h4>
    </div>
</section>

<section>
    <div class="abtme">
        <p>About Me</p>
        <hr>
        <i class="fa-solid fa-cake-candles"></i>
        <h1>Born June 26, 2000</h1>
        <hr>
        <i class="fa-solid fa-location-dot"></i>
        <h2>2239 Hog Camp Road Schaumburg</h2>
        <hr>
        <i class="fa-solid fa-envelope"></i>
        <h3>thanadol@gmail.com</h3>
        <hr>
        <i class="fa-solid fa-phone"></i>
        <h4>091-XXX-XXXX</h4>
        <hr>
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-x-twitter"></i>
        <hr>
    </div>
</section>

<section id="box">
    <div class="works">
        <p>My Works</p>
        <div class="line">
            <hr>
        </div>
        <div class="pf">
            <img src="images/profile.png">
        </div>
        <h1>Thanadol</h1>
        <i class="fa-solid fa-ellipsis"></i>
        <h2>ผลงาน ช่วง Winter ที่ผ่านมา กับ Collection XXXX มาใน Concept “XXXX” ปังสุดๆ ใครชอบก็โหวตให้ได้น้า
            <br>หรือพี่ๆคนไหนอยากCollabทักมาได้เลย ช่องทางติดต่ออยู่ที่โปรไฟล์</h2>
        <div class="work1">
            <img src="images/work1.png">
        </div>
        <h3>Thanadol</h3>
        <h4>20/11/23</h4>
        <div class="star1">
            <i class="fas fa-star"></i>
            <h1>200</h1>
        </div>
        <div class="comment">
            <i class="fa-regular fa-comment"></i>
        </div>
        <h5>90 Comments</h5>
        <div class="bookmark">
            <i class="fa-regular fa-bookmark"></i>
        </div>
        <div class="line1">
            <hr>
        </div>

        <div class="pf">
            <img src="images/profile.png">
        </div>
        <h1>Thanadol</h1>
        <i class="fa-solid fa-ellipsis"></i>
        <h2>ผลงาน ช่วง Winter ที่ผ่านมา กับ Collection XXXX มาใน Concept “XXXX” ปังสุดๆ ใครชอบก็โหวตให้ได้น้า
            <br>หรือพี่ๆคนไหนอยากCollabทักมาได้เลย ช่องทางติดต่ออยู่ที่โปรไฟล์</h2>
        <div class="work2">
            <img src="images/work2.png">
        </div>
        <h3>Thanadol</h3>
        <h4>20/11/23</h4>
        <div class="star1">
            <i class="fas fa-star"></i>
            <h1>200</h1>
        </div>
        <div class="comment">
            <i class="fa-regular fa-comment"></i>
        </div>
        <h5>90 Comments</h5>
        <div class="bookmark">
            <i class="fa-regular fa-bookmark"></i>
        </div>
    </div>
</section>
@endsection
