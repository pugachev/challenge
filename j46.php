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
        /*====================================================================
        .s_07 .accordion_one
        ====================================================================*/
        .s_07 .accordion_one {
          max-width: 1024px;
          margin: 0 auto;
        }
        .s_07 .accordion_one .accordion_header {
          background-color: #db0f2f;
          border-bottom: 1px solid #fff;
          color: #fff;
          font-size: 26px;
          font-weight: bold;
          padding: 20px 11%;
          text-align: center;
          position: relative;
          z-index: +1;
          cursor: pointer;
          transition-duration: 0.2s;
        }
        .s_07 .accordion_one:nth-of-type(1) .accordion_inner .accordion_header {
          background-color: #f52d4c;
        }
        .s_07 .accordion_one:nth-of-type(1) .accordion_inner .accordion_inner  .accordion_header {
          background-color: #ff667e;
        }
        .s_07 .accordion_one:nth-of-type(2) .accordion_header {
          background-color: #ff9a05;
        }
        .s_07 .accordion_one:nth-of-type(2) .accordion_inner .accordion_header {
          background-color: #ffb64a;
        }
        .s_07 .accordion_one:nth-of-type(2) .accordion_inner .accordion_inner  .accordion_header {
          background-color: #ffce85;
        }
        .s_07 .accordion_one:nth-of-type(3) .accordion_header {
          background-color: #1c85d8;
        }
        .s_07 .accordion_one:nth-of-type(3) .accordion_inner .accordion_header {
          background-color: #4cacf9;
        }
        .s_07 .accordion_one:nth-of-type(3) .accordion_inner .accordion_inner  .accordion_header {
          background-color: #85c9ff;
        }
        .s_07 .accordion_one .accordion_header:hover {
          opacity: .8;
        }
        .s_07 .accordion_one .accordion_header .i_box {
          display: flex;
          justify-content: center;
          align-items: center;
          position: absolute;
          top: 50%;
          right: 5%;
          width: 40px;
          height: 40px;
          border: 1px solid #fff;
          margin-top: -20px;
          box-sizing: border-box;
          -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
          transform-origin: center center;
          transition-duration: 0.2s;
        }
        .s_07 .accordion_one .accordion_header .i_box .one_i {
          display: block;
          width: 18px;
          height: 18px;
          -webkit-transform: rotate(45deg);
          transform: rotate(45deg);
          transform-origin: center center;
          transition-duration: 0.2s;
          position: relative;
        }
        .s_07 .accordion_one .accordion_header.open .i_box {
          -webkit-transform: rotate(-360deg);
          transform: rotate(-360deg);
        }
        .s_07 .accordion_one .accordion_header .i_box .one_i:before, .s_07 .accordion_one .accordion_header .i_box .one_i:after {
          display: flex;
          content: '';
          background-color: #fff;
          border-radius: 10px;
          width: 18px;
          height: 4px;
          position: absolute;
          top: 7px;
          left: 0;
          -webkit-transform: rotate(0deg);
          transform: rotate(0deg);
          transform-origin: center center;
        }
        .s_07 .accordion_one .accordion_header .i_box .one_i:before {
          width: 4px;
          height: 18px;
          top: 0;
          left: 7px;
        }
        .s_07 .accordion_one .accordion_header.open .i_box .one_i:before {
          content: none;
        }
        .s_07 .accordion_one .accordion_header.open .i_box .one_i:after {
          -webkit-transform: rotate(-45deg);
          transform: rotate(-45deg);
        }
        .s_07 .accordion_one .accordion_inner {
          display: none;
          padding: 0;
          box-sizing: border-box;
        }
        .s_07 .accordion_one .accordion_inner .box_one {
          height: 300px;
        }
        .s_07 .accordion_one .accordion_inner p.txt_a_ac {
          margin: 0;
        }
        @media screen and (max-width: 1024px) {
          .s_07 .accordion_one .accordion_header {
            font-size: 18px;
          }
          .s_07 .accordion_one .accordion_header .i_box {
            width: 30px;
            height: 30px;
            margin-top: -15px;
          }
        }
        @media screen and (max-width: 767px) {
          .s_07 .accordion_one .accordion_header {
            font-size: 16px;
            text-align: left;
            padding: 15px 60px 15px 15px;
          }
        }
</style>

  <main>
    <div class="container">
      <div class="wrap">
        <div class="content">

          <div class="section s_07">

            <div class="accordion_one">
              <div class="accordion_header">アコーディオンで多階層のメニューを作る<div class="i_box"><i class="one_i"></i></div></div>
              <div class="accordion_inner">
                <div class="accordion_one">
                  <div class="accordion_header">A<div class="i_box"><i class="one_i"></i></div></div>
                  <div class="accordion_inner">
                    <div class="accordion_one">
                      <div class="accordion_header">A_a</div>
                      <div class="accordion_header">A_b</div>
                    </div>
                  </div>
                </div>
                <div class="accordion_one">
                  <div class="accordion_header">B<div class="i_box"><i class="one_i"></i></div></div>
                  <div class="accordion_inner">
                    <div class="accordion_one">
                      <div class="accordion_header">B_a</div>
                      <div class="accordion_header">B_b</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion_one">
              <div class="accordion_header">アコーディオンで多階層のメニューを作る<div class="i_box"><i class="one_i"></i></div></div>
              <div class="accordion_inner">
                <div class="accordion_one">
                  <div class="accordion_header">A<div class="i_box"><i class="one_i"></i></div></div>
                  <div class="accordion_inner">
                    <div class="accordion_one">
                      <div class="accordion_header">A_a</div>
                      <div class="accordion_header">A_b</div>
                    </div>
                  </div>
                </div>
                <div class="accordion_one">
                  <div class="accordion_header">B<div class="i_box"><i class="one_i"></i></div></div>
                  <div class="accordion_inner">
                    <div class="accordion_one">
                      <div class="accordion_header">B_a</div>
                      <div class="accordion_header">B_b</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="accordion_one">
              <div class="accordion_header">アコーディオンで多階層のメニューを作る<div class="i_box"><i class="one_i"></i></div></div>
              <div class="accordion_inner">
                <div class="accordion_one">
                  <div class="accordion_header">A<div class="i_box"><i class="one_i"></i></div></div>
                  <div class="accordion_inner">
                    <div class="accordion_one">
                      <div class="accordion_header">A_a</div>
                      <div class="accordion_header">A_b</div>
                    </div>
                  </div>
                </div>
                <div class="accordion_one">
                  <div class="accordion_header">B<div class="i_box"><i class="one_i"></i></div></div>
                  <div class="accordion_inner">
                    <div class="accordion_one">
                      <div class="accordion_header">B_a</div>
                      <div class="accordion_header">B_b</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>







        </div>
      </div>
    </div>
  </main>

    <script>
    $(function() {
      //.accordion_oneの中の.accordion_headerがクリックされたら
      $('.s_07 .accordion_one .accordion_header').click(function(){
        //クリックされた.accordion_oneの中の.accordion_headerに隣接する.accordion_innerが開いたり閉じたりする。
        $(this).next('.accordion_inner').slideToggle();
        $(this).toggleClass("open");
      });
    });
</script>
<?php include 'footer.php' ?>