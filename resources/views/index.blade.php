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
                    <tr style="height: 31px">
                        <td>1</td>
                        <td class="hidden-xs"><img src="img/jp.png" width="20px"> JP</td>
                        <td class="hidden-xs"><img src="img/hanzo.png" height="15px"> <a href="/student/1">Hanzo Shimada</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/1">Hanzo</a></td>
                        <td class="hidden-xs hidden-sm">3</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>3</td>
                        <td class="hidden-xs hidden-sm">1.5</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">2</td>
                        <td class="hidden-xs hidden-sm">4</td>
                        <td>8.5</td>
                        <td>11.5</td>
                    </tr>

                    <tr style="height: 31px">
                        <td>2</td>
                        <td class="hidden-xs"><img src="img/jp.png" width="20px"> JP</td>
                        <td class="hidden-xs"><img src="img/genji.png" height="15px"> <a href="/student/2">Genji Shimada</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/2">Genji</a></td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>1</td>
                        <td class="hidden-xs hidden-sm">1.5</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">2</td>
                        <td class="hidden-xs hidden-sm">4</td>
                        <td>8.5</td>
                        <td>9.5</td>
                    </tr>

                    <tr style="height: 31px">
                        <td>3</td>
                        <td class="hidden-xs"><img src="img/germany.png" height="15px" width="20px"> DE</td>
                        <td class="hidden-xs"><img src="img/bastion.png" height="15px"> <a href="/student/3">Just Bastion</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/3">Bastion</a></td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>1</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">2</td>
                        <td class="hidden-xs hidden-sm">4</td>
                        <td>8</td>
                        <td>9</td>
                    </tr>

                    <tr style="height: 31px">
                        <td>4</td>
                        <td class="hidden-xs"><img src="img/us.png" width="20px"> US</td>
                        <td class="hidden-xs"><img src="img/reaper.png" height="15px"> <a href="/student/4">Reaper The Great</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/4">Reaper</a></td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>0</td>
                        <td class="hidden-xs hidden-sm">1.5</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">2</td>
                        <td class="hidden-xs hidden-sm">3</td>
                        <td>7.5</td>
                        <td>7.5</td>
                    </tr>

                    <tr style="height: 31px">
                        <td>5</td>
                        <td class="hidden-xs"><img src="img/au.png" width="20px"> AU</td>
                        <td class="hidden-xs"><img src="img/junkrat.png" height="15px"> <a href="/student/5">Totally Sane Junkrat</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/5">Junkrat</a></td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>1</td>
                        <td class="hidden-xs hidden-sm">1.5</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td class="hidden-xs hidden-sm">2</td>
                        <td class="hidden-xs hidden-sm">3</td>
                        <td>6.5</td>
                        <td>7.5</td>
                    </tr>

                    <tr style="height: 31px">
                        <td>6</td>
                        <td class="hidden-xs"><img src="img/us.png" width="20px"> US</td>
                        <td class="hidden-xs"><img src="img/soldier76.png" height="15px"> <a href="/student/6">Soldier 76 (years old)</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/6">76</a></td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>1</td>
                        <td class="hidden-xs hidden-sm">1.5</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">3</td>
                        <td>5.5</td>
                        <td>6.5</td>
                    </tr>

                    <tr style="height: 31px">
                        <td>7</td>
                        <td class="hidden-xs"><img src="img/uk.png" width="20px"> GB</td>
                        <td class="hidden-xs"><img src="img/tracer.png" height="15px"> <a href="/student/7">Tracer</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/7">Tracer</a></td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>1</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">3</td>
                        <td>5</td>
                        <td>6</td>
                    </tr>

                    <tr style="height: 31px">
                        <td>8</td>
                        <td class="hidden-xs"><img src="img/fr.png" width="20px"> FR</td>
                        <td class="hidden-xs"><img src="img/widowmaker.png" height="15px"> <a href="/student/8">Grumpy Widowmaker</a></td>
                        <td class="hidden-sm hidden-md hidden-lg"><a href="/student/8">Widow Maker</a></td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td>1</td>
                        <td class="hidden-xs hidden-sm">1.5</td>
                        <td class="hidden-xs hidden-sm">0</td>
                        <td class="hidden-xs hidden-sm">1</td>
                        <td class="hidden-xs hidden-sm">2</td>
                        <td>4.5</td>
                        <td>5.5</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
