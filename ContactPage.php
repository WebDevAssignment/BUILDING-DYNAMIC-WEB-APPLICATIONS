<?php
    include 'NavigationBar.php';
    include 'Footer.php'
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
        <title>Chief of Beef</title>
        <link rel="stylesheet" type="text/css" href="ContactStyling.css">
</head>

<body>
    <div>
        <p id="description">
            <br>This is our contact page. Feel free to drop a line with any queries or complaints.
            <br>Our management team, the three people behind this amazing website, will do their best to get back to you as soon as possible!
        </p>

        <?php
        include('errors.php');
        include 'Email.php';//Uses Krissy's complete version
        ?>

        <form id="contactForm" method="post" action="ContactPage.php">
            <fieldset>
                <legend>Your Personal Details</legend>

                <div class="row">
                    <label for="name">Name</label>
                    <input type="text" id="name" size="40" required>
                </div>

                <div class="row">
                    <label for="surname">Surname</label>
                    <input type="text" id="surname" size="40" required>
                </div>

                <div class="row">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" size="40" required>
                </div>

                <div class="row">
                    <label for="contactNumber">Contact Number</label>
                    <input type="tel" id="contactNumber" size="20" required>
                </div>
            </fieldset>

            <fieldset>
                <legend> Your Message</legend>

                <div class="row">
                    <label for="messageType">Message Type</label>
                    <select id="messageType" required>
                        <optgroup label="Message Type">
                            <option value="1">Query</option>
                            <option value="2">Complaint</option>
                        </optgroup>
                    </select>
                </div>

                <div class="row">
                    <label for="message">Message</label>
                    <textarea id="message" required></textarea>
                </div>

            </fieldset>
        </form>

        <!--input form="contactForm" type="submit" name="Submit" value="Submit">
        <input form="contactForm" type="reset"  name="Reset"  value="Reset"-->

        <button form="contactForm" type="submit">Click Me To Submit</button>
        <button form="contactForm" type="reset">Click Me To Reset</button>

    </div>

</body>
</html>