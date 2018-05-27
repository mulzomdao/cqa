<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[id_name_no] != "") {
        $filter .= "and (member_id like '%$_GET[id_name_no]%' or member_name like '%$_GET[id_name_no]%' or member_no like '%$_GET[id_name_no]%') ";
    }
    if ($_GET[right_flag] != "") {
        $filter .= "and right_flag = '$_GET[right_flag]'";
    }
    if ($_GET[member_level] != "") {
        $filter .= "and member_level = '$_GET[member_level]'";
    }
    if ($_GET[office_id] != "") {
        $filter .= "and office_id = '$_GET[office_id]'";
    }

    $query = "
        select count(*) total 
          FROM cqa_member_v a
             , cqa_office_id_v b
         where a.office_id = b.office_id
           and a.use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        SELECT a.member_id
             , a.member_no
             , a.office_id
             , a.member_name
             , a.member_eng_name
             , a.member_password
             , a.member_level
             , a.member_right
             , a.right_start_date
             , a.right_end_date
             , a.right_flag
             , a.birthday
             , a.sex
             , a.mobile
             , a.email
             , a.phone
             , a.zip_code
             , a.zip_address
             , a.detail_address
             , a.member_memo
             , a.use_flag
             , a.reg_id
             , a.reg_date
             , a.modify_id
             , a.modify_date
             , b.office_info
          FROM cqa_member_v a
             , cqa_office_id_v b
         where 1 = 1
           and a.office_id = b.office_id
           and a.use_flag = 'Y' $filter
         order by a.reg_date desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);

    $query = "
        select office_id
             , office_info
          From cqa_office_id_v
    ";    
    // var_dump($query);
    $office_id_result = mysqli_query($connect, $query);
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
                    <h2>회원목록</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li class="active">
                            <strong>회원관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">                                    
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>회원목록조회</h5>
                    </div>
                    <div class="ibox-content" style="padding: 15px">
                        <div class="row">
                            
                            <form role="form" id="member_list" action="member_list.php" method="get">
                                <div class="col-sm-3" style="padding-left: 15px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">                                        
                                            <input type="text" class="form-control input-sm btn-submit" name="id_name_no" id="id_name_no" value="<?echo $_GET[id_name_no]?>" placeholder="아이디/성명/회원번호">
                                            <span class="input-group-btn" style="vertical-align: top">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">                        
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b btn-submit" name="member_right" id="member_right" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>자격선택</option>
                                                <?array_combo($_member_right, $_GET[member_right])?>
                                            </select>
                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>       
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 5px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            
                                            <select class="form-control input-sm m-b btn-submit" name="right_flag" id="right_flag" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>자격상태선택</option>
                                                <?array_combo($_right_flag, $_GET[right_flag])?>
                                            </select>

                                            <span class="input-group-btn">
                                                <button type="submit" class="btn btn-sm btn-white btn-submit"><i class="fa fa-search"></i></button> 
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3" style="padding-left: 5px; padding-right: 15px">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <select class="form-control input-sm m-b btn-submit" name="office_id" id="office_id" style="padding-bottom: 2px; margin-bottom: 0px; padding-top: 0px; padding-left: 5px;">
                                                <option value=''>추천인선택</option>
                                                <?while ($rows = mysqli_fetch_array($office_id_result)) {?>
                                                <option value="<?echo $rows[office_id]?>" <?if ($_GET[office_id] == $rows[office_id]) {echo "selected";}?>><?echo $rows[office_info]?></option>
                                                <?}?>
                                            </select>

                                            <span class="input-group-btn">
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
                                <th data-hide="phone" class="text-center">아이디</th>
                                <th data-hide="phone" class="text-center">성명</th>
                                <th data-hide="phone" class="text-center">휴대폰</th>
                                <th data-hide="phone" class="text-center">회원번호</th>
                                <th data-hide="phone" class="text-center">추천인</th>
                                <th data-hide="phone" class="text-center">자격상태</th>
                                <th data-hide="phone" class="text-center">최종자격기간</th>
                                <th data-hide="phone" class="text-center">등록일</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>

<?
    while ($rows = mysqli_fetch_array($result)) {
?>
                            <tr class="text-center">
                                <td class="text-center"><?echo $total?></td>
                                <td><a href="member_edit.php?member_id=<?echo $rows[member_id]?>"><?echo $rows[member_id]?></a></td>
                                <td><?echo $rows[member_name]?></td>
                                <td><?echo phone_number($rows[mobile])?></td>
                                <td><?echo $rows[member_no]?></td>
                                <td><?echo $rows[office_info]?></td>
                                <td><?echo $_right_flag[$rows[right_flag]]?></td>
                                <td><?echo $rows[right_start_date]?> ~ <?echo $rows[right_end_date]?></td>
                                <td><?echo $rows[reg_date]?></td>
                                <td class="text-right">
                                    <div class="btn-group">
                                        <a type="button" class="btn btn-xs btn-white" href="member_edit.php?member_id=<?echo $rows[member_id]?>">View</a>
                                        <a type="button" class="btn btn-xs btn-white" href="javascript:member_delete('<?echo $rows[member_id]?>')">Delete</a>
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
                                <td colspan="5" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">                                    
                                    <a type="button" class="btn btn-sm btn-success" href="member_add.php">Add</a>
                                    <a type="button" class="btn btn-sm btn-success" onclick="excel_down()">Excel Down</a>
                                </td>                                
                                <td colspan="5" style="padding-right: 0px; padding-left: 0px; padding-bottom: 0px;">
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

            $("#member_list").validate({
                rules: {
                    id_name_no: {
                        minlength: 2,
                        maxlength: 20
                    }
                }, submitHandler: function (form) {
                    form.submit();
                }
            });

            $('.btn-submit').click(function(){
                $("#member_list").attr("action", "member_list.php");
            });

        });

        function excel_down() {
            if (confirm('엑셀다운 받으시겠습니까?')) {
                $("#member_list").attr("action", "member_excel.php");
                $("#member_list").submit();
            }
        }

        function member_delete(member_id) {
            if (confirm("삭제하시겠습니까?")) {
                location.href="member_crud.php?db_access_flag=member_delete&member_id="+member_id;
            }
        }
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
