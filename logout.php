<?php
if (!empty($_SESSION['user'])) {
    unset($_SESSION['user']);
    // Optionally destroy the entire session
    session_destroy();
}

// Redirect to the home page
redirect('home');
