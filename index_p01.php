<!-- 這是將資料庫，連線程式載入-->
<?php require_once('Connections/dbset.php'); ?>
<!-- 如果SESSION沒有啟動，則啟動SEEION功能，這是跨網頁變數存取  -->
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 載入共用PHP函數庫 -->
<?php require_once("php_lib.php"); ?>
<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 引入網頁標頭 -->
    <?php require_once("headfile.php"); ?>
</head>

<body>
    <section id="header">
        <!-- 引入導覽列 -->
        <?php require_once("navbar.php"); ?>
    </Section>
    <Section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <!-- 引入廣告輪播 -->
                    <?php require_once("carousel.php"); ?>
                    <hr>
                    <!-- 引入 product藥粧商品-->
                    <?php require_once("product_list.php"); ?>
                </div>
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
        <!-- 引入頁尾 -->
        <?php require_once("footer.php"); ?>
    </Section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="gotop.js"></script>
</body>

</html>