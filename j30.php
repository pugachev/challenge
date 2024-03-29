<?php include 'header.php' ?>
<?php

?>
<style>
    .wrap {
        display:flex;
        flex-flow: column;
        height:300px;
        margin:0 0 1em;
    }
    .content {
        padding:1em;
        margin:0.5em auto;
        width:80%;
    }
</style>
<script>
    $(function() {

    });
</script>
  <main>
    <div class="container">

                <div class="container-calendar">
                    <h4 id="monthAndYear"></h4>
                    <div class="button-container-calendar">
                        <button id="previous" onclick="previous()">‹</button>
                        <button id="next" onclick="next()">›</button>
                    </div>
                    
                    <table class="table-calendar" id="calendar" data-lang="ja">
                        <thead id="thead-month"></thead>
                        <tbody id="calendar-body"></tbody>
                    </table>
                    
                    <div class="footer-container-calendar">
                        <label for="month">日付指定：</label>
                        <select id="month" onchange="jump()">
                            <option value=0>1月</option>
                            <option value=1>2月</option>
                            <option value=2>3月</option>
                            <option value=3>4月</option>
                            <option value=4>5月</option>
                            <option value=5>6月</option>
                            <option value=6>7月</option>
                            <option value=7>8月</option>
                            <option value=8>9月</option>
                            <option value=9>10月</option>
                            <option value=10>11月</option>
                            <option value=11>12月</option>
                        </select>
                        <select id="year" onchange="jump()"></select>
                    </div>
                </div>
            </div>
            </div>
        </div>
  </main>
<?php include 'footer.php' ?>