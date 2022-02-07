<main class="posts">
  <div class="posts_container">
    <%= render "public/end_users/current_end_user_menu" %>
      <div class="posts_main">
        <%= render 'layouts/flash'%>
        <nav class="post_select">
         <ul>
          <li class="select-btns">編集</li>
         </ul>
        </nav>
        <% if @post.title_id.present? %>
         <section class="post_titles">
          <%= link_to (public_end_user_path(@title.end_user.id)) do%>
            <div class="account_date_titles">
              <%= attachment_image_tag @title.end_user, :image ,class: "user_image", fallback: "no_image.jpg", size: "30x30"%>
              <p class="account_name"><%= @title.end_user.name %>さんからのお題</p>
            </div>
          <% end%>
          <%= attachment_image_tag @title, :image ,class: "post_index_image", fallback: "no_image_post.png"%>
            <div class="post_main">
              <p class="post_body_titles"><%= @title.body %></p>
              <% if @title.end_user_id == current_end_user.id %>
                <div>
                  <%= link_to "編集",edit_public_title_path(@title.id),class: "post_show_titles"%>
                </div>
              <% end%>
            </div>
         </section>
         <section class="post_titles">
          <%= form_with model: @post, url: public_post_path(@post.id), local:true do |f| %>
            <div class="post_form_image">
              <label>投稿画像</label>
              <%= f.attachment_field :image%>
            </div>
            <div class="post_form_body">
              <label>投稿内容</label>
              <%= f.text_area :body, placeholder: "投稿内容", class: "post_body_form"%>
            </div>
            <div class="post_form_body">
              <label>ジャンル</label>
              <%= f.collection_select :genre_id, Genre.all, :id, :name, include_blank: "選択して下さい"%>
            </div>
            <div class="post_form_btn">
             <%= f.submit "編集", class: "titles_form_btn"%>
            </div>
            <div class="post_delete">
             <%= link_to "削除", public_post_path(@post.id), method: :DELETE,class: "post_show_titles"%>
            </div>
          <% end %>
         </section>
         <a class="scroll"></a>
        <% else%>
         <section class="post_index">
          <%= form_with model: @post, url: public_post_path(@post.id), local:true do |f| %>
            <div class="post_form_image">
              <label>投稿画像</label>
              <%= f.attachment_field :image%>
            </div>
            <div class="post_form_body">
              <label>投稿内容</label>
              <%= f.text_area :body, placeholder: "投稿内容", class: "post_body_form"%>
            </div>
            <div class="post_form_body">
              <label>ジャンル</label>
              <%= f.collection_select :genre_id, Genre.all, :id, :name, include_blank: "選択して下さい"%>
            </div>
            <div class="post_form_btn">
             <%= f.submit "編集", class: "form_btn"%>
            </div>
            <div class="post_delete">
             <%= link_to "削除", public_post_path(@post.id), method: :DELETE,class: "post_show"%>
            </div>
          <% end %>
         </section>
         <a class="scroll"></a>
        <% end %>
      </div>
     <%= render "public/end_users/right_menu", {ranking_users: @ranking_users ,random: @random,review: @review} %>
  </div>
</main>