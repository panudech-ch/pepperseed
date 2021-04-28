<?php
include('connect.php');
include_once('inc/admin/query_statement.php');
?>
<?php
session_start();
$venue = isset($_POST['book_venue']) ? $_POST['book_venue'] : '';
$numP = isset($_POST['book_numP']) ? $_POST['book_numP'] : '';
$date = isset($_POST['book_date']) ? $_POST['book_date'] : '';
$datesubmit = isset($_POST['book_date_submit']) ? date('l', strtotime($_POST['book_date_submit'])) : '';
$time = isset($_POST['timepicker1']) ? $_POST['timepicker1'] : '';
$name = isset($_POST['book_name']) ? $_POST['book_name'] : '';
$contact = isset($_POST['book_contact']) ? $_POST['book_contact'] : '';
$email = isset($_POST['book_email']) ? $_POST['book_email'] : '';
$note = isset($_POST['book_note']) ? $_POST['book_note'] : '';


if (!empty($venue) && !empty($numP) && !empty($date) && !empty($time) && !empty($name) && !empty($contact) && !empty($email)) {
	$rs = createBooking($venue, $numP, $date, $time, $name, $contact, $email);
	if (!$result) {

		$branch = getBranchById($venue);

		$emailTo = "booking@pepperseeds.com.au";
		$emailSubject = "Book A Table!!";
		$emailHeader  = "MIME-Version: 1.0 \r\n";
		$emailHeader .= "Content-type: text/html; charset=utf-8\r\n";
		//$emailHeader .= "From:test<postmaster@localhost.com>"; --use for local test
		$emailHeader .= 'From: ' . $shopName . '<booking@pepperseeds.com.au>' . "\r\n";
		$emailMessage = "
                <div style=\"margin:0 auto;width:50%\">
                <h1 style='text-align: center;' > Pepper Seeds [" . $branch['branch_name'] . "] </h1>
                <hr style=\"border:1px solid #3b3b3b3;\"/>
                            <table width='480' border='0' style=\"margin-left:20px;margin-top:25px;\">
                            <h2> Booking Information </h2>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div><strong>Venue : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $branch['branch_name'] . "</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div ><strong>Number of People : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $numP . "</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div><strong>Date : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $datesubmit . " " . $date . "</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div ><strong>Time : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $time . "</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div><strong>Booking Name : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $name . "</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div><strong>Contact Number : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $contact . "</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div><strong>Email : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $email . "</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=\"text-align:right;width:35%;\">
                                        <div><strong>Note : </strong></div>
                                    </td>
                                    <td>
                                        <div style=\"margin-left:20px;\">" . $note . "</div>
                                    </td>
                                </tr>
                            </table>
			            </div> ";

		$flagSend = mail($emailTo, $emailSubject, $emailMessage, $emailHeader);

		//Send email to customer
		$emailcusTo = "$email";
		$emailcusSubject = "Confirmation Book A Table!!";
		$emailcusHeader  = "MIME-Version: 1.0 \r\n";
		$emailcusHeader .= "Content-type: text/html; charset=utf-8\r\n";
		//$emailHeader .= "From:test<postmaster@localhost.com>"; --use for local test
		$emailcusHeader .= 'From: ' . $shopName . ' <booking@pepperseeds.com.au>' . "\r\n";
		$emailcusMessage = "
            <div style=\"margin:0 auto;width:50%\">
                <h1 style='text-align: center;' > Pepper Seeds [" . $branch['branch_name'] . "] </h1>
                <hr style=\"border:1px solid #3b3b3b3;\"/>
                            <table width='480' border='0' style=\"margin-left:20px;margin-top:25px;\">
                            <h2> Booking Information </h2>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div><strong>Venue : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $branch['branch_name'] . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div ><strong>Number of People : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $numP . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div><strong>Date : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $datesubmit . " " . $date . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div ><strong>Time : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $time . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div><strong>Booking Name : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $name . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div><strong>Contact Number : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $contact . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div><strong>Email : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $email . "</div>
                            </td>
                        </tr>
                        <tr>
                            <td style=\"text-align:right;width:35%;\">
                                <div><strong>Note : </strong></div>
                            </td>
                            <td>
                                <div style=\"margin-left:20px;\">" . $note . "</div>
                            </td>
                        </tr>
                    </table>
                <hr style=\"border:1px solid #3b3b3b3;\"/>
                <h3 style='text-align: right;'>Thankyou for booking.</h3>
		    </div> ";

		$flagcusSend = mail($emailcusTo, $emailcusSubject, $emailcusMessage, $emailcusHeader);

		if ($flagSend && $flagcusSend) {
			$msg  = "Thank you for your booking, one of our staff will contact you back shortly to confirm.";
			$msgthk = "PEPPER SEEDS TEAM.";
			$venue = '';
			$numP = '';
			$date = '';
			$time = '';
			$name = '';
			$contact = '';
			$email = '';
			$note = '';
			echo "OK";
		} else {
			echo "Saved";
		}
	} else {
		echo "Can't save information";
	}
} else {

	echo "Please fill Booking information required.";
}
