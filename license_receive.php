<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>

    <div class="page-titles title-dark pt20 pb10 mb30">
        <div class="container">
            <div class="row">
                <div class=" col-md-6">
                    <h4>협회자격증 - <span>신청접수</span></h4>
                </div>
                <div class="col-md-6 mb0">
                    <ol class="breadcrumb text-md-right">
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">협회자격증</li>
                        <li class="breadcrumb-item">신청접수</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!--page title end-->

    <div class="container mb30" style="padding-left: 30px; padding-right: 30px;">
        <h4 class="mb10">신청정보</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">시험</label>
                    <div class="col-5">                                
                        <select class="form-control form-control-sm" name="account">
                            <option value='36' >2018년 2급 자격검정 면제및 시험</option>
                            <option value='34' >2017 강사자격 및 이관심사</option>
                            <option value='33' >2017년 2급 핸드, 머신 자격검정 시험</option>
                            <option value='32' >2016 CQA강사자격 및 이관심사</option>
                            <option value='31' >2016 2급 핸드, 머신 자격시험</option>
                            <option value='30' >2015 강사자격및 이관심사</option>
                            <option value='29' >2015 2급 핸드 머신 시험</option>
                            <option value='28' >2014 강사자격  및 이관심사</option>
                            <option value='27' >2014 핸드 머신 2급시험</option>
                            <option value='26' >2013 청원군 2급자격시험</option>
                            <option value='20' >2013 2급자격시험 태국</option>
                            <option value='19' >2013 강사자격심사 및 이관심사</option>
                            <option value='18' >2013 2급자격시험</option>
                            <option value='17' >2012 강사자격증</option>
                            <option value='16' >2012 2급 자격 시험</option>
                            <option value='15' >2011 강사자격증</option>
                            <option value='14' >2011 2급 자격시헙</option>
                            <option value='13' >2010 강사자격증</option>
                            <option value='12' >2010 2급시험</option>
                            <option value='11' >2009,CQA 강사자격 및 이관심사 안내</option>
                            <option value='7' >2009, 2급 자격시험</option>
                        </select>
                    </div>
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">아이디</label>
                    <div class="col-5">
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">성명</label>
                    <div class="col-5">          
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">성명(영문)</label>
                    <div class="col-5">
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">주민번호</label>
                    <div class="col-5">          
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input">
                    </div>
                    <label for="example-text-input" class="col-1 col-form-label text-right" style="padding-right: 0px">생년월일</label>
                    <div class="col-5">
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
                    
                    <div class="col-sm-6" style="">  
                        <div class="form-group row" style="margin-bottom: 5px">
                            <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">전화</label>
                            
                            <div class="col-10">
                                <input class="form-control form-control-sm" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                        </div>
                        
                        <div class="form-group row" style="margin-bottom: 0px">
                        <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">핸드폰전화</label>
                            
                            <div class="col-10">
                                <input class="form-control form-control-sm" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                        </div>
                    </div>   
                    
                    <div class="col-sm-6" style="">  
                        <div class="form-group row" style="margin-bottom: 5px">
                            <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">주소</label>
                            <div class="col-3" style="padding-right: 2px">
                                <input class="form-control form-control-sm" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                            <div class="col-7">
                                <input class="form-control form-control-sm" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                        </div>
                        
                        <div class="form-group row" style="margin-bottom: 0px">
                        <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px"></label>
                            
                            <div class="col-10">
                                <input class="form-control form-control-sm" type="email" value="bootstrap@example.com" id="example-email-input">
                            </div>
                        </div>
                    </div>   

                </div>


                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Email</label>
                    <div class="col-10">
                        <input class="form-control form-control-sm" type="email" value="bootstrap@example.com" id="example-email-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">URL</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="url" value="https://getbootstrap.com" id="example-url-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Telephone</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="tel" value="1-(555)-555-5555" id="example-tel-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Password</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="password" value="hunter2" id="example-password-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Number</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="number" value="42" id="example-number-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Date and time</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="datetime-local" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Date</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="date" value="2011-08-19" id="example-date-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Month</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="month" value="2011-08" id="example-month-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Week</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="week" value="2011-W33" id="example-week-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Time</label>
                    <div class="col-10">
                        <input class= "form-control form-control-sm" type="time" value="13:45:00" id="example-time-input">
                    </div>
                </div>    

                <div class="form-group pull-right" style="margin-top: 5px; margin-bottom: 0px;">
                    <form class="form-inline">
                        <button class="form-control btn-primary form-control-sm mr-sm-2" style="width: 70px"> 취 소 </button>
                        <button class="form-control btn-primary form-control-sm" style="width: 70px"> 등 록 </button>
                    </form>
                </div>            
            </div>

        </div>
    </div>

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
