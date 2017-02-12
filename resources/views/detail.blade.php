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
                <?php
                $keymap = [
                    'mc' => "Mini Contests",
                    'tc' => 'Team Contests',
                    'hw' => 'Homework',
                    'pb' => 'Problem Bs',
                    'ks' => 'Kattis Sets',
                    'ac' => 'Achievements',
                ];

                $keys = array_keys($scores);
                foreach ($keys as $key) {
                ?>
                <tr>
                    <td><?php echo $keymap[$key] ?></td>
                    <td><?php echo array_sum($scores[$key]) ?></td>
                    <?php
                    for ($i = 0; $i < count($scores[$key]); $i++) {
                        if (is_numeric($scores[$key][$i])) {
                            if ($key == "mc" || $key == "tc" || $key == "hw") {
                    ?>
                                <td class="hidden-xs hidden-sm"><?php echo sprintf("%.1f", $scores[$key][$i]) ?></td>
                            <?php
                            } else {
                            ?>
                                <td class="hidden-xs hidden-sm"><?php echo $scores[$key][$i] ?></td>
                            <?php
                            }
                        } else {
                        ?>
                            <td class="hidden-xs hidden-sm empty"><?php echo $scores[$key][$i] ?></td>
                        <?php
                        }
                        ?>
                    <?php
                    }
                    ?>
                </tr>
                <?php
                }
                ?>
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
        <div class="col-xs-12" style="height:50px;"></div>
        {!! Form::open(['method' => 'DELETE', 'onsubmit' => 'return ConfirmDelete()']) !!}
        <div class="form-group col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
            {!! Form::hidden('id', $student->id) !!}
            {!! Form::submit('Delete', ['class' => 'form-control btn-danger']) !!}
        </div>
    </div>

    </div>

</div>
@stop

@section('script')
<script>
    function ConfirmDelete() {
        var alert = confirm("Wipe this student out of the face of the Earth. Really?");
        if (alert) {
            return true;
        } else {
            return false;
        }
    }

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
