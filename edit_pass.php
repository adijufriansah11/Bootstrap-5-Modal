<?php


//panggil koneksi database
include "koneksi.php";
// Assuming you have already established a database connection

// Get the user's ID from the session or from the form input
$id_user = $_SESSION['id_user']; // Adjust this according to your session variable

// Get the new password from the form input
$newPassword = $_POST['new_password'];
$confirmNewPassword = $_POST['confirm_new_password'];

// Validate if new password matches the confirmed password
if ($newPassword !== $confirmNewPassword) {
    // Handle password mismatch error
    // Redirect back to the edit profile page with an error message
    header("Location: edit_profile.php?error=password_mismatch");
    exit();
}

// Hash the new password before storing it in the database
$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

// Update the password in the database for the user
$sql = "UPDATE tb_user SET password = '$hashedPassword' WHERE id_user = '$id_user'";

if (mysqli_query($conn, $sql)) {
    // Password updated successfully
    // Redirect to the edit profile page with a success message
    header("Location: edit_profile.php?success=password_updated");
    exit();
} else {
    // Error occurred while updating password
    // Redirect to the edit profile page with an error message
    header("Location: edit_profile.php?error=password_update_failed");
    exit();
}
?>
