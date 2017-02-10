@extends('template') <!-- use template from previous slide -->
@section('main') <!-- define a section called main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <table id="ranktable" class="table table-condensed hover">
                <thead>
                    <tr>
                        <th width="10px">R</th>
                        <th width="60px" class="hidden-xs">Flag</th>
                        <th class="hidden-xs">Name</th>
                        <th class="hidden-sm hidden-md hidden-lg">Nick</th>
                        <th class="hidden-xs hidden-sm row-pink">MC</th>
                        <th class="hidden-xs hidden-sm row-pink">TC</th>
                        <th class="row-pink">SPE</th>
                        <th class="hidden-xs hidden-sm row-green">HW</th>
                        <th class="hidden-xs hidden-sm row-green">Bs</th>
                        <th class="hidden-xs hidden-sm row-green">KS</th>
                        <th class="hidden-xs hidden-sm row-green">Ac</th>
                        <th class="row-green">DIL</th>
                        <th>Sum</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $max = array();
                    $max["mc"] = 0;
                    $max["tc"] = 0;
                    $max["spe"] = 0;
                    $max["hw"] = 0;
                    $max["pb"] = 0;
                    $max["ks"] = 0;
                    $max["ac"] = 0;
                    $max["dil"] = 0;
                    $max["sum"] = array();

                    for ($i = 0; $i < count($studentDB); $i++) {
                        $scores = $studentDB[$i]["scores"];
                        $mc = array_sum($scores["mc"]);
                        $tc = array_sum($scores["tc"]);
                        $spe = $mc + $tc;
                        $hw = array_sum($scores["hw"]);
                        $pb = array_sum($scores["pb"]);
                        $ks = array_sum($scores["ks"]);
                        $ac = array_sum($scores["ac"]);
                        $dil = $hw + $pb + $ks + $ac;
                        $sum = $spe + $dil;

                        $max["mc"] = max($max["mc"], $mc);
                        $max["tc"] = max($max["tc"], $tc);
                        $max["spe"] = max($max["spe"], $spe);
                        $max["hw"] = max($max["hw"], $hw);
                        $max["pb"] = max($max["pb"], $pb);
                        $max["ks"] = max($max["ks"], $ks);
                        $max["ac"] = max($max["ac"], $ac);
                        $max["dil"] = max($max["dil"], $dil);
                        $max["sum"][] = $sum;
                    }

                    $max["sum"] = array_unique($max["sum"]);
                    rsort($max["sum"]);

                    for ($i = 0; $i < count($studentDB); $i++) {
                        $student = $studentDB[$i];
                        $flag_cdn = "https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/flags/4x3/" . strtolower($student["country_iso2"]) . ".svg";

                        $scores = $student["scores"];
                        $mc = array_sum($scores["mc"]);
                        $tc = array_sum($scores["tc"]);
                        $spe = $mc + $tc;
                        $hw = array_sum($scores["hw"]);
                        $pb = array_sum($scores["pb"]);
                        $ks = array_sum($scores["ks"]);
                        $ac = array_sum($scores["ac"]);
                        $dil = $hw + $pb + $ks + $ac;
                        $sum = $spe + $dil;
                    ?>
                    <?php
                    switch ($sum) {
                        case $max["sum"][0]:
                    ?>
                        <tr style="height: 31px" class="gold">
                    <?php
                            break;
                        case $max["sum"][1]:
                    ?>
                        <tr style="height: 31px" class="silver">
                    <?php
                            break;
                        case $max["sum"][2]:
                    ?>
                        <tr style="height: 31px" class="bronze">
                    <?php
                            break;
                        case $max["sum"][count($max["sum"]) - 1]:
                    ?>
                        <tr style="height: 31px" class="lowest">
                    <?php
                            break;
                        default:
                    ?>
                        <tr style="height: 31px">
                    <?php
                    }
                    ?>
                            <td><?php echo ($i + 1); ?></td>
                            <td class="hidden-xs"><img src="<?php echo $flag_cdn ?>" width="20px"> <?php echo $student["country_iso3"]; ?></td>
                            <td class="hidden-xs"><img class="thumb" src="<?php echo $student["image"] ?>" height="15px"> <a href=<?php echo '"/student/' . ($i + 1) . '">' . $student["name"]; ?></a></td>
                            <td class="hidden-sm hidden-md hidden-lg"><a href=<?php echo '"/student/' . ($i + 1) . '">' . $student["nick"]; ?></a></td>

                        <?php
                        if ($mc == $max["mc"]) {
                        ?>
                            <td class="hidden-xs hidden-sm highlighted"><?php echo $mc ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm"><?php echo $mc ?></td>
                        <?php
                        }
                        ?>

                        <?php
                        if ($tc == $max["tc"]) {
                        ?>
                            <td class="hidden-xs hidden-sm highlighted"><?php echo $tc ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm"><?php echo $tc ?></td>
                        <?php
                        }
                        ?>

                        <?php
                        if ($spe == $max["spe"]) {
                        ?>
                            <td class="highlighted"><?php echo $spe ?></td>
                        <?php
                        } else {
                        ?>
                            <td><?php echo $spe ?></td>
                        <?php
                        }
                        ?>

                        <?php
                        if ($hw == $max["hw"]) {
                        ?>
                            <td class="hidden-xs hidden-sm highlighted"><?php echo $hw ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm"><?php echo $hw ?></td>
                        <?php
                        }
                        ?>

                        <?php
                        if ($pb == $max["pb"]) {
                        ?>
                            <td class="hidden-xs hidden-sm highlighted"><?php echo $pb ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm"><?php echo $pb ?></td>
                        <?php
                        }
                        ?>

                        <?php
                        if ($ks == $max["ks"]) {
                        ?>
                            <td class="hidden-xs hidden-sm highlighted"><?php echo $ks ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm"><?php echo $ks ?></td>
                        <?php
                        }
                        ?>

                        <?php
                        if ($ac == $max["ac"]) {
                        ?>
                            <td class="hidden-xs hidden-sm highlighted"><?php echo $ac ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm"><?php echo $ac ?></td>
                        <?php
                        }
                        ?>

                        <?php
                        if ($dil == $max["dil"]) {
                        ?>
                            <td class="highlighted"><?php echo $dil ?></td>
                        <?php
                        } else {
                        ?>
                            <td><?php echo $dil ?></td>
                        <?php
                        }
                        ?>
                            <td><?php echo $sum ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
