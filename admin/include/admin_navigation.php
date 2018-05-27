<?
    $page_name = explode(".php", $_SERVER['REQUEST_URI']);
    $page_name = explode("_", str_replace('/admin/', '', $page_name[0]));
    $page_1_name = $page_name[0];

    if (count($page_name) > 2) {
        $page_2_name = $page_name[0] . "_" . $page_name[1];
    } else {
        $page_2_name = $page_1_name;
    }
?>
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">                    
            <li class="nav-header">
                <div class="dropdown profile-element"> 
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> 
                            <span class="block m-t-xs"><strong class="font-bold">Administrator</strong></span> 
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> 
                        </span> 
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="/index.php">HomePage</a></li>
                        <li><a href="member_edit.php">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    CQA
                </div>
            </li>

            <li <?if ($page_1_name == 'index.php') {echo "class='active'";}?>>
                <a href="index.php"><i class="fa fa-home"></i><span class="nav-label">Home</span></a>
            </li>
            <li <?if ($page_1_name == 'board' || $page_1_name == 'popup') {echo "class='active'";}?>>
                <a href="#"><i class="fa fa-certificate"></i><span class="nav-label">사이트관리</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?if ($page_1_name != 'board' && $page_1_name != 'popup') {echo "collapse";}?>">
                    <li <?if ($page_1_name == 'board') {echo "class='active'";}?>><a href="board_manager_list.php">게시판관리</a></li>
                    <li <?if ($page_1_name == 'popup') {echo "class='active'";}?>><a href="popup_list.php">팝업관리</a></li>
                </ul>
            </li>
            <li <?if ($page_1_name == 'office') {echo "class='active'";}?>>
                <a href="office_list.php"><i class="fa fa-sitemap"></i><span class="nav-label">지회/지부관리</span></a>
            </li>
            <li <?if ($page_1_name == 'member') {echo "class='active'";}?>>
                <a href="member_list.php"><i class="fa fa-users"></i><span class="nav-label">회원관리</span></a>
            </li>
            <li <?if ($page_1_name == 'exam') {echo "class='active'";}?>>
                <a href="#"><i class="fa fa-file-text-o"></i><span class="nav-label">자격시험/접수관리</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?if ($page_1_name != 'exam') {echo "collapse";}?>">
                    <li <?if ($page_2_name == 'exam') {echo "class='active'";}?>><a href="exam_list.php">시험관리</a></li>
                    <li <?if ($page_2_name == 'exam_receive') {echo "class='active'";}?>><a href="exam_receive_list.php">시험접수관리</a></li>
                </ul>
            </li>
            <li <?if ($page_1_name == 'education') {echo "class='active'";}?>>
                <a href="#"><i class="fa fa-pencil-square-o"></i><span class="nav-label">교육/접수관리</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level <?if ($page_1_name != 'education') {echo "collapse";}?>">
                    <li <?if ($page_2_name == 'education') {echo "class='active'";}?>><a href="education_list.php">교육관리</a></li>
                    <li <?if ($page_2_name == 'education_receive') {echo "class='active'";}?>><a href="education_receive_list.php">교육접수관리</a></li>
                </ul>
            </li>
            <li <?if ($page_1_name == 'book') {echo "class='active'";}?>>
                <a href="book_list.php"><i class="fa fa-book"></i><span class="nav-label">교재관리</span>
            </li>
        </ul>

    </div>
</nav>