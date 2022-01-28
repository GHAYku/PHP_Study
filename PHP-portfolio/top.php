<?php
  require('application_html.php');
?>

<main class="top_container">
 <div class="home_container">
  <div class="top_about">
   <%= image_tag "BAKUSHOW!!_logo.png", size: "300x75",class: "log" %>
    <h1 class="top_title">BAKUSHOW!!で爆笑。</h1>
    <ul>
	    <li class="top_list">面白いと思ったことを投稿しよう。</li>
	    <li class="top_list">大喜利にボケて更に面白くしよう。</li>
	    <li class="top_list">面白い人をフォローしよう。</li>
	    <li class="top_list">笑いを見せ合って輪を広げよう。</li>
	   </ul>
  </section>
  <div class="top_login">
   <div class="other_login">
    <h1>BAKUSHOW!!</h1>
    <%= link_to(new_end_user_session_path, class: "btn-BAKUSHOW") do %>
      <%= image_tag "icon2.png", size: "45x45"%>
				  <span>
				   ログイン
				  </span>
				<% end %>
    <%= link_to(new_end_user_registration_path, class: "btn-BAKUSHOW") do %>
    <%= image_tag "icon.png", size: "45x45"%>
				  <span>
				   新規アカウント作成
				  </span>
				<% end %>
	 </div>
  </div>
  <div class="site_scription">
   <p>
    皆の失敗談は自分の失敗を共有できるSNSです。<br>
    まずはアカウント登録をして、皆の失敗エピソードをみてみましょう。<br>
    色々な人が色々な失敗をしているのをみてきっと元気が湧いてきます。<br>
    失敗を励ましあって、成功に向かっていきましょう。<br>
   </p>
  </div>
	</div>
</main>