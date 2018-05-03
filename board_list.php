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

        <div class="row" style="margin-bottom: 7px">
            <div class="col-lg-4"><h4 class="mb10">공지사항 목록</h4></div>
            <div class="col-lg-8">
                <div class="pull-right">
                    <div class="form-inline">

                        <label class="sr-only" for="exampleSelect1">Preference</label>

                        <div class="input-group mr-sm-2">

                            <select class="form-control form-control-sm" id="exampleSelect1" style="width: 100px; padding-top: 4px; padding-bottom: 8px;">
                                <option>제목</option>
                                <option>이름</option>
                            </select>
                        </div>

                        <label class="sr-only" for="inlineFormInput">제목</label>
                        <input type="text" class="form-control form-control-sm mb-2 mr-sm-2 mb-sm-0" id="inlineFormInput" placeholder="Search..." style="width: 180px">
                        <button class="form-control btn-primary form-control-sm mr-sm-2" style="width: 70px"> 검 색 </button>
                        <button type="button" id="board_add" class="form-control btn-primary form-control-sm" style="width: 70px;" onclick="location.href='board_add.php'"> 등 록 </button>
                    </div>                
                </div>
            </div>
        </div>

        <hr style="margin-top: 0px; margin-bottom: 0px;">
        <div class="row">
            <div class="col-lg-12">
                <table class="table" style="margin-bottom: 0px">
                    <thead>
                        <tr class="text-center">
                            <th width="5%">No</th>
                            <th width="*">제목</th>
                            <th width="12%">이름</th>
                            <th width="12%">등록일</th>
                            <th width="12%">조회수</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <th scope="row">3</th>
                            <td class="text-left"><a href="board_view.php">한국퀼트연합 자격정보 안내</a></td>
                            <td>관리자</td>
                            <td>2017-10-16</td>
                            <td>69</td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">2</th>
                            <td class="text-left"><a href="board_view.php">사단법인한국퀼트연합의 민간자격등록자격증</a></td>
                            <td>관리자</td>
                            <td>2017-08-31</td>
                            <td>81</td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td class="text-left"><a href="board_view.php">민간등록자격에 대해서 알려드립니다</a></td>
                            <td>관리자</td>
                            <td>2017-08-31</td>
                            <td>93</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <hr style="margin-top: 0px; margin-bottom: 10px; border-top-width: 2px">
        <div class="row">
            <div class="col-lg-4" style="padding-top: 6px">Total : 100</div>

            <div class="col-lg-8">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination justify-content-end" style="margin-bottom: 0px;">
                        <li class="page-item "><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
            
        </div>
    </div>

    <?include "include/bottom.php"?>

    <?include "include/js.php"?>

    <script>
        $(document).ready(function() {
            // $('#side-menu').find('li').addClass('active');

            // $('#board_add').click(function() {
            //     location.href="board_add.php";
            // })();

            console.log("test");
            
        });
    </script>
</body>

<!-- Mirrored from bootstraplovers.com/assan-v3.6/classic-template/html/header-light-top-bar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 20:06:19 GMT -->
</html>
