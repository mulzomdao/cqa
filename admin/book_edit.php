<?
    session_start();
    include "lib/session.php";
    include "lib/connect.php";
    include "lib/variable.php";
    include "lib/function.php";

    $query = "
        SELECT a.book_seq
             , a.book_type
             , a.book_name
             , a.book_image
             , a.book_config
             , a.book_supply_com
             , a.book_price
             , a.stock_count
             , a.book_state
             , a.book_summary
             , a.book_content
             , a.book_memo
             , a.use_flag 
             , a.reg_id 
             , a.reg_date 
             , a.modify_id 
             , a.modify_date
             , concat(b.file_path, b.new_file_name) file_path
             , b.file_name
             , b.file_size
          FROM cqa_book a left outer 
          join (select a.book_seq
                     , b.file_seq
                     , b.file_path
                     , b.file_name
                     , b.new_file_name
                     , b.file_size
                 From (select book_seq, max(file_seq) file_seq from cqa_book_file where use_flag = 'Y' group by book_seq) a
                    , cqa_file b
                where 1 = 1
                  and a.file_seq = b.file_seq) b 
            on a.book_seq = b.book_seq
         where a.use_flag = 'Y'
           and a.book_seq = $_GET[book_seq]";    
    
    $result = mysqli_query($connect, $query);  
    $row = mysqli_fetch_array($result);        
        
    if ($result === false) {            
        var_dump($query);
    }
?>

<!DOCTYPE html>
<html>

<head>    
    <?include "include/admin_head.php";?>    

    <link href="inspinia/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="inspinia/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">    
    
    <link href="inspinia/css/animate.css" rel="stylesheet">
    <link href="inspinia/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="inspinia/css/plugins/dropzone/dropzone.css" rel="stylesheet">
</head>    

<body>
    <div id="wrapper">

        <?include "include/admin_navigation.php"?>

        <div id="page-wrapper" class="gray-bg dashbard-1">

            <?include "include/admin_top.php"?>

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>교재상세</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <strong>교재관리</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>            

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>교재정보</small></h5>
                            </div>
                            <div class="ibox-content" style="padding-bottom: 10px">

                                <fieldset class="form-horizontal">

                                    <form role="form" id="book_edit" action="book_crud.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="db_access_flag" name="db_access_flag" value="book_edit">
                                        <input type="hidden" id="book_seq" name="book_seq" value="<?echo $row[book_seq]?>">

                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 품목</label>
                                            <div class="col-sm-5">
                                                <?array_radio("book_type", $_book_type, $row[book_type])?>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 품명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="book_name" name="book_name" value="<?echo $row[book_name]?>" placeholder=""/></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">                                        
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">상품이미지</label>
                                            <div class="col-sm-5">         
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput" style="margin: 0px">
                                                    <div class="form-control input-sm" data-trigger="fileinput">
                                                        <i class="glyphicon glyphicon-file fileinput-exists"></i>
                                                    <span class="fileinput-filename">
                                                    <?if ($row[file_name] != "") {?>
                                                        <i class="glyphicon glyphicon-file fileinput-new"></i> <?echo $row[file_name]?>
                                                    <?}?>
                                                    </span>
                                                    </div>
                                                    <span class="input-group-addon btn-sm btn-default btn-file">
                                                        <span class="fileinput-new"><small>Select file</small></span>
                                                        <span class="fileinput-exists"><small>Change</small></span>
                                                        <input type="file" name="book_image"/>
                                                    </span>
                                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput"><small>Remove</small></a>
                                                    <?if ($row[file_name] != "") {?>
                                                    <a href="<?echo $row[file_path]?>" target="_blank" class="input-group-addon btn fileinput-new"><small>Image View</small></a>
                                                    <?}?>
                                                </div> 
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">구성/크기</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="book_config" name="book_config" value="<?echo $row[book_config]?>" placeholder=""/></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 소비자가</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control input-sm text-right number" id="book_price" name="book_price" value="<?echo $row[book_price]?>" placeholder="소비자가"/>
                                            </div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">재고수량</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm text-right number" id="stock_count" name="stock_count" value="<?echo $row[stock_count]?>" placeholder="0"/></div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">요약설명</label>
                                            <div class="col-sm-5"><input type="text" class="form-control input-sm" id="book_summary" name="book_summary" value="<?echo $row[book_summary]?>" placeholder=""/></div>
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 상태</label>
                                            <div class="col-sm-5">
                                                <?array_radio("book_state", $_book_state, $row[book_state])?>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px"><i class="fa fa-check"></i> 교재설명</label>
                                            <div class="col-sm-11">
                                                <textarea id="book_content" name="book_content" runat="server" class="summernote" clientIDMode="static"><?echo $row[book_content]?></textarea>                                       
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px">
                                            <label class="col-sm-1 control-label" style="padding-left: 0px; padding-right: 0px">관리메모</label>
                                            <div class="col-sm-11"><textarea class="form-control" rows="3" id="book_memo" name="book_memo"><?echo $row[book_memo]?></textarea></div>
                                        </div>
                                        <div class="form-group pull-right" style="margin-bottom: 0px; padding-right: 15px">
                                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                                            <a type="button" class="btn btn-sm btn-success" id="book_delete">Delete</a>
                                            <a type="button" class="btn btn-sm btn-success" href="javascript:history.go(-1)">Cancel</a>
                                        </div>
                                    </form>

                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?include "include/admin_bottom.php"?>

        </div>        
    </div>

    <?include "include/admin_js.php"?>
    <!-- SUMMERNOTE -->
    <script src="inspinia/js/plugins/summernote/summernote.min.js"></script>    
    <!-- DROPZONE -->
    <script src="inspinia/js/plugins/dropzone/dropzone.js"></script>

    <script src="js/jquery.number.min.js"></script>

    <script>

        $(document).ready(function() {

            $('.summernote').summernote({
                height: 200,
                lang: 'ko-KR',
            });

            $('input.number').number(true);

            $("#book_edit").validate({
                rules: {
                    book_name: {
                        required: true,
                        rangelength: [4, 40]
                    },
                    book_price: {
                        required: true
                    }
                }, submitHandler: function (form) {
                    if (confirm("수정 하시겠습니까?")) {
                        form.submit();
                    }     
                }
            });
            
            $("#book_delete").click(function(){
                if (confirm('삭제 하시겠습니까?')) {
                    location.replace('book_crud.php?db_access_flag=book_delete&book_seq=<?echo $row[book_seq]?>');
                }
            });

        });
        
        Dropzone.options.dropzoneForm = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            dictDefaultMessage: "<strong>Drop files here or click to upload. </strong></br> (This is just a demo dropzone. Selected files are not actually uploaded.)",
        };
    </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.7.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 01 Mar 2018 07:31:34 GMT -->
</html>
