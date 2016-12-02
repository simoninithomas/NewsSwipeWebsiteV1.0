<?php

$errors         = array();  	// array to hold validation errors
$data 			= array(); 		// array to pass back data


/*******************************************************************************************************************************************
Validate the variables
 *******************************************************************************************************************************************/
if (empty($_POST['emailBeta'])) {
    $errors['Email1'] = 'Votre email est requis.';
}

// return a response ===========================================================

// response if there are errors
if ( ! empty($errors)) {

    // if there are items in our errors array, return those errors
    $data['success'] = false;
    $data['errors']  = $errors;
    $data ['messageError'] = "Email non enregistre veuillez corriger les erreurs";

} else {
    $Email = $_POST['emailBeta'];

       //Send email confirmation
    $to = "simonini_thomas@outlook.fr"; // Send email to our user
    $subject = "Nouvel inscrit $Email"; // Give the email a subject
    $message = "
    MESSAGE

    Email : $Email
    Un de plus !";

    mail($to, $subject, $message); // Send our email
    $data['success'] = true;
    $data['message'] = "Vous etes biens inscrits à notre beta test nous vous repondrons dans les 48 heures. Passez une bonne journee";

//Send email to user
    $to = $Email; // Send email to our user
    $subject = "Bonjour le nouveau bêta testeur de NewsSwipe"; // Give the email a subject
    $message = "
   Bonjour vous venez de vous inscrire en tant que bêta testeur et je vous remercie.
   Vous allez recevoir dans le courant de la semaine vos codes pour tester l'application ainsi qu'un formulaire pour nous dire ce que vous en avez pense.

   Une fois de plus merci,
   Passez une excellente journee !
   SIMONINI Thomas
   NewsSwipe Founder & CEO";

    mail($to, $subject, $message); // Send our email
}

// return all our data to an AJAX call
echo json_encode($data);

$conn = null;

