@extends('template')
@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-9">
            <h4><b><?php echo $student->name ?></b></h4>

            <p>Kattis account: <a href="#" target="_blank"><b><?php echo $student->kattis ?></b></a>
            </p>

            <?php
            $spe = array_sum($scores["mc"]);
            $dil = array_sum($scores["hw"]) + array_sum($scores["pb"]) + array_sum($scores["ks"]) + array_sum($scores["ac"]);
            $sum = $spe + $dil;

            $flag_cdn = "https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.8.0/flags/4x3/" . strtolower($student->country_iso2) . ".svg";
            ?>

            <p><b>SPE</b>(ed) component: <b><?php echo array_sum($scores["mc"]) . ' + 0 = ' . array_sum($scores["mc"]) ?></b><br>
                <b>DIL</b>(igence) component: <b><?php echo array_sum($scores["hw"]) . ' + ' . array_sum($scores["pb"]) . ' + ' . array_sum($scores["ks"]) . ' + ' . array_sum($scores["ac"]) . ' = ' . $dil ?></b><br>
                <b>Sum = SPE + DIL = <?php echo $spe . ' + ' . $dil . ' = ' . $sum ?></b>
            </p>
        </div>
        <div class="hidden-xs hidden-sm col-sm-1">
            <img class="nation" src="<?php echo $flag_cdn ?>" width="100px">
        </div>
        <div class="hidden-xs hidden-sm col-sm-2">
            <img class="student-avatar" src="<?php echo $student->image ?>" height="100px" width="100px">
        </div>
    </div>

    <div class="row">
    <div class="col-xs-12">
        <p>Detailed scores:
        </p>

        <table class="table table-condensed">
            <thead>
                <tr>
                    <th width="150px">Component</th>
                    <th width="150px">Sum</th>
                    <th class="hidden-xs hidden-sm">01</th>
                    <th class="hidden-xs hidden-sm">02</th>
                    <th class="hidden-xs hidden-sm">03</th>
                    <th class="hidden-xs hidden-sm">04</th>
                    <th class="hidden-xs hidden-sm">05</th>
                    <th class="hidden-xs hidden-sm">06</th>
                    <th class="hidden-xs hidden-sm">07</th>
                    <th class="hidden-xs hidden-sm">08</th>
                    <th class="hidden-xs hidden-sm">09</th>
                    <th class="hidden-xs hidden-sm">10</th>
                    <th class="hidden-xs hidden-sm">11</th>
                    <th class="hidden-xs hidden-sm">12</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mini Contests</td>
                    <td><?php echo array_sum($scores["mc"]) ?></td>
                    <?php
                    $keys = array_keys($scores["mc"]);
                    for ($i = 0; $i < 9; $i++) {
                        if ($i < count($scores["mc"])) {
                    ?>
                            <td class="hidden-xs hidden-sm"><?php echo sprintf('%0.1f', $scores["mc"][$keys[$i]]) ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm empty">x.y</td>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>Team Contests</td>
                    <td><?php echo array_sum($scores["tc"]) ?></td>
                    <?php
                    $keys = array_keys($scores["tc"]);
                    for ($i = 0; $i < 2; $i++) {
                        if ($i < count($scores["tc"])) {
                    ?>
                            <td class="hidden-xs hidden-sm"><?php echo $scores["tc"][$keys[$i]] ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm empty">xy.z</td>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>Homework</td>
                    <td><?php echo array_sum($scores["hw"]) ?></td>
                    <?php
                    $keys = array_keys($scores["hw"]);
                    for ($i = 0; $i < 10; $i++) {
                        if ($i < count($scores["hw"])) {
                    ?>
                            <td class="hidden-xs hidden-sm"><?php echo sprintf('%0.1f', $scores["hw"][$keys[$i]]) ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm empty">x.y</td>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>Problem Bs</td>
                    <td><?php echo array_sum($scores["pb"]) ?></td>
                    <?php
                    $keys = array_keys($scores["pb"]);
                    for ($i = 0; $i < 9; $i++) {
                        if ($i < count($scores["pb"])) {
                    ?>
                            <td class="hidden-xs hidden-sm"><?php echo $scores["pb"][$keys[$i]] ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm empty">x</td>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>Kattis Sets</td>
                    <td><?php echo array_sum($scores["ks"]) ?></td>
                    <?php
                    $keys = array_keys($scores["ks"]);
                    for ($i = 0; $i < 12; $i++) {
                        if ($i < count($scores["ks"])) {
                    ?>
                            <td class="hidden-xs hidden-sm"><?php echo $scores["ks"][$keys[$i]] ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm empty">x</td>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tr>
                <tr>
                    <td>Achievements</td>
                    <td><?php echo array_sum($scores["ac"]) ?></td>
                    <?php
                    $keys = array_keys($scores["ac"]);
                    for ($i = 0; $i< 9; $i++) {
                        if ($i < count($scores["ac"])) {
                    ?>
                            <td class="hidden-xs hidden-sm"><?php echo $scores["ac"][$keys[$i]] ?></td>
                        <?php
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm empty">x</td>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tr>
            </tbody>
        </table>

        <p>Achievement details:
        </p>

        <ol>
            <li>I am ready.</li>
            <li>The dragon becomes me!</li>
            <li>Ryūjin no ken o kurae!</li>
        </ol>

        <p>Specific (public) comments about this student:
        </p>
        <p>Graphicalized performance:
        </p>
        <div class="col-xs-12 col-md-4 col-md-offset-4">
            <canvas id="myChart" style="background-color: white" width="200" height="200"></canvas>
        </div>
    </div>
    </div>

</div>
@stop

@section('script')
<script>
    var studentName = "<?php echo $student->name ?>";
    var data = [
            <?php echo array_sum($scores["mc"]) ?>,
            <?php echo array_sum($scores["tc"]) ?>,
            <?php echo array_sum($scores["hw"]) ?>,
            <?php echo array_sum($scores["pb"]) ?>,
            <?php echo array_sum($scores["ks"]) ?>,
            <?php echo array_sum($scores["ac"]) ?>
        ];
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
<script type="text/javascript" src="/js/radarchart.js"></script>
@stop
