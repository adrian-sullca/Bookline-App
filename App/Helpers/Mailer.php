<?php

namespace App\Helpers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Book;

class Mailer extends PHPMailer
{

    function mailServerSetup()
    {
        //Server settings
        $this->SMTPDebug = SMTP::DEBUG_OFF; //Enable verbose debug output
        $this->isSMTP(); //Send using SMTP
        $this->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $this->SMTPAuth = true; //Enable SMTP authentication
        $this->Username = 'adrian.infooo@gmail.com'; //SMTP username
        $this->Password = 'crde hnzm jqpg elaz'; //SMTP password
        $this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $this->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    }

    function addRec($user = [])
    {
        $this->setFrom('bookline@gmail.com', 'BookLine');
        $this->addAddress($user['email'], $user['username']);
    }

    function addAttachments($att)
    {
        foreach ($att as $attachment) {
            $this->addAttachment($attachment);
        }
    }

    function addVerifyContent($user = [])
    {
        $this->isHTML(true);
        $this->Subject = 'Verify your email please...';

        $content = "
    <br>
    <br>
    <br>
    <div style='width:50%; margin: auto; border-radius: 10px; overflow: hidden; border: 1px solid #ddd;'>
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <!-- HEADER -->
            <tr>
                <td bgcolor='#000000' align='center'>
                    <div class='container'>
                        <div class='table-wrapper'>
                            <div class='table-title'>
                                <div class='row'>
                                    <div class='col-sm-12' style='text-align: center;'>
                                        <h2 style='color:white; font-size:1.75rem'>Verify <strong style='color: #F47F22;'>account</strong></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <!-- LOGO -->
            <tr>
                <td align='center' style='padding: 0px 10px 0px 10px;'>
                    <div style='max-width: 400px; width: 100%; margin: auto;'>
                        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                            <tr>
                                <td bgcolor='#ffffff' align='center' valign='top' style='padding: 20px; border-radius: 4px; color: #111111; font-family: \"Lato\", Helvetica, Arial, sans-serif; font-size: 24px; font-weight: 400; line-height: 24px;'>
                                    <h1 style='font-size: 24px; font-weight: bold; margin: 10px 0; color:#F47F22'>Hi " . $user['username'] . "!</h1>
                                    <img src='../../../Public/Assets/img/logoAdOrange.svg' width='100' height='100' style='display: block; border: 0px; margin-bottom: 20px;' />
                                    <p style='margin: 0; color: #666666; font-size: 16px;'>We're excited to have you get started. First, you need to confirm your account. Just press the button below.</p>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor='#ffffff' align='center' style='padding: 20px;'>
                                    <table border='0' cellspacing='0' cellpadding='0'>
                                        <tr>
                                            <td align='center' style='border-radius: 5px;' bgcolor='#F47F22'>
                                                <a href='http://localhost/auth/verify/" . $user['username'] . "/" . $user['token'] . "' target='_blank' style='font-size: 16px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; padding: 10px 20px; border-radius: 8px; display: inline-block;'>Confirm Account</a>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor='#ffffff' align='center' style='padding: 20px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: \"Lato\", Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 20px;'>
                                    <p style='font-weight:bold'>Bookline Team</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>";

        $this->Body = $content;
    }

    function addOrderEmailContent($user = [], $order = [], $orderLines = [])
    {
        ob_start();
?>
        <br>
        <br>
        <br>
        <div style='width:80%; margin: auto; border-radius: 10px; overflow: hidden; border: 1px solid #ddd;'>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <!-- HEADER -->
                <tr>
                    <td bgcolor='#000000' align='center'>
                        <div class='container'>
                            <div class='table-wrapper'>
                                <div class='table-title'>
                                    <div class='row'>
                                        <div class='col-sm-12' style='text-align: center;'>
                                            <h2 style='color:white; font-size:1.75rem'>Details of Your <strong style='color: #F47F22;'>Order</strong></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 35px; background-color: #ffffff;">
                        <h2 style="color: #F47F22; margin: 0; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 24px; font-weight: bold;">
                            Thank You <?php echo htmlspecialchars($user['username']); ?> For Your Order!
                        </h2>
                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">
                            Order Summary: Thank you for choosing Bookline! We are thrilled to have you as a customer. Below are the details of your order for your review.
                        </p>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 20px; background-color: #ffffff;">
                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <th align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; padding: 10px; border-bottom: 2px solid #F47F22; color: #F47F22">
                                    Order Confirmation #
                                </th>
                                <th align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; padding: 10px; border-bottom: 2px solid #F47F22;">
                                    
                                </th>
                                <th align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; padding: 10px; border-bottom: 2px solid #F47F22;">
                                    
                                </th>
                                <th align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; padding: 10px; border-bottom: 2px solid #F47F22;">
                                    <?php echo htmlspecialchars($order['id']); ?>
                                </th>
                            </tr>
                            <tr>
                                <th align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; padding: 10px; border-bottom: 2px solid #F47F22;">
                                    Title
                                </th>
                                <th align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; padding: 10px; border-bottom: 2px solid #F47F22;">
                                    Price
                                </th>
                                <th align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; padding: 10px; border-bottom: 2px solid #F47F22;">
                                    Quantity
                                </th>
                                <th align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; padding: 10px; border-bottom: 2px solid #F47F22;">
                                    Total
                                </th>
                            </tr>
                            <?php
                            $total = 0;
                            $bookModel = new Book();

                            foreach ($orderLines as $line) {
                                $totalLine = $line['price'] * $line['quantity'];
                                $book = $bookModel->getById($line['itemId']);
                                $bookTitle = htmlspecialchars($book['title']);
                                if (strlen($bookTitle) > 25) {
                                    $bookTitle = substr($bookTitle, 0, 25) . '...';
                                }
                            ?>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; padding: 15px; border-bottom: 1px solid #ddd;">
                                        <?php echo $bookTitle; ?>
                                    </td>
                                    <td align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; padding: 15px; border-bottom: 1px solid #ddd;">
                                        <?php echo htmlspecialchars($line['price']); ?> €
                                    </td>
                                    <td align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; padding: 15px; border-bottom: 1px solid #ddd;">
                                        <?php echo htmlspecialchars($line['quantity']); ?>
                                    </td>
                                    <td align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; padding: 15px; border-bottom: 1px solid #ddd;">
                                        <?php echo htmlspecialchars($totalLine); ?> €
                                    </td>
                                </tr>
                            <?php
                                $total += $totalLine;
                            }
                            ?>
                            <tr>
                                <td align="left" style="color: #F47F22; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; border-top: 3px solid #F47F22; padding: 10px;">
                                    TOTAL
                                </td>
                                <td colspan="3" align="right" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; border-top: 3px solid #F47F22; padding: 10px;">
                                    <?php echo htmlspecialchars($total) . '€'; ?>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="padding: 20px; background-color: #ffffff;">
                        <p style="font-weight: bold; font-family: Open Sans, Helvetica, Arial, sans-serif;">Delivery Address</p>
                        <p><?php echo htmlspecialchars($user['address']); ?></p>
                        <p style="font-weight: bold; font-family: Open Sans, Helvetica, Arial, sans-serif;">Estimated Delivery Date</p>
                        <p>January 1st, 2016</p>
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <br>
        <br>
<?php
        $content = ob_get_clean();

        $this->isHTML(true);
        $this->Subject = 'Thanks for your order...';
        $this->Body = $content;
    }
}
