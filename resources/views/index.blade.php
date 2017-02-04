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
                        <th class="hidden-xs hidden-sm">MC</th>
                        <th class="hidden-xs hidden-sm">TC</th>
                        <th>SPE</th>
                        <th class="hidden-xs hidden-sm">HW</th>
                        <th class="hidden-xs hidden-sm">Bs</th>
                        <th class="hidden-xs hidden-sm">KS</th>
                        <th class="hidden-xs hidden-sm">Ac</th>
                        <th>DIL</th>
                        <th>Sum</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for ($i = 0; $i < count($studentDB); $i++) {
                        $student = $studentDB[$i];
                    ?>
                    <tr style="height: 31px">
                        <td><?php echo ($i + 1); ?></td>
                        <td class="hidden-xs"><img src="" width="20px"><?php echo $student["country"]; ?></td>
                        <td class="hidden-xs"><img src="" height="15px"> <a href=<?php echo '"/student/' . ($i + 1) . '">' . $student["name"]; ?></a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href=<?php echo '"/student/' . ($i + 1) . '">' . $student["nick"]; ?></a></td>

                        <?php
                        $scores = $student["scores"];
                        ?>
                        <td class="hidden-xs hidden-sm"><?php echo $scores[0]; ?></td>
                        <td class="hidden-xs hidden-sm"><?php echo $scores[1]; ?></td>
                        <td><?php echo ($scores[0] + $scores[1]); ?></td>
                        <td class="hidden-xs hidden-sm"><?php echo $scores[2]; ?></td>
                        <td class="hidden-xs hidden-sm"><?php echo $scores[3]; ?></td>
                        <td class="hidden-xs hidden-sm"><?php echo $scores[4]; ?></td>
                        <td class="hidden-xs hidden-sm"><?php echo $scores[5]; ?></td>
                        <td><?php echo ($scores[4] + $scores[5]); ?></td>
                        <td><?php echo array_sum($scores); ?></td>
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
