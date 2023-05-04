//西暦用セレクトボックス
function generate_year_range(start, end) {
    var years = "";
    for (var year = start; year <= end; year++) {
        years += "<option value='" + year + "'>" + year + "</option>";
    }
    return years;
  }
  
  var today = new Date();
  var currentMonth = today.getMonth();//現在選択中の月 0月から開始みたい 5月なら4がくる
  var currentYear = today.getFullYear();//現在選択中の年
  var selectYear = document.getElementById("year");//セレクトボックスで選択された年の要素
  var selectMonth = document.getElementById("month");//セレクトボックスで選択された月の要素
  
  //初期状態では1970-2030までを指定している
  var createYear = generate_year_range(1970, 2030);
  //HTMLの要素yearに西暦用セレクトボックスを挿入する
  document.getElementById("year").innerHTML = createYear;
  
  //カレンダーtableを取得
  var calendar = document.getElementById("calendar");
  //どうつかうか不明だが言語設定の模様 デフォルトではja
  var lang = calendar.getAttribute('data-lang');
  
  //ここらは決め打ちでOKな定数配列
  var months = ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"];
  var days = ["日", "月", "火", "水", "木", "金", "土"];
  
  //ここからカレンダーtableを作っている模様
  var dayHeader = "<tr>";
  for (day in days) {//javascriptは要素 in 配列
    //ここは曜日を設定してる模様
    dayHeader += "<th data-days='" + days[day] + "'>" + days[day] + "</th>";
  }
  dayHeader += "</tr>";
  //上でつくった曜日配列をセットしている
  document.getElementById("thead-month").innerHTML = dayHeader;
  //カレンダー上部の月/年の「要素」をセットしている模様
  monthAndYear = document.getElementById("monthAndYear");
//   console.log(currentMonth+'   '+currentYear);
  showCalendar(currentMonth, currentYear);
  
  function next() {
    currentYear = (currentMonth === 11) ? currentYear + 1 : currentYear;
    currentMonth = (currentMonth + 1) % 12;//現在が5月 currentMonth=4 5/12・・・5 つまり6月
    //結局指定した年月でカレンダーを表示する
    showCalendar(currentMonth, currentYear);
  }
  
  function previous() {
    currentYear = (currentMonth === 0) ? currentYear - 1 : currentYear;
    currentMonth = (currentMonth === 0) ? 11 : currentMonth - 1;
    //結局指定した年月でカレンダーを表示する
    showCalendar(currentMonth, currentYear);
  }
  
  function jump() {
    currentYear = parseInt(selectYear.value);
    currentMonth = parseInt(selectMonth.value);
    //結局指定した年月でカレンダーを表示する
    showCalendar(currentMonth, currentYear);
  }
  
  function showCalendar(month, year) {
    //カレンダー上部にセットされた年/月から曜日を0-6の値で取得する
    var firstDay = ( new Date( year, month ) ).getDay();
    // console.log(year+'  '+month+'  '+firstDay);
    //これがカレンダー本体
    tbl = document.getElementById("calendar-body");
  
    tbl.innerHTML = "";//まずは初期化
    // console.log(month+'   '+year);
    //呼び元でセットされた要素のinnerHTMLに値をいれている
    monthAndYear.innerHTML = months[month] + " " + year;//5月は4
    //呼び元でセットされた要素のvalueに値をセット
    selectYear.value = year;
    selectMonth.value = month;
  
    // creating all cells
    var date = 1;
    //ここからカレンダー本体を作っていく模様
    for ( var i = 0; i < 6; i++ ) {//これは週なので６個 縦方向 マス目が６x7=42個あればOK
        var row = document.createElement("tr");
        //ここからは週 横展開 7個
        for ( var j = 0; j < 7; j++ ) {
            //1週目かつ月初めまでの間は文字をいれずに空にしている模様
            if ( i === 0 && j < firstDay ) {
                cell = document.createElement( "td" );
                cellText = document.createTextNode("");
                //cellというtd要素を作成
                cell.appendChild(cellText);
                //rowというtrにtdをぶら下げる
                row.appendChild(cell);
            } else if (date > daysInMonth(month, year)) {
                //dateが当月の月末日より大きくなったらカレンダー生成から抜ける
                break;
            } else {
                cell = document.createElement("td");
                cell.setAttribute("data-date", date);
                cell.setAttribute("data-month", month + 1);
                cell.setAttribute("data-year", year);
                cell.setAttribute("data-month_name", months[month]);
                cell.onclick=function(){alert(year+'-'+(month+1)+'-'+date);};
                cell.className = "date-picker";
                cell.innerHTML = "<span>" + date + "</span>";
  
                if ( date === today.getDate() && year === today.getFullYear() && month === today.getMonth() ) {
                    cell.className = "date-picker selected";
                }
                row.appendChild(cell);
                date++;
            }
        }
        //tableにtrを追加する
        tbl.appendChild(row);
    }
  
  }
  
  function daysInMonth(iMonth, iYear) {
    // console.log(iMonth+'  '+iYear+'  '+new Date(iYear, iMonth, 32).getDate());
    //dateが翌月に入るかをみている？
    return 32 - new Date(iYear, iMonth, 32).getDate();
  }