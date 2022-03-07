<?php
if(isset($_POST["submit"]))
{
    // Checking For Blank Fields..
    if($_POST["name"]==""||$_POST["email"]==""||$_POST["subject"]==""||$_POST["message"]=="")
    {
        echo "<h3>Todos los campos deben estar completos.</h3>";
    }
    else
    {
        // Check if the "Sender's Email" input field is filled out
        $email=$_POST['email'];
        // Sanitize E-mail Address
        $email =filter_var($email, FILTER_SANITIZE_EMAIL);
        // Validate E-mail Address
        $email= filter_var($email, FILTER_VALIDATE_EMAIL);

        if (!$email)
        {
            echo "<h3>El email introducido no es valido.</h3>";
        }
        else
        {
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $headers = 'From:'. $email . "rn"; // Sender's Email
            $headers .= 'Cc:'. $email . "rn"; // Carbon copy to Sender
            // Message lines should not exceed 70 characters (PHP rule), so wrap it
            $message = wordwrap($message, 70);
            // Send Mail By PHP Mail Function
            mail("gombocstudio@hotmail.com", $subject, $message, $headers);
            echo "<h3>Formulario enviado correctamente!</h3>";
        }
    }
}
?>