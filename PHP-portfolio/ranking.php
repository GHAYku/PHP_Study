<div class = "right_menu">
    <div class="ranking">
     <div class="ranking_title">
      <%= image_tag "king_oukan.png", size: "20x20" %>
      ランキング
     </div>
      <div class="ranking_index">
       <%= image_tag "crown1.png", size: "30x30" %>
       <div class="ranking_name">
        <%= attachment_image_tag ranking_users.first, :image ,class: "user_image", fallback: "no_image.jpg", size: "25x25"%>
        <%=link_to ranking_users.first.name ,public_end_user_path(@ranking_users.first.id),class: "ranking_name"%>
       </div>
       ★<%= ranking_users.first.posts.joins(:reviews).sum(:rate).floor %>
      </div>
      <div class="ranking_index">
       <%= image_tag "crown2.png", size: "25x25" %>
       <div class="ranking_name">
        <%= attachment_image_tag ranking_users.second, :image ,class: "user_image", fallback: "no_image.jpg", size: "25x25"%>
        <%=link_to ranking_users.second.name ,public_end_user_path(@ranking_users.second.id),class: "ranking_name"%>
       </div>
       ★<%= ranking_users.second.posts.joins(:reviews).sum(:rate).floor %>
      </div>
      <div class="ranking_index">
       <%= image_tag "crown3.png", size: "25x25" %>
       <div class="ranking_name">
        <%= attachment_image_tag ranking_users.third, :image ,class: "user_image", fallback: "no_image.jpg", size: "25x25"%>
        <%=link_to ranking_users.third.name ,public_end_user_path(@ranking_users.third.id),class: "ranking_name"%>
       </div>
       ★<%= ranking_users.third.posts.joins(:reviews).sum(:rate).floor %>
      </div>
      <div class="ranking_index">
       4位
       <div class="ranking_name">
        <%= attachment_image_tag ranking_users.fourth, :image ,class: "user_image", fallback: "no_image.jpg", size: "25x25"%>
        <%=link_to ranking_users.fourth.name ,public_end_user_path(@ranking_users.fourth.id),class: "ranking_name"%>
       </div>
       ★<%= ranking_users.fourth.posts.joins(:reviews).sum(:rate).floor %>
      </div>
      <div class="ranking_index">
       5位
       <div class="ranking_name">
        <%= attachment_image_tag ranking_users.fifth, :image ,class: "user_image", fallback: "no_image.jpg", size: "25x25"%>
        <%=link_to ranking_users.fifth.name ,public_end_user_path(@ranking_users.fifth.id),class: "ranking_name"%>
       </div>
       ★<%= ranking_users.fifth.posts.joins(:reviews).sum(:rate).floor %>
      </div>
     </div>
     <div class="random_post">
      <%= image_tag "check.png", size: "20x25" %>
      注目の投稿
     </div>
     <% if random.title_id.present? %>
      <section class="post_titles">
       <div class="account_date_titles">
        <%= link_to (public_end_user_path(random.end_user.id)) do%>
         <%= attachment_image_tag random.end_user, :image ,class: "user_image", fallback: "no_image.jpg", size: "30x30"%>
        <% end %>
        <p class="account_name">
         <%= link_to random.end_user.name,public_end_user_path(random.end_user.id), class: "account_name_titles"%>さんが大喜利
         (<%= link_to random.title.body,public_title_path(random.title.id), class: "account_name_titles"%>)にボケました。
        </p>
       </div>
       <%= link_to (public_post_path(random.id)) do%>
        <%= attachment_image_tag random, :image ,class: "post_index_image", fallback: "no_image_post.png"%>
        <div class="post_main">
         <p class="post_body_titles"><%= random.body %></p>
       <% end%>
        <% if random.reviews.where(end_user_id: current_end_user.id).blank? %>
         <%= form_with(model: review, url: public_post_reviews_path(random.id), local: true, method: :POST) do |f| %>
          <div id="random_star-rate-<%= random.id %>"></div>
          <p class="random_star">★×<%=random.reviews.sum(:rate).floor%></p>
          <%= f.submit "評価", class: "titles_form_btn"%>
         <% end%>

        <% else%>

         <%= form_with(model: random.reviews.where(end_user_id: current_end_user.id), url: public_post_review_path(@random.id, @random.reviews.where(end_user_id: current_end_user.id).pluck(:id)), local: true, method: :PATCH) do |f| %>
          <div id="random_edit-comf-<%= random.id%>"></div>
          <p class="random_star">★×<%= random.reviews.sum(:rate).floor%></p>
          <%= f.submit "再評価", class: "edit_titles_form_btn"%>
         <% end%>
        <% end%>
        <% if random.end_user_id == current_end_user.id %>
         <%= link_to "編集",edit_public_post_path(random.id),class: "post_show_titles"%>
        <% end%>
       </div>
      </section>
     <% else%>
      <section class="post_index">
       <%= link_to (public_end_user_path(random.end_user.id)) do%>
        <div class="account_date">
         <%= attachment_image_tag random.end_user, :image ,class: "user_image", fallback: "no_image.jpg", size: "30x30"%>
         <p class="account_name"><%= random.end_user.name %>さんの面白投稿</p>
        </div>
       <% end%>
       <%= link_to (public_post_path(random.id)) do%>
        <%= attachment_image_tag random, :image ,class: "post_index_image", fallback: "no_image_post.png"%>
         <div class="post_main">
          <p class="post_body"><%= random.body %></p>
       <% end%>
           <% if random.reviews.where(end_user_id: current_end_user.id).blank? %>
            <%= form_with(model: review, url: public_post_reviews_path(random.id), local: true, method: :POST) do |f| %>
             <div id="random_star-rate-<%= random.id %>"></div>
             <p class="random_star">★×<%= random.reviews.sum(:rate).floor%></p>
             <%= f.submit "評価", class: "form_btn"%>
            <% end %>
           <% else%>
            <%= form_with(model: random.reviews.where(end_user_id: current_end_user.id), url: public_post_review_path(random.id, random.reviews.where(end_user_id: current_end_user.id).pluck(:id)), local: true, method: :PATCH) do |f| %>
             <div id="random_edit-comf-<%= random.id%>"></div>
             <p class="random_star">★×<%= random.reviews.sum(:rate).floor%></p>
             <%= f.submit "再評価", class: "edit_form_btn"%>
            <% end%>
           <% end%>
            <% if random.end_user_id == current_end_user.id %>
             <%= link_to "編集",edit_public_post_path(random.id),class: "post_show"%>
            <% end%>
       </div>
      </section>