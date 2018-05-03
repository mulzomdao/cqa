<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>

    <div class="page-titles title-dark pt20 pb10 mb30">
        <div class="container">
            <div class="row">
                <div class=" col-md-6">
                    <h4>게시판 - <span>공지사항</span></h4>
                </div>
                <div class="col-md-6 mb0">
                    <ol class="breadcrumb text-md-right">
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">게시판</li>
                        <li class="breadcrumb-item">공지사항</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!--page title end-->

    <div class="container mb30" style="padding-left: 30px; padding-right: 30px;">

        <h4 class="mb10">공지사항 등록</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">성명</label>
                    <div class="col-11">          
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">제목</label>
                    <div class="col-11">
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">첨부파일</label>
                    <div class="col-11" style="padding-top: 1px">      
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-textarea" class="col-1 col-form-label text-right" style="padding-right: 0px">내용</label>
                    <div class="col-11">
                        <textarea class="form-control form-control-sm" id="example-textarea" rows="16"></textarea>
                    </div>
                </div>
                <div class="form-group pull-right" style="margin-top: 5px; margin-bottom: 0px;">
                    <div class="form-inline">
                        <button class="form-control btn-primary form-control-sm mr-sm-2" style="width: 70px" onclick="history.go(-1)"> 취 소 </button>
                        <button class="form-control btn-primary form-control-sm" style="width: 70px"> 등 록 </button>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <?include "include/bottom.php"?>

    <?include "include/js.php"?>

    <script>
        $(document).ready(function() {
            // $('#side-menu').find('li').addClass('active');

            $('#board_add').click(function() {
                window.location.href="board_add.php";
            });

            console.log("test");
            
        });
    </script>
</body>

<!-- Mirrored from bootstraplovers.com/assan-v3.6/classic-template/html/header-light-top-bar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 20:06:19 GMT -->
</html>
