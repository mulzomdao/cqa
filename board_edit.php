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

        <h4 class="mb10">공지사항수정</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">성명</label>
                    <div class="col-11">          
                        <input class="form-control form-control-sm" type="text" value="관리자" id="example-search-input" readonly>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">등록일</label>
                    <div class="col-5">          
                        <input class="form-control form-control-sm" type="text" value="2017-03-22 12:33:24" id="example-search-input" readonly>
                    </div>
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">조회수</label>
                    <div class="col-5">          
                        <input class="form-control form-control-sm" type="text" value="69" id="example-search-input" readonly>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">제목</label>
                    <div class="col-11">
                        <input class="form-control form-control-sm" type="text" value="한국퀼트연합 자격정보 안내" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 2px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">첨부파일</label>
                    <div class="col-5" style="padding-top: 0px">      
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                    <div class="col-6 text-right" style="padding-top: 2px;">      
                        자격정보안내.doc
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-textarea" class="col-1 col-form-label text-right" style="padding-right: 0px">내용</label>
                    <div class="col-11">
                        <textarea class="form-control form-control-sm" id="example-textarea" rows="16">2017년 하반기 부터 실시되는 자격발급정보입니다.
새로이 공지를 올리니 착오없이 참고하시기 바랍니다.</textarea>
                    </div>
                </div>
                <div class="form-group pull-right" style="margin-top: 5px; margin-bottom: 0px;">
                    <div class="form-inline">
                        <button class="form-control btn-primary form-control-sm mr-sm-2" style="width: 70px" onclick="location.href='board_edit.php'"> 수 정 </button>
                        <button class="form-control btn-primary form-control-sm mr-sm-2" style="width: 70px"> 삭 제 </button>
                        <button class="form-control btn-primary form-control-sm" style="width: 70px" onclick="history.go(-1)"> 이 전 </button>
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
