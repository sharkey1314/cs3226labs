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
                    for ($i = 0; $i < count($studentDB); $i++) {
                        $student = $studentDB[$i];
                        $flag_cdn = "https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/flags/4x3/" . strtolower($student["country_iso2"]) . ".svg";
                    ?>
                        <tr style="height: 31px">
                            <td><?php echo ($i + 1); ?></td>
                            <td class="hidden-xs"><img src="<?php echo $flag_cdn ?>" width="20px"> <?php echo $student["country_iso3"]; ?></td>
                            <td class="hidden-xs"><img class="thumb" src="/img/icons/<?php echo ($i + 1) . ".png" ?>" height="15px"> <a href=<?php echo '"/student/' . ($i + 1) . '">' . $student["name"]; ?></a></td>
                            <td class="hidden-sm hidden-md hidden-lg"><a href=<?php echo '"/student/' . ($i + 1) . '">' . $student["nick"]; ?></a></td>

                        <?php
                        $scores = $student["scores"];
                        ?>
                            <td class="hidden-xs hidden-sm"><?php echo array_sum($scores["mc"]) ?></td>
                            <td class="hidden-xs hidden-sm">0</td>
                            <td><?php echo array_sum($scores["mc"]) ?></td>
                            <td class="hidden-xs hidden-sm"><?php echo array_sum($scores["hw"]) ?></td>
                            <td class="hidden-xs hidden-sm"><?php echo array_sum($scores["pb"]) ?></td>
                            <td class="hidden-xs hidden-sm"><?php echo array_sum($scores["ks"]) ?></td>
                            <td class="hidden-xs hidden-sm"><?php echo array_sum($scores["ac"]) ?></td>
                            <td><?php echo array_sum($scores["hw"]) + array_sum($scores["pb"]) + array_sum($scores["ks"]) + array_sum($scores["ac"]) ?></td>
                            <td><?php echo array_sum($scores["mc"]) + array_sum($scores["hw"]) + array_sum($scores["pb"]) + array_sum($scores["ks"]) + array_sum($scores["ac"]) ?></td>
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
