

<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction Type</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>


    <tbody>
    <?php
 // query cash for template
    $cash =	query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);	
    
	// create new array to store all info for history table
    $table = query("SELECT * FROM history WHERE id = ?", $_SESSION["id"]);

    foreach ($table as $row)	
        {   
            echo("<tr>");
            echo("<td>" . $row["transaction"] . "</td>");
            echo("<td>" . date('d/m/y, g:i A',strtotime($row["time"])) . "</td>");
            echo("<td>" . $row["symbol"] . "</td>");
            echo("<td>" . $row["shares"] . "</td>");
            echo("<td>$" . number_format($row["price"], 2) . "</td>");
            echo("</tr>");
        }
    ?>

    <tr>
        <td colspan="4">CASH</td>
        <td>$<?=number_format($cash[0]["cash"], 2)?></td>
    </tr>

    </tbody>
    
</table>
