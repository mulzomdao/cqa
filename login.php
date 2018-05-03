<!DOCTYPE html>
<html lang="en">
    
<?include "include/head.php";?>

<body>    
    <?include "include/top.php";?>    

    <div class="bg-parallax parallax-overlay accounts-page"  data-jarallax='{"speed": 0.2}' style="padding-top: 140px; padding-bottom: 160px">
        <div class="container">
            <div class="row pb30">
                <div class="col-lg-4 col-md-6 mr-auto ml-auto col-sm-8">
                    <h3 class="text-white text-center mb30">Login to continue</h3>
                    <form>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-rounded btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- <div class="text-center"><a href="#" class="btn btn-link btn-block">Having trouble logging in?</a></div> -->
                        <hr>
                        <div>
                            <a href="member_join.php" class="btn btn-white-outline btn-block">Sign Up</a>
                        </div>
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
