<div class="band">
 <div class="band-header">
<form action="bands.php" method="post">
     <div class="form-group">
       <input type="text" name = "searched_band" class="form-control" placeholder="Enter Band names here">
     </div>
</form>
<?php //var_dump($findband);die; ?>
<?php if (!empty($findband)): //var_dump($findband[0][0]);die;?>
                <?php $colcount = count($findband) ?>
                <?php for ($i = 0; $i < $colcount; $i++): ?>
                <table class = "table bands">
                <tr>
                    <th><img src="<?php echo $findband[$i][1];?>" alt=<?php echo $findband[$i][0]; ?>; style='height: 100%; width: 50%; object-fit: contain'></th>
                </tr>
                <tr>
                    <th><h1 text align="center"><?php echo $findband[$i][0];?></h1></th>
                </tr>
                <tr>
                    <th><h3 text align="center">Official Website: </th><th text align="center"><a href=<?php echo $findband[$i][2] ?>"><?php echo $findband[$i][2] ?></a></h3</th>
                </tr>
            <p>
            <p>
            </table>
            <hr>
        <?php endfor ?>
<?php endif ?>
</div>
</div>
