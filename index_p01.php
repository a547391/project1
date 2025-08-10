<!-- 這是將資料庫，連線程式載入-->
<?php require_once('Connections/dbset.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SEEION功能，這是跨網頁變數存取  -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 引入網頁標頭 -->
    <?php require_once("headfile.php"); ?>

</head>

<body>
    <section id="header">



        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">

                <!-- LOGO -->
                <a class="navbar-brand" href="#">
                    <img src="images/logo.jpg" class="img-fluid rounded-circle" alt="自行車" style="height: 40px;">
                </a>

                <!-- 漢堡選單（手機用） -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- 導覽連結＋搜尋欄 -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- 導覽列 -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php multiList02(); ?>
                        <?php
                        function multiList02()
                        {
                            global $link;
                            $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
                            $pyclass01 = $link->query($SQLstring);
                            while ($pyclass01_Rows = $pyclass01->fetch()) {
                        ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $pyclass01_Rows['cname']; ?>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php
                                        $SQLstring = sprintf("SELECT * FROM pyclass WHERE level=2 AND uplink=%d ORDER BY sort", $pyclass01_Rows['classid']);
                                        $pyclass02 = $link->query($SQLstring);
                                        while ($pyclass02_Rows = $pyclass02->fetch()) {
                                        ?>
                                            <li><a class="dropdown-item" href="#">
                                                    <em class="fas <?= $pyclass02_Rows['fonticon']; ?> fa-tw"></em>
                                                    <?= $pyclass02_Rows['cname']; ?>
                                                </a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                        <?php
                            }
                        }
                        ?>

                        <li class="nav-item"><a class="nav-link" href="#">會員註冊</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">會員登入</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">會員中心</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">企業專區</a></li>
                    </ul>

                    <!-- 搜尋欄 -->
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>

                </div>
            </div>
        </nav>

    </Section>
    <Section id="content">
        <div class="container-fluid">
            <div class="row">

            </div>
            <div class="col-md-12">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./product_img/pic1.jpg" class="d-block w-100" alt="美利達「電輔車」賞車會">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>美利達「電輔車」賞車會</h5>
                                <p>購物金活動採單日累計消費滿額即可參加登記送活動，活動期間僅需登記一次，部分商品不適用，詳見說明。
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./product_img/pic2.jpg" class="d-block w-100" alt="美利達單車DIY夏令營">
                            <div class="carousel-caption d-none d-md-block">
                                <!-- <h5>美利達單車DIY夏令營</h5>
                                    <p>黑金鑽土雞18小時純粹滴煉，去油濾渣無膽固醇，殺菌包裝常溫保存，含BACC、雙肌肽、牛磺酸、小分子蛋白質等，可單飲或當高湯華陀扶元堂養生飲品系列3折優惠，歡迎選購</p> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./product_img/pic3.jpg" class="d-block w-100" alt="GIANT新車賞遊會">
                            <div class="carousel-caption d-none d-md-block">
                                <!-- <h5>GIANT新車賞遊會</h5>
                                    <p>保養界的藝術品！內到外優雅自成一格，堅持保養始於自然，升級膚質0負擔，讓肌膚與生活更美好。源自台灣的國際保養品牌！</p> -->
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./product_img/pic4.jpg" class="d-block w-100" alt="GIANT Father's Day">
                            <div class="carousel-caption d-none d-md-block">
                                <!-- <h5>GIANT Father's Day</h5>
                                    <p>保養界的藝術品！內到外優雅自成一格，堅持保養始於自然，升級膚質0負擔，讓肌膚與生活更美好。源自台灣的國際保養品牌！</p> -->
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <hr>
                <div class="row text-center">
                    <div class="card col-md-3">
                        <img src="./product_img/pic0101.jpg" class="card-img-top" alt="MERIDA ONE-FORTY 10K">
                        <div class="card-body">
                            <h5 class="card-title">MERIDA ONE-FORTY 10K</h5>
                            <p class="card-text">140mm全新FAST避震的全碳纖維車，飛躍於林道間，展現獨具魅力的騎乘風格。</p>
                            <p class="card-text">NT299,000</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-3">
                        <img src="./product_img/pic0102.jpg" class="card-img-top" alt="MERIDA NINETY-SIX 6000 22'">
                        <div class="card-body">
                            <h5 class="card-title">MERIDA NINETY-SIX 6000 22'</h5>
                            <p class="card-text">CF4碳纖車體的優質選擇，保有升級空間，爬坡效率依舊亮眼，樂趣不減！</p>
                            <p class="card-text">NT128,000</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-3">
                        <img src="./product_img/pic0103.jpg" class="card-img-top" alt="MERIDA BIG.NINE TR 5000 25'">
                        <div class="card-body">
                            <h5 class="card-title">MERIDA BIG.NINE TR 5000 25'
                            </h5>
                            <p class="card-text">無懈可擊的攻坡性能和輕量化設計，下坡時則展現傑出的硬尾登山車風範。</p>
                            <p class="card-text">NT75,000</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-3">
                        <img src="./product_img/pic0104.jpg" class="card-img-top" alt="MERIDA BIG.NINE 100 25'">
                        <div class="card-body">
                            <h5 class="card-title">MERIDA BIG.NINE 100 25'</h5>
                            <p class="card-text">鋁合金 29 吋硬尾車，配備100mm氣壓避震前叉，提升舒適度和控制力。</p>
                            <p class="card-text">NT23,800</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="card col-md-3">
                        <img src="./product_img/pic0201.jpg" class="card-img-top" alt="GIANT Trance X Advanced Pro 29 1">
                        <div class="card-body">
                            <h5 class="card-title">GIANT Trance X Advanced Pro 29 1</h5>
                            <p class="card-text">從快速、喧鬧的下坡到技術地形，這款漸進式越野自行車為您提供主動懸架、可調節車架幾何形狀以及提升單軌比賽所需的一切。</p>
                            <p class="card-text">NT178,000</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-3">
                        <img src="./product_img/pic0202.jpg" class="card-img-top" alt="GIANT Faith">
                        <div class="card-body">
                            <h5 class="card-title">GIANT Faith</h5>
                            <p class="card-text">這款高性能的越野自行車專為胸有大志的騎士所設計。輕量合金車架、高性能輪組和專門調校的懸吊避震系統，能在高效爬坡、抓地力和操控之間取得平衡。</p>
                            <p class="card-text">NT62,800</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-3">
                        <img src="./product_img/pic0203.jpg" class="card-img-top" alt="NOYL化妝刷套裝組">
                        <div class="card-body">
                            <h5 class="card-title">GIANT XTC Advanced 29 3</h5>
                            <p class="card-text">採用輕量碳纖維車架，搭配29吋輪徑，提升越野穩定性與效率。適合登山越野與長距離騎乘，兼具剛性與舒適性，操控靈活。</p>
                            <p class="card-text">NT$52,800</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                    <div class="card col-md-3">
                        <img src="./product_img/pic0204.jpg" class="card-img-top" alt="ATX">
                        <div class="card-body">
                            <h5 class="card-title">ATX</h5>
                            <p class="card-text">別賴在家裡了！跨上ATX，從柏油路到泥土路，不僅休閒，也兼具運動健身；專注於雙腳踩踏間，所有疲憊與煩惱都將煙消雲散，騎動健康從現在開始做起!</p>
                            <p class="card-text">NT$8,800</p>
                            <a href="#" class="btn btn-secondary">更多資訊</a>
                            <a href="#" class="btn btn-warning">放購物車</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
    </Section>
    <hr>
    <Section id="scontent">
        <div class="container-fluid">
            <div id="aboutme" class="row text-center">
                <div class="col-md-2"><img src="images/Qrcode02.png" alt="QRcode" class="img-fluid mx-auto"></div>
                <div class="col-md-2"><i class="fas fa-leaf fa-5x"></i>
                    <h3>關於我們</h3>
                    關於我們<br>
                    關於本平台<br>
                    經營理念<br>
                    綠色運動倡議<br>
                </div>
                <div class="col-md-2"><i class="fas fa-shipping-fast fa-5x"></i>
                    <h3>配送與服務</h3>
                    配送與服務<br>
                    物流追蹤<br>
                    客製化裝備諮詢<br>
                </div>
                <div class="col-md-2"><i class="fas fa-headset fa-5x"></i>
                    <h3> 客戶中心</h3>
                    客戶中心<br>
                    訂單查詢<br>
                    購物須知<br>
                    聯絡客服<br>
                    常見問答 FAQ<br>
                </div>
                <div class="col-md-2"><i class="fas fa-gift fa-5x"></i>
                    <h3>好康大放送</h3>
                    好康大放送<br>
                    新會員禮包<br>
                    活動得獎名單<br>
                </div>
                <div class="col-md-2"><i class="fas fa-lightbulb fa-5x"></i>
                    <h3>FAQ 優惠專區</h3>
                    優惠專區<br>
                    首購禮包<br>
                    每月限量組合<br>
                    分享送折扣<br>
                </div>
            </div>
        </div>
    </Section>
    <Section id="footer">
        <div class="container-fluid">
            <div id="last-data" class="row text-center">
                <div class="col-md-12">
                    <h6>騎樂騎單車有限公司 40858台中市南屯區騎行路168號　電話：04-27894561　客服專線：0800-889-556</h6>
                    <h6>本公司通過 ISO 9001 / 14001 品質與環境雙重驗證，營業登記字號：24738102</h6>
                    <h6>版權所有 copyright © 2025 RideJoy Bike Co., Ltd. All Rights Reserved.</h6>
                </div>
            </div>
        </div>
    </Section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const navbar = document.querySelector(".navbar");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 50) {
                    navbar.classList.add("shrink");
                } else {
                    navbar.classList.remove("shrink");
                }
            });
        });
    </script>
    <script type="text/javascript" src="gotop.js"></script>
</body>

</html>