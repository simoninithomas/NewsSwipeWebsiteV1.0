<?php

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data


/*******************************************************************************************************************************************
Validate the variables
 *******************************************************************************************************************************************/
if (empty($_POST['LastName']))
    $errors['LastName'] = 'Votre nom est requis.';

if (empty($_POST['FirstName']))
    $errors['FirstName'] = 'Votre prenom est requis.';

if (empty($_POST['Email'])) {
    $errors['Email1'] = 'Votre email est requis.';
}

// return a response ===========================================================

// response if there are errors
if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
    $data ['messageError'] = "Message non envoye veuillez corriger les erreurs";

} else {
    $LastName = $_POST['LastName'];
    $FirstName = $_POST['FirstName'];
    $MessageUser = $_POST['MessageUser'];
    $Email = $_POST['Email'];

    //Send email confirmation
    $to = "simonini_thomas@outlook.fr"; // Send email to our user
    $subject = "Message de $LastName $FirstName"; // Give the email a subject
    $message = "
    MESSAGE

    Nom : $LastName
    Prenom : $FirstName
    Email : $Email
    Message : $MessageUser";

    mail($to, $subject, $message); // Send our email
    $data['success'] = true;
    $data['message'] = "Votre message a ete envoye nous vous repondrons dans les 48 heures. Passez une bonne journee";


//Send email to user
$to = $Email; // Send email to our user
$subject = "Vous venez de nous envoyer un message sur NewsSwipe"; // Give the email a subject
$message = "
   Bonjour vous venez de nous envoyer ce message.
    Nom : $LastName
    Prenom : $FirstName
    Email : $Email
    Message : $MessageUser

    Nous allons le traiter dans les 48 heures.
    Passez une excellente journée !

    SIMONINI Thomas
    NewsSwipe Founder and CEO";

    mail($to, $subject, $message); // Send our email
}

// return all our data to an AJAX call
echo json_encode($data);

$conn = null;

