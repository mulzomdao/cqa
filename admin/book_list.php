<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[book_type] != "") {
        $filter .= "and book_type = '$_GET[book_type]'";
    }
    if ($_GET[book_name] != "") {
        $filter .= "and book_name like '%$_GET[book_name]%'";
    }
    if ($_GET[book_state] != "") {
        $filter .= "and book_state = '$_GET[book_state]'";
    }
    if ($_GET[book_summary] != "") {
        $filter .= "and book_summary <= '$_GET[book_summary]'"; 
    }

    $query = "
        select count(*) total 
          from cqa_book
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        SELECT book_seq
             , book_type
             , book_name
             , book_image
             , book_config
             , book_supply_com
             , book_price
             , stock_count
             , book_state
             , book_summary
             , book_content
             , book_memo
             , use_flag 
             , reg_id 
             , reg_date 
             , modify_id 
             , modify_date 
          FROM cqa_book
         where use_flag = 'Y' $filter
         order by book_seq desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
        
    if ($result === false) {
        var_dump($query);
    }
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
                    <h2>교재목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>교재관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>교재목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            
                            <form role="form" id="book_list" action="book_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b" id="book_type" name="book_type" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">품목</option>
                                                <option value='TEXT_BOOK' <?if ($_GET[book_type] == 'TEXT_BOOK') {echo 'selected';}?>><?echo $_book_type[TEXT_BOOK]?></option>
                                                <option value='TEMPLATE' <?if ($_GET[book_type] == 'TEMPLATE') {echo 'selected';}?>><?echo $_book_type[TEMPLATE]?></option>
                                            </select>
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" id="book_name" name="book_name" value="<?echo $_GET[book_name]?>" placeholder="품명">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>       
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b" id="book_state" name="book_state" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value="">상태</option>
                                                <option value='EXPECT' <?if ($_GET[book_state] == 'EXPECT') {echo 'selected';}?>><?echo $_book_state[EXPECT]?></option>
                                                <option value='ON_SALE' <?if ($_GET[book_state] == 'ON_SALE') {echo 'selected';}?>><?echo $_book_state[ON_SALE]?></option>
                                                <option value='PAUSE' <?if ($_GET[book_state] == 'PAUSE') {echo 'selected';}?>><?echo $_book_state[PAUSE]?></option>
                                                <option value='SUSPEND' <?if ($_GET[book_state] == 'SUSPEND') {echo 'selected';}?>><?echo $_book_state[SUSPEND]?></option>
                                            </select>
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control input-sm" id="book_summary" name="book_summary" value="<?echo $_GET[book_summary]?>" placeholder="요약설명">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <table class="footable table table-stripped" data-page-size="20" style="margin-bottom: 0px">
                            <thead>
                            <tr>
                                <th width="48" class="text-center">No</th>
                                <th data-hide="phone" class="text-center">품목</th>
                                <th data-hide="phone" class="text-left">품명</th>
                                <th data-hide="phone" class="text-center">상태</th>
                                <th data-hide="phone" class="text-right">가격</th>
                                <th data-hide="phone" class="text-right">재고</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
<?
    while ($rows = mysqli_fetch_array($result)) {
?>
                            <tr class="text-center">
                                <td><?echo $total?></td>
                                <td><?echo $_book_type[$rows[book_type]]?></td>
                                <td class="text-left"><a href="book_edit.php?book_seq=<?echo $rows[book_seq]?>"><?echo $rows[book_name]?></a></td>
                                <td><?echo $_book_state[$rows[book_state]]?></td>
                                <td class="text-right"><?echo number_format($rows[book_price])?></td>
                                <td class="text-right"><?echo number_format($rows[stock_count])?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="#">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="book_edit.php?book_seq=<?echo $rows[book_seq]?>">Edit</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:book_delete(<?echo $rows[book_seq]?>)">Delete</a>
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
                                <td colspan="3" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    <a type="button" class="btn btn-sm btn-success" href="book_add.php">Add</a>
                                </td>
                                <td colspan="4" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
                                    <ul class="pagination pull-right"></ul>
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

            $("#book_list").validate({
                rules: {
                    book_name: {
                        minlength: 2,
                        maxlength: 20
                    },
                    book_summary: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

        });

        function book_delete(book_seq) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="book_crud.php?db_access_flag=book_delete&book_seq="+book_seq;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
