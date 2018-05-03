<?
    $page_name = explode("_", str_replace('/', '', $_SERVER['REQUEST_URI']))[0];

    $menu_active = "00";

    if ($page_name == "company") {
        $menu_active = "10";
    } else if ($page_name == "member") {
        $menu_active = "20";
    } else if ($page_name == "license") {
        $menu_active = "30";
    } else if ($page_name == "office") {
        $menu_active = "40";
    } else if ($page_name == "education") {
        $menu_active = "50";
    } else if ($page_name == "board") {
        $menu_active = "60";
    }
?>
<!--top bar-->
<div class="top-bar clearfix light">
    <div class="container">
        <div class="float-sm-right">
            <ul class="list-inline mb0">

                <li class="list-inline-item">
                    <a href="http://www.facebook.com" class="social-icon-sm si-gray si-gray-round si-facebook" target="_blank">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://twitter.com" class="social-icon-sm si-gray si-gray-round si-twitter" target="_blank">
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://www.instagram.com" class="social-icon-sm si-gray si-gray-round si-instagram" target="_blank">
                        <i class="fa fa-instagram"></i>
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a href="https://plus.google.com" class="social-icon-sm si-gray si-gray-round si-g-plus" target="_blank">
                        <i class="fa fa-google-plus"></i>
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="float-sm-left" style="padding-top: 6px">
            <ul class="list-inline mb0 links">
                <li class="list-inline-item" style="padding-left: 0px"><a href="login.php">Login</a></li>
                <li class="list-inline-item" style="padding-left: 0px"><a href="#">Logout</a></li>
                <li class="list-inline-item"><a href="member_join.php">Register</a></li>
                <li class="list-inline-item"><a href="admin/index.php">Admin</a></li>
                <!-- <li class="list-inline-item dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Lang</a>
                    <ul class="dropdown-menu lang-dropdown">
                        <li><a href="#" class="dropdown-item">English</a></li>
                        <li><a href="#" class="dropdown-item">Spanish</a></li>
                        <li><a href="#" class="dropdown-item">French</a></li>
                        <li><a href="#" class="dropdown-item">Arban</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div><!--/top bar-->

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation" style="right: 0px; bottom: 0px;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="index.php">
            <h3 style="text-shadow:#999999 3px 3px 3px;">
                <span style="color: blue"><strong>C</strong></span><span style="font-size: 18px; font-weight: bold; color: lightslategray">orea </span>
                <span style="color: orange"><strong>Q</strong></span><span style="font-size: 18px; font-weight: bold; color: lightslategray">uilt </span>
                <span style="color: red"><strong>A</strong></span><span style="font-size: 18px; font-weight: bold; color: lightslategray">ssociate </span>
            </h3>
        </a>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav ml-auto" style="margin-right: 0px">
                <li class="nav-item dropdown <?if ($menu_active == "10") {echo "active";}?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">CQA소개</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="company_greeting.php" class="dropdown-item">인사말</a></li>
                        <li><a href="company_cqa.php" class="dropdown-item">(사)한국퀼트연합</a></li>
                        <li><a href="company_organization.php" class="dropdown-item">조직도</a></li>
                        <li><a href="company_contact.php" class="dropdown-item">찾아오시는길</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?if ($menu_active == "20") {echo "active";}?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">협회가입</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="member_guide.php" class="dropdown-item">협회가입안내</a></li>
                        <li><a href="member_request.php" class="dropdown-item">협회가입신청</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?if ($menu_active == "30") {echo "active";}?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">협회자격증</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="license_infomation.php" class="dropdown-item">민간등록자격정보</a></li>
                        <li><a href="license_get_infomation.php" class="dropdown-item">CQA자격취득안내</a></li>
                        <li><a href="license_receive.php" class="dropdown-item">시험공지/접수</a></li>
                        <li><a href="license_pass_check.php" class="dropdown-item">합격자조회</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?if ($menu_active == "40") {echo "active";}?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">지회/지부</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="office_main.php" class="dropdown-item">지회</a></li>
                        <li><a href="office_sub.php" class="dropdown-item">지부</a></li>
                        <li><a href="office_art_quilt.php" class="dropdown-item">분과-한국아트퀼트</a></li>
                        <li><a href="office_traditional_quilt.php" class="dropdown-item">분과-실용전통퀼트</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?if ($menu_active == "50") {echo "active";}?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">CQA교육/교재</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="education_notice.php" class="dropdown-item">교육공지/접수</a></li>
                        <li><a href="education_receive.php" class="dropdown-item">교육접수현황</a></li>
                        <li><a href="education_book.php" class="dropdown-item">교재/템플릿</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown <?if ($menu_active == "60") {echo "active";}?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" style="padding-right: 0px">게시판</a>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="board_list.php?board=notice" class="dropdown-item">공지사항</a></li>
                        <li><a href="board_list.php?board=news" class="dropdown-item">뉴스</a></li>
                        <li><a href="board_list.php?board=free" class="dropdown-item">자유게시판</a></li>
                    </ul>
                </li>
            </ul>        
        </div>
    </div>
</nav>