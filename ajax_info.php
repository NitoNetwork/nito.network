<?php
if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  // Simulate fetching content from a database or another source
  $content = '';

  switch ($id) {

    
    case 1:
      //BLOCKCHAIN!
      $content = '
      <h5 class="sub-title">Blockchain Specification</h5>
      <table>
  <tr>
    <td><strong>Mining Algorithm</strong></td>
    <td class="spacer">&nbsp;</td>
    <td>SHA256</td>
  </tr>
  <tr>
    <td><strong>Block Interval</strong></td>
    <td></td>
    <td>1 minute</td>
  </tr>
  <tr>
    <td><strong>Block Weight</strong></td>
    <td></td>
    <td>0.8 MB</td>
  </tr>
  <tr>
    <td><strong>Total Supply</strong></td>
    <td></td>
    <td>1,154,217,600 NITO</td>
  </tr>
  <tr>
    <td><strong>Difficulty Adjustment</strong></td>
    <td></td>
    <td>Real Time</td>
  </tr>
  <tr>
    <td><strong>Coin Distribution Duration</strong></td>
    <td></td>
    <td>200 years</td>
  </tr>
  <tr>
    <td><strong>Ticker Symbol</strong></td>
    <td></td>
    <td>NITO</td>
  </tr>
  <tr>
    <td><strong>Smallest Unit</strong></td>
    <td></td>
    <td>Nitoshi ( 1 NITO = 100,000,000 Nitoshi )</td>
  </tr>
  <tr>
    <td><strong>Genesis Block Creation</strong></td>
    <td></td>
    <td>Wednesday, August 21, 2024</td>
  </tr>
  <tr>
    <td><strong>Genesis Block Hash</strong></td>
    <td></td>
    <td>Nito/Core Genesis 8-4</td>
  </tr>
  <tr>
    <td><strong>Launch Date</strong></td>
    <td></td>
    <td>Wednesday, August 21, 2024</td>
  </tr>
  <tr>
    <td><strong>Mainnet Port</strong></td>
    <td></td>
    <td>8820 ( RPC: 8825 )</td>
  </tr>
  <tr>
    <td><strong>Testnet Port</strong></td>
    <td></td>
    <td>8840 ( RPC: 8845 )</td>
  </tr>
  <tr>
    <td><strong>Signet Port</strong></td>
    <td></td>
    <td>8860</td>
  </tr>
  <tr>
    <td><strong>Regtest Port</strong></td>
    <td></td>
    <td>8880</td>
  </tr>
  <tr>
    <td><strong>Pre-Mine</strong></td>
    <td></td>
    <td>No!</td>
  </tr>
</table><br>
<h5 class="sub-title"></h5>
        <p></p>
        
      ';

        //100% POW
        $content .= '<h5 class="sub-title">Proof of Work vs. Proof of Stake</h5>
        <p>PoW promotes unparalleled decentralization by enabling anyone with the necessary hardware to participate in the mining process. This democratizes block creation and transaction validation, ensuring power is distributed across a vast network of global participants. In contrast, PoS can inadvertently favor those with substantial holdings, potentially leading to centralization as larger stakeholders accumulate more power and influence.</p>
        <p>The competitive nature of PoW mining ensures a higher level of security. Miners compete to solve complex cryptographic puzzles, and the first to solve the puzzle earns the right to add the next block to the blockchain. This process makes it exceedingly difficult for any single entity to dominate the network, as it would require an enormous amount of computational power and energy. On the other hand, PoS relies on the size of stakes, which can make the network vulnerable to wealth concentration and reduce the cost-effectiveness of attacks.</p>
        <p>PoW incentivizes fairness by creating a level playing field where all miners, regardless of their size, follow the same rules and have an equal chance to validate transactions based on their computational contribution. This equitable system prevents excessive control by any single entity. Conversely, PoS can create barriers for new participants who might struggle to accumulate enough stake to influence the network meaningfully, thus perpetuating a "rich-get-richer" scenario.</p>
        <BR>
        <h5 class="sub-title">SHA-256</h5>
        <p>SHA-256 is widely regarded as a premier algorithm in cryptocurrency mining due to its robustness, security, and efficiency. Developed by the National Security Agency (NSA), SHA-256 (Secure Hash Algorithm 256-bit) ensures a high level of security, rendering it extremely difficult to reverse-engineer or manipulate the data it processes. This level of security is crucial for maintaining the integrity and trust of blockchain systems.</p>
        <p>The algorithm\'s computational intensity requires significant processing power and energy for mining operations, which serves as a deterrent to malicious activities and attacks. Additionally, SHA-256\'s extensive adoption across various cryptocurrencies has fostered a large, decentralized network of miners, thereby enhancing the overall security and stability of the cryptocurrency ecosystem.</p>
        <p>Furthermore, the majority of both new and second-hand mining hardware is designed to be compatible with SHA-256. This extensive hardware support solidifies its position as a preferred choice for secure, decentralized, and efficient cryptocurrency mining.</p>
        ';
      break;
    case 2:
        //Mining
        $content = ' 
<div class="containerx">
  <div class="divx1">

  <h5 class="sub-title">Block Reward and Distribution Model</h5>
    <p>  
    Year 1:
        512 Nito/Block.<BR> 
        <B>Total 269,107,200 Nito.</B></p>
    <p>
    Year 2:
        256 Nito/Block.<BR> 
        <B>Total 134,553,600 Nito.</B></p>
    <p>  
    Year 3:
        128 Nito/Block.<BR> 
        <B>Total 67,276,800 Nito.</B></p>
    <p>   
    Years 4 to 10:
        64 Nito/Block, 33,638,400 Nito/Year.<BR>
        <B>Total: 235,468,800.</B></p>
    <p>
    Years 11 to 20:
        32 Nito/Block, 16,819,200 Nito/Year.<BR>
        <B>Total: 168,192,000.</B></p>
    <p>
    Years 21 to 50:
        8 Nito/Block, 4,204,800 Nito/Year.<BR>
        <B>Total: 121,939,200.</B></p>
    <p>
    Years 51 to 200:
        2 Nito/Block, 1,051,200 Nito/Year.<BR>
        <B>Total: 157,680,000.</B></p>

</div>
  <div class="divx2"><img src="assets/img/total_nitos_produced_2.png"></div>
</div> 

        <BR>
        <h5 class="sub-title">Future Transition and Potential Adjustments</h5>
        <p>Upon the conclusion of the distribution phase, the block reward will decrease from 2 NITO to zero, 
        transitioning miners to a compensation model based solely on transaction fees. 
        Should these fees prove inadequate to maintain miner incentives as the end date approaches, 
        a potential solution could be a soft fork to maintain the 1 NITO block reward indefinitely. 
        This adjustment would introduce a moderate annual inflation rate of 0.0455%, 
        corresponding to the creation of 525,600 NITO annually. 
        Such inflation would serve to replenish lost coins and ensure ongoing miner incentives. 
        The decision to enact this change will be deferred to future Nito Core developers.</p><BR>
        
        <BR>
        ';

        break;
    case 3:

        break;
    case 4:





$jsonFilePath = 'api/pool.json';
$jsonData = file_get_contents($jsonFilePath);
$pools = json_decode($jsonData, true);

echo"<form id=\"poolselect\">";
echo"<div class=\"col-md-4\">";
echo"<select id=\"pool_type\" name=\"pool_type\" class=\"form-select\" onchange=\"updatePoolType()\">";
echo"<option value=\"1\" selected>SHARED + SOLO POOL</option>";
echo"<option value=\"2\">SOLO POOL</option>";
echo"<option value=\"3\">DEV/TEST POOL</option>";
echo"</select>";
echo"</div>";


echo"<div class=\"list-group\">";


echo"<div id=\"pool_list\" class=\"mt-3\">";

if ($pools === null) {
    //Error decoding JSON.
} else {
    foreach ($pools as $pool) {
        $pool_id = $pool['id'];
        $pool_poolname = $pool['poolname'];
        $pool_url = $pool['url'];
        $pool_fee = $pool['fee'];
        $pool_pplns = $pool['pplns'];

        if($pool_pplns == '1')
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
echo"</div>";


echo"</div>";
echo"</form>";




  



          break;
    case 10:
      //FULL NODE
        $content = "<h5 class=\"sub-title\">FULL NODE</h5>
        To run a full node, you'll need the right hardware: at least 1GB of RAM (2GB recommended), 
        a minimum of 32GB SD, and a reliable internet connection with at least 1Mbps upload speed.<BR> 
        Start by downloading and verifying the latest version of the full node software from Nito.Network. 
        Install the software.<BR> 
        Make sure your router and firewall allow incoming connections on <b>port 8820</b> and set up port forwarding if necessary.<BR> 
        Start the software and allow it to sync with the blockchain, which may take several minutes, 
        ensuring your computer stays on and connected to the internet.<BR> 
        Regularly update the software, 
        monitor the node’s performance, and backup the data directory.<BR> 
        Running a full node is essential for the network's security and decentralization, 
        as it helps verify transactions and blocks, 
        ensuring the integrity and resilience of the Nito blockchain.<BR>";
        break;
    default:
      $content = 'Invalid content ID.';
      break;
  }

  echo $content;
} else {
  echo 'No content ID provided.';
}
