<?php
	// 画像ファイルのパス (相対パス)
	$img = 'picture/photo.jpg' ;

	// Exifを取得し、[$exif]に代入する
	$exif = @exif_read_data( $img ) ;

	// 取得したデータを確認する
	echo '<pre>' ;
	var_dump( $exif ) ;
	echo '</pre>' ;

?>

<head>
    <title>Add Map</title>
    <!-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script> -->

    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script type="module" src="./index.js"></script>
  </head>
  <body>
    <h3>My Photo Tracking</h3>
    <!--The div element for the map -->
    <div id="map"></div>

    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyD42_sEfDBBT4vufQpdSCWZdFA9TNPhpkU", v: "beta"});</script>
  </body>