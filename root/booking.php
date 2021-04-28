<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 27/1/2560
 * Time: 15:51
 */
include('header.php');
include('connect.php');
include('booking_controller.php');
include_once('inc/admin/query_statement.php');
?>
<?php
session_start();
$chkPage = 'booking';
$_SESSION['currentPage'] = $chkPage;
$isAdmin = $_SESSION['isAdmin'];

$bgData = getBgByPage('bg_' . $chkPage);
$TitleData = getContentByPageSection('Title_booking');
$topicData = getContentByPageSection('Booking_topic');
$branchData = getAllBranch();

$useragent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
    ?>
    <link href="datePicker/css/default.css" rel="stylesheet" type="text/css"/>
    <link href="datePicker/css/default.date.css" rel="stylesheet" type="text/css"/>
<?php } else { ?>
    <link href="datePicker/css/classic.css" rel="stylesheet" type="text/css"/>
    <link href="datePicker/css/classic.date.css" rel="stylesheet" type="text/css"/>
<?php }
?>

<!--body modify at 2017.01.24-->
<body class="bg_booking"
      <?php if ($bgData != null) { ?>style="background: url(<?php echo $bgData['img_path']; ?>) no-repeat center center " <?php } ?>>

<div class="left_content">
    <div class="content_aboutus">
        <?php include('inc/slide_menu.php'); ?>
    </div>
</div>

<div class="right_content">
    <?php if ($isAdmin) { ?>
        <div id="modify_bg" style="float: right">
            Edit Background<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img
                    src="images/bt-edit.png" border="0" align="absmiddle"/></a>
        </div>
    <?php } ?>
    <div class="content_aboutus">
        <div class="title_header">
            <?php if ($TitleData['firstpage'] != null) {
                echo $TitleData['firstpage'];
            } else { ?> BOOK A TABLE <?php } ?>
            <?php if ($isAdmin) { ?> <a href="admin/edit_firstpage.php?id=<?php echo $TitleData['id']; ?>"
                                        class="bg"><img src="images/bt-edit.png" border="0"
                                                        align="absmiddle"/></a> <?php } ?>
        </div>
        <div class="booking_table">
            <p class="booking_title">
                <?php if ($topicData['firstpage'] != null) {
                    echo $topicData['firstpage'];
                } else { ?> Booking a table online is easy and takes just a couple of minutes. <?php } ?>
                <?php if ($isAdmin) { ?> <a href="admin/edit_firstpage.php?id=<?php echo $topicData['id']; ?>"
                                            class="bg"><img src="images/bt-edit.png" border="0"
                                                            align="absmiddle"/></a> <?php } ?>
            </p>
            <hr class="line_title">
            <div class="clearfixed"></div>
            <div class="booking_form">
                <?php if($msg == ''){ ?>
                <form id="booking-form" method="post" enctype="multipart/form-data" action="booking.php">
                    <div class="row">
                        <div class="col-md-1 col-xs-3" style="padding: 0;">
                            <span>Venue :</span>
                        </div>
                        <div class="col-md-2 col-xs-9" style="padding: 0;">
                                <span>
                                    <select id="book_venue" name="book_venue" class="form-control"
                                            style="width: 90%; padding-top: 0px; padding-bottom: 0px; text-align-last: center; height: 30px"
                                            onchange="populateTime(this.value)">
                                        <option value="0"></option>
                                        <?php while ($rs = mysql_fetch_array($branchData)) {
                                            ?>
                                
                                            <option
                                                value="<?php echo $rs['ID']; ?>" <?php echo ($rs['ID'] == $venue) ? 'selected' : ''; ?>><?php echo $rs['BRANCH_NAME']; ?></option>
                                        <?php } ?>
                                    </select>
                                </span>
                                <span style="color: red">*<?php echo $err_venue; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-6" style="padding: 0;">
                            <span>Number of People : </span>
                        </div>
                        <div class="col-md-1 col-xs-6" style="padding: 0;">
                            <span>
                                <input id="book_numP" name="book_numP" type="number" min="1" max="99" class="long-book-num form-control" style="height: 30px"
                                       value="<?php echo $numP; ?>"/>
                            </span>
                            <span style="color: red">*<?php echo $err_numP; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1 col-xs-3" style="padding: 0;">
                            <span>Date : </span>
                        </div>
                        <div class="col-md-2 col-xs-9" style="padding: 0;">
                            <span>
                                <input id="book_date" name="book_date" type="text" class="form-control"
                                       style="width:90%; height: 30px" value="<?php echo $date; ?>"/>
                            </span>
                            <span style="color: red">*<?php echo $err_date; ?></span>
                        </div>
                    </div>
                    <div id="container"></div>
                    <div class="row">
                        <div class="col-md-1 col-xs-3" style="padding: 0;">
                            <span>Time : </span>
                        </div>
                        <div class="col-md-2 col-xs-9" style="padding: 0;">
                            <span>
                                <select id="timepicker1" name="timepicker1" class="form-control"
                                        style="width: 90%; height: 30px; padding-top: 0px; padding-bottom: 0px; text-align-last: center;">
                                    <option value="<?php echo $time; ?>"><?php echo $time; ?></option>
                                </select>
                            </span>
                            <span style="color: red">*<?php echo $err_time; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-12" style="padding: 0;">
                            <span>Booking name : </span>
                        </div>
                        <div class="col-md-3 col-xs-12" style="padding: 0;">
                            <span><input id="book_name" name="book_name" type="text" class="longstyle form-control" style="height: 30px"
                                         value="<?php echo $name; ?>"/></span>
                            <span style="color: red">*<?php echo $err_name; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-12" style="padding: 0;">
                            <span>Contact number : </span>
                        </div>
                        <div class="col-md-3 col-xs-12" style="padding: 0;">
                            <span><input id="book_contact" name="book_contact" type="tel" class="longstyle form-control" style="height: 30px"
                                         value="<?php echo $contact; ?>"/></span>
                            <span style="color: red">*<?php echo $err_contact; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-12" style="padding: 0;">
                            <span>Email : </span>
                        </div>
                        <div class="col-md-3 col-xs-12" style="padding: 0;">
                            <span><input id="book_email" name="book_email" type="email" class="longstyle form-control" style="height: 30px"
                                         value="<?php echo $email; ?>"/></span>
                            <span style="color: red">*<?php echo $err_email; ?></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 col-xs-12" style="padding: 0;">
                            <span>Note : </span>
                        </div>
                        <div class="col-md-3 col-xs-12" style="padding: 0;">
                            <span>
                                <textarea id="book_note" name="book_note" class="longstyle form-control" style="min-height: 80px"><?php echo $note != '' ? $note : ''; ?></textarea>
                            </span>
                        </div>
                    </div>
                    <div class="Gotham12" style="padding-top: 5%">*Booking information required.</div>
                    <button class="Gothambutton" id="submit" name="submit" type="submit" style="background-color: buttonface;">ENQUIRE NOW</button>
                </form>
                <?php }else{?>
                    <div class="cart-data">
                        <div class="cart-data-layout" style="padding: 30px">
                            <div style="color: black; font-size: large; font-family: 'GothamBold';">Booking Successes.</div>
                            <hr class="line_cart"/>
                            <div class="Gotham12" style="color: black; font-size: large;"><?php echo $msg; ?></div>
                            <p><div style="color: black; font-size: large; text-align: right;font-family: 'GothamBold'"><?php echo $msgthk; ?></div></p>
                        </div>
                    </div>
                <?php }?>
                <div style="padding-top: 5%">
                    <p style="font-family:'GothamBold';font-size:14px;padding-top:30px;">Today booking please contact us by phone.</p>
                    <p style="font-size: 15px;">Balmain 02-9555-5248</p>
                    <p style="font-size: 15px;">Broadway 02-9212-7553</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_right">
        <?php include('inc/footer_right.php'); ?>
    </div>
</div>
<div class="modal fade" id="ModalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Infomation</h4>
            </div>
            <div class="modal-body">
                <p><span class="topic"></span></p>
                <p><span class="balmain"></span></p>
                <p><span class="broadway"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="text-align: center;" data-dismiss="modal" aria-label="Close">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        var $input = $('#book_date').pickadate({
            formatSubmit: 'yyyy-mm-dd',
            min: true,
            container: '#container',
            // editable: true,
            closeOnSelect: true,
            closeOnClear: false,
            today: '',
            clear: '',
            close: ''
        });

        $('#book_date').on('change', function () {
            var selectdate = $(this).pickadate('picker').get('select', 'dd/mm/yyyy');

            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd='0'+dd
            }

            if(mm<10) {
                mm='0'+mm
            }

            var hour = today.getHours();

            today = dd+'/'+mm+'/'+yyyy;

            if(selectdate ==  today && hour > 15) {
                $('#ModalAlert').find('.topic').html("Today booking please contact us by phone.");
                $('#ModalAlert').find('.balmain').html("BALMAIN 9555-5248");
                $('#ModalAlert').find('.broadway').html("BROADWAY 9212-7553");
                $('#ModalAlert').modal('show');
                document.getElementById('book_date').value = '';
            }

        });

        var picker = $input.pickadate('picker');

        $('#book_venue').on('click', function () {
            $(this).find("option[value*='0']").prop("disabled", true);
        });
        $('#book_numP').on('click', function () {
            $(this).find("option[value*='0']").prop("disabled", true);
        });
    });
    function populateTime(value) {
        if (value == 1) {
            // $('#ModalAlert').find('.topic').html("Due to new restrictions we will be opening a limited number of tables for dinner booking");
            //     $('#ModalAlert').find('.balmain').html("Please note for dinner seating times will only be either <b> 6:00 pm-7:30 pm </b> or <b> 7:30 pm-9:00 pm </b> <br> We thank you for your understanding during these difficult times.");
            //     $('#ModalAlert').modal('show');
            $('#timepicker1 option').each(function () {
                $(this).remove();
            });
            $('#timepicker1')
                // .append('<option value="5:00pm">5:00pm</option>')
                .append('<option value="5:30pm">5:30pm</option>')
                .append('<option value="5:45pm">5:45pm</option>')
                .append('<option value="6:00pm">6:00pm</option>')
                .append('<option value="6:15pm">6:15pm</option>')
                .append('<option value="6:30pm">6:30pm</option>')
                .append('<option value="6:45pm">6:45pm</option>')
                .append('<option value="7:00pm">7:00pm</option>')
                .append('<option value="7:15pm">7:15pm</option>')
                .append('<option value="7:30pm">7:30pm</option>')
                .append('<option value="7:45pm">7:45pm</option>')
                .append('<option value="8:00pm">8:00pm</option>')
                .append('<option value="8:15pm">8:15pm</option>')
                .append('<option value="8:30pm">8:30pm</option>')
                .append('<option value="8:45pm">8:45pm</option>')
                .append('<option value="9:00pm">9:00pm</option>');
                //.append('<option value="9:30pm">9:30pm</option>');
        } else if (value == 2) {
            $('#timepicker1 option').each(function () {
                $(this).remove();
            });
            $('#timepicker1')
                .append('<option value="10:00am">10:00am</option>')
                .append('<option value="10:30am">10:30am</option>')
                .append('<option value="11:00am">11:00am</option>')
                .append('<option value="11:30am">11:30am</option>')
                .append('<option value="12:00am">12:00am</option>')
                .append('<option value="12:30am">12:30am</option>')
                .append('<option value="1:00pm">1:00pm</option>')
                .append('<option value="1:30pm">1:30pm</option>')
                .append('<option value="2:00pm">2:00pm</option>')
                .append('<option value="2:30pm">2:30pm</option>')
                .append('<option value="3:00pm">3:00pm</option>')
                .append('<option value="3:30pm">3:30pm</option>')
                .append('<option value="4:00pm">4:00pm</option>')
                .append('<option value="4:30pm">4:30pm</option>')
                .append('<option value="5:00pm">5:00pm</option>')
                .append('<option value="5:30pm">5:30pm</option>')
                .append('<option value="6:00pm">6:00pm</option>')
                .append('<option value="6:30pm">6:30pm</option>')
                .append('<option value="7:00pm">7:00pm</option>')
                .append('<option value="7:30pm">7:30pm</option>')
                .append('<option value="8:00pm">8:00pm</option>')
                .append('<option value="8:30pm">8:30pm</option>');
        }
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.btn-nav').removeClass('animated');
            $('.nav-container').removeClass('showNav');
            $('.nav-container').addClass('hideNav');
        }
    });
</script>
<style type="text/css">
    .row {
        margin-left: 0;
        margin-right: 0;
        padding-bottom: 10px;
    }

    .form-control {
        display: inline;
        height: 20px;
    }
</style>
<script src="datePicker/picker.js" type="text/javascript"></script>
<script src="datePicker/picker.date.js" type="text/javascript"></script>
<script src="datePicker/legacy.js" type="text/javascript"></script>

<?php include('inc/footer.php'); ?>
