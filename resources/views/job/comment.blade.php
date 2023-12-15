@extends('layouts.main')
@section('head')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/comment.css') }}">
@endsection
@section('content')
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
        <section>
            <div class="topic-pfupload">
                <div class="back">
                    <a href="/upload.html"><i class="fas fa-arrow-left"></i><button>GO BACK</button></a>
                </div>
            </div>
        </section>

        <section>
            <div class="detail">
                <p>My Works</p>
                <div class="line">
                    <hr>
                </div>
                <div class="pf">
                    <img src="images/profile.png">
                </div>
                <h1>Thanadol</h1>
                <h2>ผลงาน ช่วง Winter ที่ผ่านมา กับ Collection XXXX มาใน Concept “XXXX” ปังสุดๆ ใครชอบก็โหวตให้ได้น้า หรือพี่ๆ คนไหนอยาก Collab<br> ทักมาได้เลย ช่องทางติดต่ออยู่ที่โปรไฟล์</h2>
                <div class="work1">
                    <img src="images/work1.png">
                </div>
                <h3>Thanadol</h3>
                <h4>20/11/23</h4>
                <div class="star1">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <h1>200</h1>
                </div>
                <div class="comment">
                    <a href="/comment.html"><button><i class="fa-regular fa-comment"></i></button></a>
                </div>
                <h5>90 Comments</h5>
                <div class="bookmark">
                    <i class="fa-regular fa-bookmark"></i>
                </div>
                <div class="line1">
                    <hr>
                </div>
                <div class="cmt1">
                    <img src="images/lolla1.png">
                    <p>Lolla Smith</p>
                    <h1>30 July 2022</h1>
                    <div class="star2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h2>Lorem ipsum dolor sit amet consectetur. Nullam tortor interdum id curabitur. Tempus massa vitae enim non et magna lorem praesent urna. Magnis augue sit enim diam porttitor<br> faucibus. Id varius enim tempus nibh lectus. Eu consequat
                        ipsum gravida sed eu consectetur. Egestas mi at sed orci. Vulputate non neque massa leo lacus at. Volutpat<br> adipiscing vehicula feugiat consectetur quis tellus. Senectus facilisis scelerisque sit non etiam ut nec et.</h2>
                </div>

                <div class="cmt1">
                    <hr>
                    <img src="images/lolla2.png">
                    <p>Lolla Smith</p>
                    <h1>30 July 2022</h1>
                    <div class="star2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h2>Lorem ipsum dolor sit amet consectetur. Nullam tortor interdum id curabitur. Tempus massa vitae enim non et magna lorem praesent urna. Magnis augue sit enim diam porttitor<br> faucibus. Id varius enim tempus nibh lectus. Eu consequat
                        ipsum gravida sed eu consectetur. Egestas mi at sed orci. Vulputate non neque massa leo lacus at. Volutpat<br> adipiscing vehicula feugiat consectetur quis tellus. Senectus facilisis scelerisque sit non etiam ut nec et.</h2>
                </div>

                <div class="cmt1">
                    <hr>
                    <img src="images/lolla3.png">
                    <p>Lolla Smith</p>
                    <h1>30 July 2022</h1>
                    <div class="star2">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h2>Lorem ipsum dolor sit amet consectetur. Nullam tortor interdum id curabitur. Tempus massa vitae enim non et magna lorem praesent urna. Magnis augue sit enim diam porttitor<br> faucibus. Id varius enim tempus nibh lectus. Eu consequat
                        ipsum gravida sed eu consectetur. Egestas mi at sed orci. Vulputate non neque massa leo lacus at. Volutpat<br> adipiscing vehicula feugiat consectetur quis tellus. Senectus facilisis scelerisque sit non etiam ut nec et.</h2>
                </div>
            </div>
        </section>
@endsection
