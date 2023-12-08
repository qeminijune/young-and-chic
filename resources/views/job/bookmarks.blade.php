@extends("layouts.main")
@section("head")
<link rel="stylesheet" type="text/css" href="{{ asset("css/bookmarks.css") }}">
@endsection
@section("content")
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
                <div class="title">
                    <i class="fa-solid fa-bookmark"></i>
                    <p> My Bookmarks</p>
                </div>
                <div class="pf">
                    <img src="images/profile.png">
                </div>
                <h1>Thanadol</h1>
                <i class="fa-solid fa-ellipsis"></i>
                <h2>ผลงาน ช่วง Winter ที่ผ่านมา กับ Collection XXXX มาใน Concept “XXXX” ปังสุดๆ ใครชอบก็โหวตให้ได้น้า หรือพี่ๆ คนไหนอยาก Collab<br> ทักมาได้เลย ช่องทางติดต่ออยู่ที่โปรไฟล์</h2>
                <div class="work1">
                    <img src="images/work1.png">
                </div>
                <h3>Thanadol</h3>
                <h4>20/11/23</h4>
                <div class="comment">
                    <a href="/comment.html"><button><i class="fa-regular fa-comment"></i></button></a>
                </div>
                <h5>90 Comments</h5>
                <div class="bookmark">
                    <i class="fa-solid fa-bookmark"></i>
                </div>
                <div class="line1">
                    <hr>
                </div>

                <div class="pf">
                    <img src="images/pf-5.png">
                </div>
                <h1>Logan Lee</h1>
                <i class="fa-solid fa-ellipsis"></i>
                <h2>ผลงาน ช่วง Winter ที่ผ่านมา กับ Collection XXXX มาใน Concept “XXXX” ปังสุดๆ ใครชอบก็โหวตให้ได้น้า หรือพี่ๆ คนไหนอยาก Collab<br> ทักมาได้เลย ช่องทางติดต่ออยู่ที่โปรไฟล์</h2>
                <div class="work2">
                    <img src="images/work3.png">
                </div>
                <h3>Logan Lee</h3>
                <h4>20/11/23</h4>
                <div class="comment">
                    <a href="/comment.html"><button><i class="fa-regular fa-comment"></i></button></a>
                </div>
                <h5>90 Comments</h5>
                <div class="bookmark">
                    <i class="fa-solid fa-bookmark"></i>
                </div>
                <div class="line1">
                    <hr>
                </div>

                <div class="pf">
                    <img src="images/pf-6.png">
                </div>
                <h1>Anya Kim</h1>
                <i class="fa-solid fa-ellipsis"></i>
                <h2>ผลงาน ช่วง Winter ที่ผ่านมา กับ Collection XXXX มาใน Concept “XXXX” ปังสุดๆ ใครชอบก็โหวตให้ได้น้า หรือพี่ๆ คนไหนอยาก Collab<br> ทักมาได้เลย ช่องทางติดต่ออยู่ที่โปรไฟล์</h2>
                <div class="work3">
                    <img src="images/work-4.png">
                </div>
                <h3>Anya Kim</h3>
                <h4>20/11/23</h4>
                <div class="comment">
                    <a href="/comment.html"><button><i class="fa-regular fa-comment"></i></button></a>
                </div>
                <h5>90 Comments</h5>
                <div class="bookmark">
                    <i class="fa-solid fa-bookmark"></i>
                </div>
            </div>
        </section>
@endsection
