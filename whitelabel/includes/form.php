<div class="grid_4">
        <div class="aside contact-form">
        <?php
        if (isset($_REQUEST['email'])) {

            // Store fields
            $name = trim($_REQUEST['name']);
            $email = trim($_REQUEST['email']);
            $message = trim($_REQUEST['message']);
            // Validate
            $errors = array();
            if (empty($name)) {$errors['name'] = 'Please enter your name';}
            if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {$errors['email'] = 'Please enter a valid email';}
            if (empty($message)) {$errors['message'] = 'Please enter a message';}
            //Add the Captcha code
            include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
            $securimage = new Securimage();
        if ($securimage->check($_POST['captcha_code']) == false) {
        // the code was incorrect
        // you should handle the error so that the form processor doesn't continue

        // or you can use the following code if there is no validation or you do not know how
        echo "The security code entered was incorrect.<br /><br />";
        echo "Please go <a href='javascript:history.go(-1)'>back</a> and try again.";
        exit;
        }
        }
        if (isset($email) && empty($errors)) {
        // Send email if fields are completed and valid
        $email_message = "Name: $name\nEmail: $email\nMessage: $message";
        mail($support_email, "Website Message", $email_message, "From: $name <$email>" );
        echo "<h3>Thank you</h3><p>Your message has been successfully sent.</p>";
        } else {
        // Else print the form
        ?>
            <h3>Send a message</h3>
        <form name="contact" method="POST" action="">
        <?=isset($errors['name']) ? '<span class="error">'.$errors['name'].'</span>' : '' ?>
        <label for="name">Name <span class="req">*</span></label>
        <input id="name" name="name" type="text" tabindex="1" <?=isset($name) ? 'value="'.$name.'" ' : '', isset($errors['name']) ? 'class="error"' : '' ?>/>
        <?=isset($errors['email']) ? '<span class="error">'.$errors['email'].'</span>' : '' ?>
        <label for="email">Email <span class="req">*</span></label>
        <input id="email" name="email" type="text" tabindex="2" <?=isset($email) ? 'value="'.$email.'" ' : '', isset($errors['email']) ? 'class="error"' : '' ?>/>
        <?=isset($errors['message']) ? '<span class="error">'.$errors['message'].'</span>' : '' ?>
        <label for="message">Message <span class="req">*</span></label>
        <textarea id="message" name="message" rows="4" tabindex="3" <?=isset($errors['message']) ? 'class="error"': '' ?>><?=isset($message) ? $message : ''?></textarea>
        <img id="captcha" src="/securimage/securimage_show.php" alt="CAPTCHA Image" />
        <a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false" id="different">Refresh image</a>
        <label for="captcha">Enter image text<span class="req">*</span></label>
        <input type="text" name="captcha_code" size="10" maxlength="6" />
        <input type="submit" value="Submit" class="button" tabindex="4">
        </form>
        <?php } ?>
        </div>
</div>
