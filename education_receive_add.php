<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>

    <div class="page-titles title-dark pt20 pb10 mb30">
        <div class="container">
            <div class="row">
                <div class=" col-md-6">
                    <h4>CQA교육/교재 - <span>교육공지/접수</span></h4>
                </div>
                <div class="col-md-6 mb0">
                    <ol class="breadcrumb text-md-right">
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">CQA교육/교재</li>
                        <li class="breadcrumb-item">교육공지/접수</li>
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

        <h4 class="mb10">교육접수정보</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 교육</label>
                    <div class="col-9">                                
                        <select class="form-control form-control-sm" name="account" disabled>
                            <option value='36' >2018년 2급 자격검정 면제및 교육</option>
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
            </div>

            <div class="col-md-6">
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
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">교육장</label>
                    <div class="col-9" style="padding-top: 1px">                                      
                        <select class="form-control form-control-sm" name="account">
                            <option value='36' >서울 양재동 한국퀼트센터</option>
                        </select>
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
