<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>

    <div class="page-titles title-dark pt20 pb10 mb30">
        <div class="container">
            <div class="row">
                <div class=" col-md-6">
                    <h4>협회가입 - <span>협회가입신청</span></h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb text-md-right">
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">협회가입</li>
                        <li class="breadcrumb-item">협회가입신청</li>
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
        
        <h4 class="mb10">협회가입정보</h4>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 아이디</label>
                    <div class="col-9">                                
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder=""/>
                            <div class="input-group-addon" style="padding-bottom: 0px; padding-top: 0px; font-size: 0.8rem">중복확인</div>
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 이름</label>
                    <div class="col-9">                                
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">영문성명</label>
                    <div class="col-9">                                
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 생년월일</label>
                    <div class="col-9"> 
                        <div class="form-group row" style="margin-bottom: 0px">
                            <div class="col-sm-4" style="padding-left: 15px; padding-right: 0px;">                                                
                                <select class="form-control form-control-sm" name="account">
                                    <option value="">년도</option>
                                    <option value='2010'>2010년</option><option value='2009'>2009년</option><option value='2008'>2008년</option><option value='2007'>2007년</option><option value='2006'>2006년</option><option value='2005'>2005년</option><option value='2004'>2004년</option><option value='2003'>2003년</option><option value='2002'>2002년</option><option value='2001'>2001년</option><option value='2000'>2000년</option><option value='1999'>1999년</option><option value='1998'>1998년</option><option value='1997'>1997년</option><option value='1996'>1996년</option><option value='1995'>1995년</option><option value='1994'>1994년</option><option value='1993'>1993년</option><option value='1992'>1992년</option><option value='1991'>1991년</option><option value='1990'>1990년</option><option value='1989'>1989년</option><option value='1988'>1988년</option><option value='1987'>1987년</option><option value='1986'>1986년</option><option value='1985'>1985년</option><option value='1984'>1984년</option><option value='1983'>1983년</option><option value='1982'>1982년</option><option value='1981'>1981년</option><option value='1980'>1980년</option><option value='1979'>1979년</option><option value='1978'>1978년</option><option value='1977'>1977년</option><option value='1976'>1976년</option><option value='1975'>1975년</option><option value='1974'>1974년</option><option value='1973'>1973년</option><option value='1972'>1972년</option><option value='1971'>1971년</option><option value='1970'>1970년</option><option value='1969'>1969년</option><option value='1968'>1968년</option><option value='1967'>1967년</option><option value='1966'>1966년</option><option value='1965'>1965년</option><option value='1964'>1964년</option><option value='1963'>1963년</option><option value='1962'>1962년</option><option value='1961'>1961년</option><option value='1960'>1960년</option><option value='1959'>1959년</option><option value='1958'>1958년</option><option value='1957'>1957년</option><option value='1956'>1956년</option><option value='1955'>1955년</option><option value='1954'>1954년</option><option value='1953'>1953년</option><option value='1952'>1952년</option><option value='1951'>1951년</option><option value='1950'>1950년</option>                                
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-left: 5px; padding-right: 5px;">                                              
                                <select class="form-control form-control-sm" name="account">
                                    <option value="">월</option>
                                    <option value='1'>1월</option><option value='2'>2월</option><option value='3'>3월</option><option value='4'>4월</option><option value='5'>5월</option><option value='6'>6월</option><option value='7'>7월</option><option value='8'>8월</option><option value='9'>9월</option><option value='10'>10월</option><option value='11'>11월</option><option value='12'>12월</option>                                
                                </select>
                            </div>
                            <div class="col-sm-4" style="padding-left: 0px; padding-right: 14px;">                                         
                                <select class="form-control form-control-sm" name="account">
                                    <option value="">일</option>
                                    <option value='1'>1월</option><option value='2'>2월</option><option value='3'>3월</option><option value='4'>4월</option><option value='5'>5월</option><option value='6'>6월</option><option value='7'>7월</option><option value='8'>8월</option><option value='9'>9월</option><option value='10'>10월</option><option value='11'>11월</option><option value='12'>12월</option><option value='13'>13월</option><option value='14'>14월</option><option value='15'>15월</option><option value='16'>16월</option><option value='17'>17월</option><option value='18'>18월</option><option value='19'>19월</option><option value='20'>20월</option><option value='21'>21월</option><option value='22'>22월</option><option value='23'>23월</option><option value='24'>24월</option><option value='25'>25월</option><option value='26'>26월</option><option value='27'>27월</option><option value='28'>28월</option><option value='29'>29월</option><option value='30'>30월</option><option value='31'>31월</option>                                
                                </select>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 핸드폰</label>
                    <div class="col-9">                                
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input" placeholder="'-' 없이 입력하세요.">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">전화</label>
                    <div class="col-9">                                
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input" placeholder="'-' 없이 입력하세요.">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 회원자격</label>
                    <div class="col-9">                                
                        <select class="form-control form-control-sm" id="exampleSelect1">
                            <!-- <option>자격선택</option> -->
                            <option>준회원 (cqa웹사이트 열람만 가능)</option>
                            <!-- <option>정회원 1년 (30,000원)</option>
                            <option>정회원 2년 (50,000원)</option>
                            <option>정회원 3년 (70,000원)</option>
                            <option>정회원 평생 (300,000원)</option> -->
                        </select>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 추천인</label>
                    <div class="col-9">                                
                        <select class="form-control form-control-sm" id="exampleSelect1">
                            <option value=''>추천인선택</option>
                            <option value='10'>[LYDIA 30] 장흥숙 (10-00)</option>
                            <option value='07' >[S퀼트] 송재란 (07-00)</option>
                            <option value='09' >[그린퀼트] 김경주 (09-00)</option>
                            <option value='04-01' >[생활의향기] 이현정 (04-01)</option>
                            <option value='07-07' >[소소공방] 현미경 (07-07)</option>
                            <option value='08' >[아원퀼트] 최은영 (08-00)</option>
                            <option value='03-05' >[요술나라 요술 손] 유미숙 (03-05)</option>
                            <option value='01-04' >[퀼트 수작] 변성혜 (01-04)</option>
                            <option value='08-03' >[퀼트 조] 조현화 (08-03)</option>
                            <option value='11-03' >[퀼트&돌] 오승미 (11-03)</option>
                            <option value='07-04' >[퀼트&미] 김미정 (07-04)</option>
                            <option value='09-05' >[퀼트나들이] 박정애 (09-05)</option>
                            <option value='07-06' >[퀼트바람] 이수연 (07-06)</option>
                            <option value='01' >[퀼트지음] 엄재영/오선희 (01-00)</option>
                            <option value='03' >[한혜경퀼트] 한혜경 (03-00)</option>
                            <option value='03-04' >[허니비퀼트] 김정미 (03-04)</option>
                            <option value="00-00" >추천인 없음 (00-00)</option>
                        </select>                  
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 비밀번호</label>
                    <div class="col-9">          
                        <input class="form-control form-control-sm" type="search" value="" id="example-search-input" placeholder="8자리이상">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 비밀번호확인</label>
                    <div class="col-9">                                
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px"><i class="ti-check"></i> 사진</label>
                    <div class="col-9" style="padding-top: 1px">      
                        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">이메일</label>
                    <div class="col-9">                                
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <input type="text" class="form-control form-control-sm" id="inlineFormInputGroup" placeholder=""/>
                            <div class="input-group-addon" style="padding-bottom: 0px;padding-top: 0px; font-size: 0.8rem">@</div>
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">홈페이지</label>
                    <div class="col-9">                                
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
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
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
                    </div>
                </div>
                <div class="form-group row" style="margin-bottom: 5px">
                    <label for="example-text-input" class="col-3 col-form-label text-right" style="padding-right: 0px">상세주소</label>
                    <div class="col-9">                                
                        <input class="form-control form-control-sm" type="text" value="" id="example-text-input">
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
