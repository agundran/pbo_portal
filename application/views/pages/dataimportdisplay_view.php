<div class="table-responsive">
    <table class="table table-hover tablesorter">
        <thead>
            <tr>
                <th class="header">ID</th>
                <th class="header">Date</th>                           
                <th class="header">Time In</th>                      
                <th class="header">Time Out</th>
             
            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($members) && !empty($members)) {
                foreach ($members as $key => $element) {
                    ?>
                    <tr>
                        <td><?php echo $element['id']; ?></td>   
                        <td><?php echo $element['data']; ?></td> 
                        <td><?php echo $element['timein']; ?></td>                       
                        <td><?php echo $element['timeout']; ?></td>
                    
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="5">There is no time attendance.</td>    
                </tr>
            <?php } ?>
 
        </tbody>
    </table>
</div>