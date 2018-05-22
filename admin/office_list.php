<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[office_id] != "") {
        $filter .= "and office_id like '$_GET[office_id]%'";
    }
    if ($_GET[member_name] != "") {
        $filter .= "and member_name like '%$_GET[member_name]%'";
    }
    if ($_GET[office_area] != "") {
        $filter .= "and office_area like '%$_GET[office_area]%'";
    }
    if ($_GET[office_name] != "") {
        $filter .= "and office_name like '%$_GET[office_name]%'";
    }

    $query = "
        select count(*) total 
          from cqa_office
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        SELECT a.office_id
             , a.office_num
             , a.sub_office_num
             , a.office_num
             , a.member_name
             , a.office_name
             , a.office_area
             , a.mobile
             , a.email
             , a.homepage
             , a.confirm_flag
             , a.phone
             , a.zip_code
             , a.zip_address
             , a.detail_address
             , a.shop_phone
             , a.shop_zip_code
             , a.shop_zip_address
             , a.shop_detail_address
             , a.office_memo
             , a.use_flag
             , a.reg_id
             , a.reg_date
             , a.modify_id
             , a.modify_date
             , case when b.recommend_count is null then 0
                    else b.recommend_count
                end recommend_count
          From cqa_office_v a left OUTER JOIN cqa_member_recommend_v b on a.office_id = b.recommend_id
         where a.use_flag = 'Y' $filter
         order by a.office_id
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>

<head>    
    <?include "include/admin_head.php";?>    
</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <?include "include/admin_top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>지회/지부목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>지회/지부관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>지회/지부목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            
                            <form role="form" id="office_list" action="office_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group"><input type="text" class="form-control input-sm" name="office_id" id="office_id" value="<?echo $_GET[office_id]?>" placeholder="지회/지부번호">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" name="member_name" id="member_name" value="<?echo $_GET[member_name]?>" placeholder="성명">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" name="office_area" id="office_area" value="<?echo $_GET[office_area]?>" placeholder="지역">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 15px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" name="office_name" id="office_name" value="<?echo $_GET[office_name]?>" placeholder="상호명">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                        
                        <table class="footable table table-stripped toggle-arrow-tiny" style="margin-bottom: 0px">
                            <thead>
                            <tr>
                                <th width="48" class="text-center">No</th>
                                <th data-hide="phone" class="text-center">지역</th>
                                <th data-hide="phone">지회/지부번호</th>
                                <th data-hide="phone" class="text-center">성명</th>
                                <th data-hide="phone" class="text-center">상호명</th>
                                <th data-hide="phone" class="text-center">추천수</th>
                                <th data-hide="phone" class="text-center">등록일</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?
    while ($rows = mysqli_fetch_array($result)) {
?>
                            <tr class="text-center">
                                <td><?echo $total?></td>
                                <td><?echo $rows[office_area]?></td>
                                <td class="text-left">
                                    <?if ($rows[sub_office_num] != "") {echo "&nbsp;&nbsp;&nbsp;&nbsp; └ ";}?>
                                    <a href="office_edit.php?office_id=<?echo $rows[office_id]?>"><?echo $rows[office_id]?></a>
                                </td>
                                <td><?echo $rows[member_name]?></td>
                                <td><?echo $rows[office_name]?></td>
                                <td><?echo $rows[recommend_count]?></td>
                                <td><?echo $rows[reg_date]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="office_add.php?office_num=<?echo $rows[office_num]?>">Add</a>
                                        <a type="button" class="btn btn-xs btn-white" href="office_edit.php?office_id=<?echo $rows[office_id]?>">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:office_delete('<?echo $rows[office_id]?>')">Delete</a>
                                    </div>
                                </td>
                            </tr>
<?
        $total--;
    }
?>                  
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="8" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                                                    
                                    <a type="button" class="btn btn-sm btn-success" href="office_add.php">Add</a>
                                    <!-- <a type="button" class="btn btn-sm btn-success">Excel Down</a> -->

                                    <!-- <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-left"></i></button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-left"></i></button>
                                        <button class="btn btn-sm btn-white">1</button>
                                        <button class="btn btn-sm btn-white  active">2</button>
                                        <button class="btn btn-sm btn-white">3</button>
                                        <button class="btn btn-sm btn-wh btn-smite">4</button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-right"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-right"></i> </button>
                                    </div> -->

                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-left"></i></button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-left"></i></button>
                                        <button class="btn btn-sm btn-white active">1</button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-right"></i> </button>
                                        <button type="button" class="btn btn-sm btn-white"><i class="fa fa-angle-double-right"></i> </button>
                                    </div>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <?include "include/admin_bottom.php"?>

        </div>        
    </div>

    <?include "include/admin_js.php"?>

    <script>
        $(document).ready(function() {

            $('.footable').footable();

            $("#office_list").validate({
                rules: {
                    office_id: {
                        rangelength: [2, 20]
                    }, 
                    member_name: {
                        rangelength: [2, 20]
                    }, 
                    office_area: {
                        rangelength: [2, 20]
                    }, 
                    office_name: {
                        rangelength: [2, 20]
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

        });

        function office_delete(office_id) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="office_crud.php?db_access_flag=office_crud_delete&office_id="+office_id;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
