<?
    session_start();
   
	set_time_limit(0);
	$filename = "회원목록_".date("YmdHis");

	Header("Cache-Control: cache, must-revalidate");				// 열기할때 잘나오게..
	header( "Content-type: application/vnd.ms-excel" );
	header( "Content-Disposition: attachment; filename=$filename.xls" );
    header( "Content-Description: PHP5 Generated Data" );
    
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    if ($_GET[id_name_no] != "") {
        $filter .= "and (member_id like '%$_GET[id_name_no]%' or member_name like '%$_GET[id_name_no]%' or member_no like '%$_GET[id_name_no]%') ";
    }
    if ($_GET[member_right] != "") {
        $filter .= "and member_right = '$_GET[member_right]'";
    }
    if ($_GET[member_level] != "") {
        $filter .= "and member_level = '$_GET[member_level]'";
    }
    if ($_GET[office_id] != "") {
        $filter .= "and office_id = '$_GET[office_id]'";
    }

    $query = "
        select count(*) total 
          from cqa_member
         where use_flag = 'Y' $filter
    ";
	$result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $total = $row['total'];

    $query = "
        SELECT member_id
             , member_no
             , office_id
             , member_name
             , member_eng_name
             , member_password
             , member_level
             , member_right
             , DATE_FORMAT(a.right_start_date, '%Y-%m-%d') right_start_date
             , DATE_FORMAT(a.right_end_date, '%Y-%m-%d') right_end_date
             , CASE when member_right = 0 THEN '준회원' 
                    WHEN right_start_date < NOW() and now() <= right_end_date then '유효'
                    else '만료'
               end right_flag
             , if(DATE_FORMAT(a.birthday, '%Y-%m-%d') = '0000-00-00', '', DATE_FORMAT(a.birthday, '%Y-%m-%d')) birthday
             , sex
             , CONCAT(mobile) mobile 
             , CONCAT(phone) phone
             , email
             , homepage
             , case when zip_code != '' then concat('[', zip_code, ']')
               end zip_code
             , zip_address
             , detail_address
             , member_memo
             , use_flag
             , reg_id
             , DATE_FORMAT(a.reg_date, '%Y-%m-%d %H:%i:%s') reg_date 
             , modify_id
             , DATE_FORMAT(a.modify_date, '%Y-%m-%d %H:%i:%s') modify_date 
          FROM cqa_member a
         where use_flag = 'Y' $filter
         order by reg_date desc
    ";    
    // var_dump($query);
    $result = mysqli_query($connect, $query);
?>

<!DOCTYPE html>
<html>

<head>    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Corea Quilt Associate | Admin</title>    
</head>    
<style>
    table * {mso-number-format:'\@';} 
</style>
<body>

<table width="1200" border="1" cellpadding="2" cellspacing="0" bordercolor="#CCCCCC" bgcolor="#ffffff">
	<tr>
		<td>
			<table border="1" cellpadding="1" cellspacing="0" width="100%" style="border-collapse:collapse" bordercolor="#CCCCCC">
				<tr height=20>
					<td>No</td>
                    <td>회원ID</td>
                    <td>회원번호</td>
                    <td>추천인ID</td>
                    <td>회원명</td>
                    <td>영문회원명</td>
                    <td>등급</td>
                    <td>자격</td>
                    <td>등급시작일</td>
                    <td>등급종료일</td>
                    <td>생년월일</td>
                    <td>휴대폰</td>
                    <td>전화번호</td>
                    <td>이메일</td>
                    <td>홈페이지</td>
                    <td>주소</td>
                    <td>등록자ID</td>
                    <td>등록일</td>
                    <td>수정자ID</td>
                    <td>수정일</td>
				</tr>

<?
    while ($rows = mysqli_fetch_array($result)) {
?>
				<tr>
                    <td><?echo $total?></td>
                    <td><?echo $rows[member_id]?></td>
                    <td><?echo $rows[member_no]?></td>
                    <td style='mso-number-format:\@;'><?echo $rows[office_id]?></td>
                    <td><?echo $rows[member_name]?></td>
                    <td><?echo $rows[member_eng_name]?></td>
                    <td><?echo $rows[member_level]?></td>
                    <td><?echo $rows[member_right]?></td>
                    <td><?echo $rows[right_start_date]?></td>
                    <td><?echo $rows[right_end_date]?></td>
                    <td><?echo $rows[birthday]?></td>
                    <td style='mso-number-format:\@;'><?echo $rows[mobile]?></td>
                    <td style='mso-number-format:\@;'><?echo $rows[phone]?></td>
                    <td><?echo $rows[email]?></td>
                    <td><?echo $rows[homepage]?></td>
                    <td style='mso-number-format:\@;'><?echo $rows[zip_code]?> <?echo $rows[zip_address]?> <?echo $rows[detail_address]?></td>
                    <td><?echo $rows[reg_id]?></td>
                    <td style='mso-number-format:\@;'><?echo $rows[reg_date]?></td>
                    <td><?echo $rows[modify_id]?></td>
                    <td style='mso-number-format:\@;'><?echo $rows[modify_date]?></td>
				</tr>
<?
			$total--;
	} 
?>
			</table>
		</td>
	</tr>
</table>

</body>
<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
