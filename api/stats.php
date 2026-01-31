<?php
// api/stats.php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

include_once __DIR__ . '/../controlador/controlador_kilos.php';

// Return the stats as JSON
echo json_encode([
    'total_kilos' => $_SESSION['total_kilos'] ?? 0,
    'huella_carbono' => $_SESSION['huella_carbono'] ?? 0
]);
?>