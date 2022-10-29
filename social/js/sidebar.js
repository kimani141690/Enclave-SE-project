let aside = document.getElementById("sidebar");

aside.innerHTML = `
<img src="assets/logo.png" alt="" class="logo" />
        <div class="nav-container" id="discussion-tags">
          <div class="main-link">
            <div class="row">
              <a href='index.php'><img src="assets/group.png" alt="" class="main-link-icon" /></a>
              <a href='index.php'><p id="nav-link">Discussions</p></a>
            </div>
          </div>
          <div class="sub-nav-links">
            <p class="tag">My day</p>
            <p class="tag">Technology</p>
            <p class="tag">Elections</p>
            <p class="tag">Future Me</p>
          </div>
        </div>
        <div class="nav-container" id="talent-tags">
          <div class="main-link">
            <div class="row">
              <img src="assets/Path 12.png" alt="" class="main-link-icon" />
              <a href='talent.php'><p id="nav-link">Talents</p></a>
            </div>
          </div>
          <div class="sub-nav-links">
            <p class="tag">Photography</p>
            <p class="tag">Art</p>
            <p class="tag">Vlogging</p>
            <p class="tag">Singing </p>
          </div>
        </div>
        <div id="aside-buttons">
          <a href='new_discussion.html'><button class="nav-start">
            <div class="row justify-center">
              <img
                src="assets/group-svgrepo-com.png"
                alt=""
                id="start-discussion-icon"
              />
              Start Discussion
            </div>
          </button>
          </a>
          <a href='new_talent.html'><button class="nav-start">
            <div class="row justify-center">
              <img src="assets/Path 9.png" alt="" id="start-discussion-icon" />
              Share Talent
            </div>
          </button>
          </a>
        </div>

`;

var tags = document.querySelectorAll("#talent-tags .tag");
tags.forEach((element) => {
  var tag = element.innerHTML;
  // tag = tag.replace(" ", "");
  var link = document.createElement('a');
  link.innerHTML = element.outerHTML;
  link.setAttribute('href',`talent.php?tag=${tag}`);
  element.parentNode.replaceChild(link,element);

});

var tags2 = document.querySelectorAll("#discussion-tags .tag");
tags2.forEach((element) => {
  var tag = element.innerHTML;
  console.log(tag);
  // tag = tag.replace(" ", "");
  var link = document.createElement('a');
  link.innerHTML = element.outerHTML;
  link.setAttribute('href',`index.php?tag=${tag}`);
  element.parentNode.replaceChild(link,element);

});
