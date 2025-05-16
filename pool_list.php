<?PHP

$jsonFilePath = 'api/pool.json';
$jsonData = file_get_contents($jsonFilePath);
$pools = json_decode($jsonData, true);

usort($pools, function($a, $b) {
    return $a['pplns'] <=> $b['pplns'];
});

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $poolType_2 = isset($_POST['pool_type']) ? $_POST['pool_type'] : '';
    if (is_numeric(value: $poolType_2) && $poolType_2 >= 0 && $poolType_2 <= 8) {
        $poolType = $poolType_2;
        if($poolType <= 2){ $poolTypePool = $poolType; }
        if($poolType == 3){ $poolTypeTest = $poolType; }
    }
    
    if ($pools === null) {
        //Error decoding JSON.
    } else {
        foreach ($pools as $pool) {
            $pool_id = $pool['id'];
            $pool_poolname = $pool['poolname'];
            $pool_url = $pool['url'];
            $pool_fee = $pool['fee'];
            $pool_pplns = $pool['pplns'];

  
            if($pool_pplns <= $poolTypePool)
            {  
                echo "<a href=\"$pool_url\" class=\"list-group-item list-group-item-action\" aria-current=\"true\" target=\"_blank\">";
                echo "<div class=\"d-flex w-100 justify-content-between\">";
                echo "<h5 class=\"mb-1\">$pool_poolname</h5>";
                echo "<span class=\"fs-4\">FEE: $pool_fee%</span>";
                echo "</div>";
                echo "<p class=\"mb-1\"><img src=\"assets/pools/$pool_id/logo.png\" style=\"max-height: 100px;\"></p>";
                echo "<small>$pool_url</small>";
                echo "</a>";
            }
            if($pool_pplns == $poolTypeTest)
            {  
                echo "<a href=\"$pool_url\" class=\"list-group-item list-group-item-action\" aria-current=\"true\" target=\"_blank\">";
                echo "<div class=\"d-flex w-100 justify-content-between\">";
                echo "<h5 class=\"mb-1\">$pool_poolname</h5>";
                echo "<span class=\"fs-4\">FEE: $pool_fee%</span>";
                echo "</div>";
                echo "<p class=\"mb-1\"><img src=\"assets/pools/$pool_id/logo.png\" style=\"max-height: 100px;\"></p>";
                echo "<small>$pool_url</small>";
                echo "</a>";
            }
    
        }
    }

}

?>