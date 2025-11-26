<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

function getUptime() {
    $up = shell_exec('uptime -p 2>/dev/null') ?: 'N/A';
    return trim($up) ?: '未知';
}

$load = sys_getloadavg();
$cpu = $load[0];
$mem = shell_exec("free | awk '/Mem/{printf(\"%.1f%%\", 100*$3/$2)}'");
$disk = round(100 - (disk_free_space("/") / disk_total_space("/") * 100), 1) . '% 已用';
$uptime = getUptime();

echo json_encode([
    'cpu' => $cpu,
    'mem' => trim($mem),
    'disk' => $disk,
    'uptime' => $uptime
], JSON_UNESCAPED_UNICODE);
