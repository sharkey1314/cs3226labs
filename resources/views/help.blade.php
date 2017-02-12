@extends('template')
@section('main')
<div class="container-fluid">
<div class="row">
    <div class="col-xs-12">
        <h3>Overview</h3>

        <p>The purpose of this ranklist app is twofold:
        </p>

        <ol>
            <li>As a gamification system to push the entire ~21 NUS students currently enrolled in Steven's <a href='http://www.comp.nus.edu.sg/~stevenha/cs3233.html'>CS3233</a> module to work as hard as they can...</li>
            <li>As a testing platform for Steven to self-learn Laravel framework, to be subsequently taught to Steven's <a href='http://www.comp.nus.edu.sg/~stevenha/cs3226.html'>CS3226</a> students :)</li>
        </ol>

        <hr>

        <h3>MC = Weekly Mini Contest (36%)</h3>

        <p>9 Weekly Mini Contests, three problems in 75 minutes, using <a href='http://algorithmics.comp.nus.edu.sg/~mooshak' target='_blank'>Mooshak</a>.<br> (9 weeks x (3%+0.5%+0.5%)/week = 36%).<br>
        </p>

        <ol type="A">
            <li>very easy/easy/warm-up/1-2 simple CP technique(s): 1%.</li>
            <li>medium/last week material, 2%.</li>
            <li>usually very hard and from topics not specifically taught in class, for CS3233R students, bonus 0.5% for CS3233/R students who can get this AC in contest time.</li>
        </ol>

        <p>Occasionally, we may open problem D (or even E) which is (are) the easier form of problem A/B/C. We give bonus 0.5% for top 3 in each mini contest. We use strict binary grading (Accepted or not Accepted: Wrong Answer, Time Limit, Memory
            Limit, Runtime Error, etc) for our contests.<br>
        </p>

        <hr>

        <h3>Two Team Contests (24%)</h3>

        <p>1 Midterm Team Contest (10%+0.5%=10.5%, 10 "original" problems, worth 1.0% each).<br> 1 Final Team Contest (13%+0.5%=13.5%, 10 "original" problems, worth 1.3% each).<br> Bonus 0.5% for top 3 teams in both team contests.<br> Team size is
            three students.<br> If the class size is not divisible by 3, the last team can have 4 or 5 members.
        </p>

        <hr>

        <h3>Weekly Homework (15%)</h3>

        <p>10 Weekly Homework (10 weeks * 1.5%/week = 15%).<br> CP3.17 book review + solve certain written exercises + update the lecturer, 1.5%.<br> Scoring scheme: 0% = no submission, 0.5% = poor, 1% = default score, 1.5% superb.<br>
        </p>

        <hr>

        <h3>Problem Bs (9%)</h3>

        <p>Solve problem B of last week's mini contest at home, on your own pace, by next Wed 04.30pm (closed by the time Wei Liang's consultation hour is over), if you fail to solve it during the live Mini Contest. Simply submit your code to Mooshak,
            TA will check your last submission @ Mooshak.<br>
        </p>

        <p>Scoring scheme:<br> 0% = not AC in the actual mini contest and not attempted after one more week.<br> 1% = managed to solve problem B during mini contest itself or before deadline.<br> There is no additional marks for solving problem C
            at home (for CS3233R students).<br>
        </p>

        <hr>

        <h3>Kattis Set (12%)</h3>

        <p>We use <a href="https://nus.kattis.com" target="_blank">Kattis@NUS</a> for this semester.
            <!--Abandoned starting 2016: <a href="http://uhunt.felix-halim.net/series" target="_blank">http://uhunt.felix-halim.net/series</a>-->
        </p>

        <p>Steven selects ten targeted Kattis problems related to CS3233 topic of that week. To get 1% per week, student has to solve at least three (of any preferred difficulty level as indicated in Kattis) of the selected problems within the stipulated
            deadline (Wednesday night 09:00:00pm SGT of that week until Wednesday 08:59:59pm SGT of the following week).<br>
        </p>

        <ul>
            <li>Set #01, Ad Hoc</li>
            <li>Set #02, Data Structures and Libraries</li>
            <li>Set #03, Complete Search</li>
            <li>Set #04, Dynamic Programming</li>
            <li>Set #05, Graph 1 (Basics) and Special Cases of NP-hard Problems</li>
            <li><b>NUS recess week</b> (nothing is due this week)</li>
            <li>Set #06, Graph 2 (Network Flow)</li>
            <li>Set #07, Graph 3 (Shortest Paths, before Steven's baby no 3 birth day)</li>
            <li>Set #08, Graph 4 (Matching and Special Graphs, after Steven's baby no 3 birth day)</li>
            <li>Set #09, Mathematics</li>
            <li>Set #10, String Processing</li>
            <li>Set #11, Computational Geometry</li>
            <li>Set #12, Mix and Match</li>
        </ul>

        <hr>

        <h3>Achievement System of CS3233 (17%)</h3>

        <p>One star = 1%, most achievements are manual entry:<br>
        </p>

        <ol>
            <li>* <b>Let it begins</b>: Solve any 1st Kattis problem (thus having non zero point on Kattis) by Wed, 11 January 2017, 23:59 (this is after the introduction lecture).</li>
            <li>* <b>Quick starter</b>: Score at least 30 points on Kattis (approximately 20 easiest problems worth 1.5 points, or 20*1.5 = 30 points) by the end of Week01.</li>
            <li>*** <b>Active in class</b>: Subjective title for student who participated well during various class activities (answering in-lecture questions, asking/answering questions in real life or in our Facebook group, consultations (with Steven
                or Wei Liang on Wed 2.30-4.30pm), active in Kattis, etc), awarded by Steven throughout the semester (max claim: 3 times/student).</li>
            <li>*** <b>Surprise us</b>: Managed to surprise the teaching staffs by giving a better/more elegant solution/pinpoint bug in lecture, etc anytime during the semester (max claim: 3 times/student).</li>
            <li>* <b>High determination</b>: Objective title for student who always diligently solve (AC) problem B of all 10 weekly contests, be it during contest time or as homework assignment. This achievement will be auto updated by this system
                at the end of the semester.</li>
            <li>* <b>Bookworm</b>: Subjective title for student who diligently study and review CP3.17 book by the end of Week12 (at least 10*1.5% - 0.5% = 14.5% score, i.e. at most one 1.0 with the rest 1.5). This achievement will be auto updated
                by this system at the end of the semester.</li>
            <li>****** <b>Kattis apprentice</b>: Be in top 25 (6%)/50 (5%)/100 (4%)/150 (3%)/200 (2%)/250 (1%) of <a href="https://open.kattis.com/ranklist" target="_blank">Kattis ranklist</a> <u>by the end of Week13</u> (this achievement will NOT
                be updated weekly as this will keep changing every week).</li>
            <li>* <b>CodeForces Specialist</b>: Given to student who also join <a href="http://codeforces.com/" target="_blank">CodeForces</a> contests and attain rating of at least
                <font color="Cyan">1400 (Cyan color)</font> <u>by the end of Week13</u> (this achievement will NOT be updated weekly as this will keep changing every week).</li>
            <!-- UVa apprentice: min(2%, 8*X/1885 * 2%): This is a comparison between what you manage to solve in UVa online judge (X) by the end of the semester (Thursday, 7 May 2015, 11.59AM/midday) compared to Steven's at the start of semester (1885 AC problems), multiplied by a scaling factor of 8 =)... or approximately 236 AC problems in one semester (it is possible for student to reach this number in 4 months of CS3233). This achievement will be auto updated by this system. -->
        </ol>
    </div>
</div>
</div>
@stop
