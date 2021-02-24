const endpoint_url = 'https://51018012.p-web.click/akhir/api';

document.addEventListener("DOMContentLoaded", function(){
  getPosts();
});

function getPosts(services,section_title){
  fetch(endpoint_url + services)
  .then(status)
  .then(json)
  .then(function(data){
    var postHTML = "";
    data.postsDetail.forEach(function(posts){
      postHTML += `
                      <div class="col-auto col-sm-8 col-md-auto col-lg-6 col-xl-4 d-inline-flex align-self-end mx-auto" style="margin-bottom: 20px;">
                          <div class="container d-inline ">
                              <div class="card">
                              <img class="card-img-top img-thumbnail"style="min-height:550px;" src="assets/img/${posts.imgpath}"/>
                                  <div class="card-body">
                                      <h4 class="card-title">${posts.title}</h4>
                                      <h5 class="card-title">Posted by : ${[posts.username]}</h5>
                                      <a class="btn btn-primary" role="button" href="post.html?post_id=${posts.post_id}">View</a></div>
                              </div>
                          </div>
                      </div>
        `;
    });
        document.getElementById("index").innerHTML = postHTML;
        document.getElementById("section_title").innerHTML = section_title;

  })
  .catch(error);
}

function getPostsDetail(ID) {
  fetch(endpoint_url+ "/posts/postsDetail?post_id="+ID)
  .then(status)
  .then(json)
  .then(function(data){
    var postHTML = "";
    data.postsDetail.forEach(function(post){
      postHTML += `

      <div>
          <div class="row">
              <div class="col-sm-8 col-lg-6 mx-auto"><img class="img-thumbnail" src="assets/img/${post.imgpath}" /></div>
              <div class="col">
                  <div class="row">
                      <div class="col">
                          <h1 class="text-center">${post.title}</h1>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <h4 class="text-center">Posted by : ${post.username}</h4>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                          <h3 class="text-center">Tags : ${post.tags}</h3>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col">
                      <form action="assets/php/formactions.php" method="get">
                          <div role="group" class="btn-group d-flex d-lg-flex align-content-center">
                          <button class="btn btn-primary" type="submit" style="margin-right: 10px;" name="submitLike" value="${post.post_id}">${post.LikeCount} Like</button>
                          <button class="btn btn-primary" type="submit" style="margin-right: 10px;" name="submitDislike" value="${post.post_id}">${post.UnlikeCount} Dislike</button>
                          <a class="btn btn-primary" type="button" href="#disqus_thread">Comment</a></div>
                        </form>
                      </div>
                  </div>
                  <div class="row" style="margin-top:15px;">
                      <div class="col">
                          <p>${post.paragraph}</p>
                      </div>
                  </div>
         </div>
      </div>
      <div class="row">
      <div class = "col" id="disqus_thread"></div>
      </div>
        `;


    });
    document.getElementById("posts").innerHTML = postHTML;

  })
  .catch(error);
}

function getSearch(title){
  fetch(endpoint_url +"/posts/postsSearch?posttitle="+title)
  .then(status)
  .then(json)
  .then(function(data){
    var postHTML = "";
    section_title="Search Result";
    data.postsDetail.forEach(function(posts){
      postHTML += `
      <div class="col-auto col-sm-8 col-md-auto col-lg-6 col-xl-4 d-inline-flex align-self-end mx-auto" style="margin-bottom: 20px;">
          <div class="container d-inline ">
              <div class="card">
              <img class="card-img-top img-thumbnail"style="min-height:550px;" src="assets/img/${posts.imgpath}"/>
                  <div class="card-body">
                      <h4 class="card-title">${posts.title}</h4>
                      <h6 class="card-title">Tags : ${[posts.tags]}</h6>
                      <h5 class="card-title">Posted by : ${[posts.username]}</h5>
                      <a class="btn btn-primary" role="button" href="post.html?post_id=${posts.post_id}">View</a></div>
              </div>
          </div>
      </div>
        `;
    });
        document.getElementById("index").innerHTML = postHTML;
        document.getElementById("section_title").innerHTML = section_title;

  })
  .catch(error);
}
