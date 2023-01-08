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

        @keyframes pulseMotion1 {
            0% {
                transform: translate(-50%, -50%) scale(1, 1);
                background-color: rgba(173, 255, 47, 0.4)
            }
            100% {
                transform: translate(-50%, -50%) scale(6.5, 6.5);
                background-color: rgba(173, 255, 47, 0)
            }
        }

        @keyframes pulseMotion2 {
            0% {
                transform: translate(-50%, -50%) scale(1, 1);
                background-color: rgba(255, 215, 0, 0.4)
            }
            100% {
                transform: translate(-50%, -50%) scale(6.5, 6.5);
                background-color: rgba(255, 215, 0,0)
            }
        }

        @keyframes pulseMotion3 {
            0% {
                transform: translate(-50%, -50%) scale(1, 1);
                background-color: rgba(255, 182, 193, 0.4)
            }
            100% {
                transform: translate(-50%, -50%) scale(6.5, 6.5);
                background-color: rgba(255, 182, 193,0)
            }
        }

        .inner {
            display: flex;
            justify-content: center;
            margin-top: 300px;
        }

        .point1 {
            display: block;
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 100px;
            background-color: #0F0;
            border-radius: 50%;
            transition: background-color cubic-bezier(0.77, 0.2, 0.05, 1) .4s;
            cursor: pointer;
            text-align: center;
            line-height: 200px;
        }

        .point2 {
            display: block;
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 100px;
            background-color: #FF0;
            border-radius: 50%;
            transition: background-color cubic-bezier(0.77, 0.2, 0.05, 1) .4s;
            cursor: pointer;
            text-align: center;
            line-height: 200px;
        }
        
        .point3 {
            display: block;
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 100px;
            background-color: #ff69b4;
            border-radius: 50%;
            transition: background-color cubic-bezier(0.77, 0.2, 0.05, 1) .4s;
            cursor: pointer;
            text-align: center;
            line-height: 200px;
        }

        .point1.-active {
            background-color: #99FFCC;
        }
        .point2.-active {
            background-color: #FFFFCC;
        }
        .point3.-active {
            background-color: #ffb6c1;
        }
        .point1.:focus {
            outline: none;
        }
        .point2.:focus {
            outline: none;
        }
        .point3.:focus {
            outline: none;
        }
        .point1:after {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transition: opacity linear 0.4s;
            content: '';
        }
        .point2:after {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transition: opacity linear 0.4s;
            content: '';
        }
        .point3:after {
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            transition: opacity linear 0.4s;
            content: '';
        }
        .point1.-active:after {
            animation-name: pulseMotion1;
            animation-duration: 1.0s;
            animation-iteration-count: 5;
        }
        
        .point2.-active:after {
            animation-name: pulseMotion2;
            animation-duration: 1.0s;
            animation-iteration-count: 15;
        }

        .point3.-active:after {
            animation-name: pulseMotion3;
            animation-duration: 1.0s;
            animation-iteration-count: 10;
        }
</style>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> 
    <script>
    $(function() {
        $target1 = $('.point1');
        $target1.on('click', e=> {
            $target1.removeClass('-active');
            $(e.currentTarget).addClass('-active');
            setTimeout(function(){
                $target2 = $('.point2');
                $target2.removeClass('-active');
                $target2.addClass('-active');
            },5000);
            setTimeout(function(){
                $target3 = $('.point3');
                $target3.removeClass('-active');
                $target3.addClass('-active');
            },20000); 
        });
        // $target2 = $('.point2');
        // $target2.on('click', e=> {
        // $target2.removeClass('-active');
        //     $(e.currentTarget).addClass('-active');
        // });
        // $target3 = $('.point3');
        // $target3.on('click', e=> {
        // $target3.removeClass('-active');
        //     $(e.currentTarget).addClass('-active');
        // });
    });

</script>
  <main>
        <div class="inner">
            <span class="point1">吸う</span>
            <span class="point2">止める</span>
            <span class="point3">吐く</span>
        </div>
  </main>
<?php include 'footer.php' ?>