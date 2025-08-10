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