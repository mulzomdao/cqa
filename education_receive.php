<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>

    <div class="page-titles title-dark pt20 pb10 mb30">
        <div class="container">
            <div class="row">
                <div class=" col-md-6">
                    <h4>CQA교육/교재 - <span>교육접수</span></h4>
                </div>
                <div class="col-md-6 mb0">
                    <ol class="breadcrumb text-md-right">
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">CQA교육/교재</li>
                        <li class="breadcrumb-item">교육접수</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!--page title end-->

    <div class="container mb30" style="padding-left: 30px; padding-right: 30px;">
        <div class="row">

            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group row" style="margin-bottom: 5px">
                            <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Text</label>
                            <div class="col-10">
                                <input class="form-control form-control-sm" type="text" value="Artisanal kale11" id="example-text-input">
                            </div>
                        </div>
                        <div class="form-group row" style="margin-bottom: 5px">
                        <label for="example-text-input" class="col-2 col-form-label text-right" style="padding-right: 0px">Search</label>
                            <div class="col-10">
                                <input class="form-control form-control-sm" type="search" value="How do I shoot web" id="example-search-input">
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
