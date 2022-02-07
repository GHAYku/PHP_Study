<main class="posts">
  <div class="posts_container">
  <%= render "public/end_users/current_end_user_menu" %>
    <div class="posts_main">
      <%= render 'layouts/flash'%>
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
                  <%= link_to(public_title_path(@title.id),class: "titles_form_btn") do %>
                    ボケる
                  <% end%>
                  <% if @title.end_user_id == current_end_user.id %>
                    <div>
                      <%= link_to "編集",edit_public_title_path(@title.id),class: "post_show_titles"%>
                    </div>
                  <% end%>
              </div>
          </section>
          <section class="post_titles">
            <div class="account_date_titles">
              <%= link_to (public_end_user_path(@post.end_user.id)) do%>
                <%= attachment_image_tag @post.end_user, :image ,class: "user_image", fallback: "no_image.jpg", size: "30x30"%>
              <% end %>
              <p class="account_name">
                <%= link_to @post.end_user.name,public_end_user_path(@post.end_user.id), class: "account_name_titles"%>さんが大喜利
                (<%= link_to @post.title.body,public_title_path(@post.title.id), class: "account_name_titles"%>)にボケました。
              </p>
            </div>

            <%= link_to (public_post_path(@post.id)) do%>
              <%= attachment_image_tag @post, :image ,class: "post_index_image", fallback: "no_image_post.png"%>
              <div class="post_main">
                <p class="post_body_titles"><%= @post.body %></p>
            <% end%>

                <% if @post.reviews.where(end_user_id: current_end_user.id).blank? %>
                  <%= form_with(model: @review, url: public_post_reviews_path(@post.id), local: true, method: :POST) do |f| %>
                    <div id="star-rate-<%= @post.id %>"></div>
                    <p class="star">★×<%=@post.reviews.sum(:rate).floor%></p>
                    <%= f.submit "評価", class: "titles_form_btn"%>
                  <% end%>

                <% else%>

                  <%= form_with(model: @post.reviews.where(end_user_id: current_end_user.id), url: public_post_review_path(@post.id, @post.reviews.where(end_user_id: current_end_user.id).pluck(:id)), local: true, method: :PATCH) do |f| %>
                    <div id="edit-comf-<%= @post.id%>"></div>
                    <p class="star">★×<%= @post.reviews.sum(:rate).floor%></p>
                    <%= f.submit "再評価", class: "edit_titles_form_btn"%>
                  <% end%>
                <% end%>
                <% if @post.end_user_id == current_end_user.id %>
                  <%= link_to "編集",edit_public_post_path(@post.id),class: "post_show_titles"%>
                <% end%>
              </div>
          </section>

        <% else%>

          <section class="post_index">
            <%= link_to (public_end_user_path(@post.end_user.id)) do%>
              <div class="account_date">
                <%= attachment_image_tag @post.end_user, :image ,class: "user_image", fallback: "no_image.jpg", size: "30x30"%>
                <p class="account_name"><%= @post.end_user.name %>さんの面白投稿</p>
              </div>
            <% end%>

            <%= link_to (public_post_path(@post.id)) do%>
              <%= attachment_image_tag @post, :image ,class: "post_index_image", fallback: "no_image_post.png"%>
              <div class="post_main">
                <p class="post_body"><%= @post.body %></p>
            <% end%>

                <% if @post.reviews.where(end_user_id: current_end_user.id).blank? %>
                  <%= form_with(model: @review, url: public_post_reviews_path(@post.id), local: true, method: :POST) do |f| %>
                    <div id="star-rate-<%= @post.id %>"></div>
                    <p class="star">★×<%= @post.reviews.sum(:rate).floor%></p>
                    <%= f.submit "評価", class: "form_btn"%>
                  <% end %>

                <% else%>

                  <%= form_with(model: @post.reviews.where(end_user_id: current_end_user.id), url: public_post_review_path(@post.id, @post.reviews.where(end_user_id: current_end_user.id).pluck(:id)), local: true, method: :PATCH) do |f| %>
                    <div id="edit-comf-<%= @post.id%>"></div>
                    <p class="star">★×<%= @post.reviews.sum(:rate).floor%></p>
                    <%= f.submit "再評価", class: "edit_form_btn"%>
                  <% end%>
                <% end%>
                <% if @post.end_user_id == current_end_user.id %>
                  <%= link_to "編集",edit_public_post_path(@post.id),class: "post_show"%>
                <% end%>

              </div>
          </section>
        <% end %>
        <div class="comment">
          <%= form_with(model: @comment, url: public_post_comments_path(@post.id), local: true) do |f| %>
            <%= f.text_area :comment ,class:"comment_form"%>
            <div class="comment_action">
              <%= f.submit "コメントをする", class:"form_btn"%>
            </div>
          <% end %>
        </div>
        <div class="scroll-list jscroll">
          <% @comments.each do |comment| %>
            <%= link_to (public_end_user_path(comment.end_user.id)) do%>
              <div class="comment_index">
                <div class="account_date">
                  <%= attachment_image_tag comment.end_user, :image ,class: "user_image", fallback: "no_image.jpg", size: "20x20"%>
                  <p class="account_name"><%= comment.end_user.name %>さんのコメント</p>
                </div>
            <% end%>
                <p class="comment_body"><%= comment.comment %>
                　<% if comment.end_user_id == current_end_user.id %>
                 　<%= link_to "削除", public_post_comment_path(comment.id,post_id: comment.post.id), method: :DELETE,class: "post_show"%>
                　<% end%>
                </p>
              </div>
          <% end %>
          <%= paginate @comments %>
          <a class="scroll"></a>
        </div>
     </div>
    <%= render "public/end_users/right_menu", {ranking_users: @ranking_users ,random: @random,review: @review} %>
  </div>
</main>