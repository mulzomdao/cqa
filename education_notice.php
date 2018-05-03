<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>

    <div class="page-titles title-dark pt20 pb10 mb30">
        <div class="container">
            <div class="row">
                <div class=" col-md-6">
                    <h4>CQA교육/교재 - <span>교육공지</span></h4>
                </div>
                <div class="col-md-6 mb0">
                    <ol class="breadcrumb text-md-right">
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">CQA교육/교재</li>
                        <li class="breadcrumb-item">교육공지</li>
                    </ol>
                </div>
            </div>
        </div>
    </div><!--page title end-->

    <div class="container mb30" style="padding-left: 30px; padding-right: 30px;">
        <div class="row">
            <div class="col-md-12">                    
                <h4 class="mb10">Default Unordered Lists</h4>
                <ul class="mb30">
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>
                        Nulla volutpat aliquam velit 
                        <ul>
                            <li>Phasellus iaculis neque</li>
                        </ul>
                    </li>
                    <li>Faucibus porta lacus fringilla vel</li>
                </ul>
                <h4 class="mb10">Ordered Lists</h4>
                <ol class="mb30">
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>Consectetur adipiscing elit</li>
                    <li>
                        Nulla volutpat aliquam velit 
                        <ul>
                            <li>Phasellus iaculis neque</li>
                            <li>Purus sodales ultricies</li>
                        </ul>
                    </li>
                    <li>Faucibus porta lacus fringilla vel</li>
                </ol>
                <h4 class="mb10">Unstyles Lists</h4>
                <p>
                    Add the class 
                    <code>.list-unstyled</code>
                    to 
                    <code>ul</code>
                    elements to remove all default styling from the list.
                </p>
                <ul class="mb30 list-unstyled">
                    <li>Lorem ipsum dolor sit amet</li>
                    <li>
                        Nulla volutpat aliquam velit 
                        <ul>
                            <li>Phasellus iaculis neque</li>
                        </ul>
                    </li>
                    <li>Faucibus porta lacus fringilla vel</li>

                </ul>
                <h4 class="mb10">Inline Lists</h4>
                <p>
                    Add the class 
                    <code>.list-inline</code>
                    to the 
                    <code>ul</code>
                    element and 
                    <code>.list-inline-item</code>
                    to each list item.
                </p>
                <ul class="list-inline" style="margin-bottom: 0px">
                    <li class="list-inline-item">Lorem ipsum</li>
                    <li class="list-inline-item">Phasellus iaculis</li>
                    <li class="list-inline-item">Nulla volutpat</li>
                </ul>
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
