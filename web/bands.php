<?php
function find_band($filename, $band) {
    $f = fopen($filename, "r");
    $result = false;
    while ($row = fgetcsv($f)) {
        if (strtolower($row[0]) == strtolower($band)) {
            $colcount = count($row) - 1;
            $list = [];
            for ($i = 0; $i <= $colcount; $i++)
            {
                $list[] = $row[$i];
            }
            $result[] = $list;
        }
    }

    fclose($f);
    $foundbands = [];
    if ($result == false)
    {
        $f = fopen($filename, "r");
        while ($row = fgetcsv($f))
        {
            if (strpos(strtolower($row[0]),strtolower($band)) !== false)
            {
                $colcount = count($row) - 1;
                $bandresult = [];

                for ($i = 0; $i <= $colcount; $i++)
                {
                    $bandresult[] = $row[$i];
                }
                //var_dump($bandresult);die;
                $foundbands[] = $bandresult;
            }
        }
    }
    //var_dump($foundbands);die;
    if (!empty($foundbands))
    {
        return $foundbands;
    }
    return $result;
}
    // configuration
    require("../includes/config.php");
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("bands_page.php",["title"=>"Bands"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $searched_band = $_POST["searched_band"];
        //var_dump($searched_band);die;
        $findband = find_band("../includes/bands/bands.csv", $searched_band);
        //var_dump($findband);die;


        render("bands_page.php",["findband"=>$findband,"title"=>"Bands"]);
    }
?>
