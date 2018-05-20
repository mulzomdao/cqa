<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>

    <div class="page-titles title-dark pt20 pb10 mb30">
        <div class="container">
            <div class="row">
                <div class=" col-md-6">
                    <h4>협회자격증 - <span>시험공지/접수</span></h4>
                </div>
                <div class="col-md-6 mb0">
                    <ol class="breadcrumb text-md-right">
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">협회자격증</li>
                        <li class="breadcrumb-item">시험공지/접수</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!--page title end-->

    <div class="container mb30" style="padding-left: 30px; padding-right: 30px;">
            
        <article class="article-post mb10" style="border-bottom-width: 0px; padding-bottom: 0px">
            <a class="post-thumb mb30" href="#">
                <img src="image/1H7U2716-00-4_resize.jpg" alt="" class="img-fluid">
            </a>
        </article>

        <h4 class="mb10">시험접수정보</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 시험명</label>
                    <div class="col-9">                                
                        <select class="form-control form-control-sm" name="account" disabled>
                            <option value='36' >2018년 2급 자격검정 면제및 시험</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 아이디</label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="search" value="admin" id="example-search-input" readonly>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 성명</label>
                    <div class="col-9">          
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 영문성명</label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                </div>                
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 생년월일</label>
                    <div class="col-9">
                        <div class="form-group row" style="margin-bottom: 0px">

                            <div class="col-sm-4" style="padding-left: 15px; padding-right: 0px;">                                                
                                <select class="form-control form-control-sm" name="account">
                                    <option value="">년도</option>
                                    <?
                                        for ($i = 2010; $i >= 1950; $i--) {
                                            echo "<option value='" . $i . "'>" . $i . "년</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-left: 5px; padding-right: 5px;">                                              
                                <select class="form-control form-control-sm" name="account">
                                    <option value="">월</option>
                                    <?
                                        for ($i = 1; $i <= 12; $i++) {
                                            echo "<option value='" . $i . "'>" . $i . "월</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-left: 0px; padding-right: 14px;">                                         
                                <select class="form-control form-control-sm" name="account">
                                    <option value="">일</option>
                                    <?
                                        for ($i = 1; $i <= 31; $i++) {
                                            echo "<option value='" . $i . "'>" . $i . "월</option>";
                                        }
                                    ?>
                                </select>
                            </div> 
                        </div>
                    </div>
                </div>                
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 응시과목</label>
                    <div class="col-9">          
                        <select class="form-control form-control-sm" name="account">
                            <option value="">핸드면제</option>
                            <option value="0">머신면제</option>
                            <option value="5">핸드퀼트</option>
                            <option value="10">머신퀼트</option>
                        </select>    
                    </div>
                </div>                
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 응시유형</label>
                    <div class="col-9">          
                        <select class="form-control form-control-sm" name="account">
                            <option value="0">자격시험응시</option>
                            <option value="5">시험 및 교육 면제심사요청</option>
                            <option value="10">자격증 이관심사요청</option>
                        </select>                            
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 핸드폰</label>
                    <div class="col-9">          
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input" placeholder="'-' 없이 입력하세요.">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">전화</label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input" placeholder="'-' 없이 입력하세요.">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">이메일</label>
                    <div class="col-9">          
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="">
                            <div class="input-group-addon" style="padding-bottom: 0px;padding-top: 0px; font-size: 0.8rem">@</div>
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">사진</label>
                    <div class="col-9" style="padding-top: 1px">      
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                </div>              
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">우편번호</label>
                    <div class="col-9">
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder="우편번호검색">
                            <div class="input-group-addon" style="padding-bottom: 0px;padding-top: 0px; font-size: 0.8rem">검색</div>
                        </div>
                    </div>
                </div>              
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">주소</label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                </div>              
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">상세주소</label>
                    <div class="col-9">
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                </div> 

                <div class="form-group pull-right" style="margin-bottom: 0px;">
                    <form class="form-inline">
                        <button class="form-control btn-primary form-control-sm mr-sm-2" style="width: 70px"> 등 록 </button>
                        <button class="form-control btn-primary form-control-sm" style="width: 70px"> 취 소 </button>
                    </form>
                </div>      
            </div>
        </div> 
    </div><!--page title end-->

    <?include "include/bottom.php"?>

    <?include "include/js.php"?>

    <script>
        $(document).ready(function() {
            // $('#side-menu').find('li').addClass('active');

            console.log("test");
            
        });
    </script>
</body>

<!-- Mirrored from bootstraplovers.com/assan-v3.6/classic-template/html/header-light-top-bar.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 20:06:19 GMT -->
</html>
