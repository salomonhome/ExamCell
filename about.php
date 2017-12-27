<html>
    <head>
     <style>
body {
    background-color: #2c3e50;
    font-family: 'Asap', sans-serif;
}

h1 {
    font-family: 'Raleway', sans-serif;
}

p {
    font-family: 'Asap', sans-serif;
}

.section {
    /*background-attachment: fixed;*/
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center center;
    padding:0;
    margin:0;
}

.page-wrapper {
    height: 100%;
    display: flex;
    align-items: center;
}

#home-page {
    background-image: url("http://www.remlampa.com/assets/home-page-bg.jpg");
    background-attachment: fixed;
    background-position: center bottom;
    vertical-align: top;
    padding: 10% 25% 0 10%;
}

#profile-description {
    vertical-align: bottom;
    margin-bottom: 20px;
}

#profile-card {
    padding: 25px 25px 30px 25px;
    color: #ecf0f1;
}

#profile-photo {
    height: 100px;
    opacity: 0.8;
    margin: 0 20px 0 0;
    padding: 0;
    float: left;
}

#profile-card hr {
    border: 0;
    height: 2px;
    background: #57553E;
    clear: both;
}

#profile-card a {
    color: #ecf0f1;
}

#profile-card a:hover {
    color: #57553E;
    text-decoration: none;
}

#about-page {
    background-image: url("http://www.remlampa.com/assets/about-page-bg.jpg");
    background-position: center right;
}

#about-page .page-wrapper div {
    color: #ecf0f1;
    background:none;
    padding: 0 35% 0 5%;
    margin: auto;
}

#about-page .jumbotron p {
    font-size: 1.25em;
    font-weight: 100;
}

#about-page .list-group-item {
    font-size: 1.25em;
    background: none;
    border: none;
}

#showcase-page {
    background: url('http://www.remlampa.com/assets/showcase-page-bg.jpg');
    background-position: center bottom;
}

#showcase-page .page-wrapper {
    margin: auto;
    align: center;
}

#showcase-page .fp-slides {
    margin: auto;
    height: 100%;
    vertical-align: middle;
}

#showcase-page h1, #showcase-page h1 a {
    color: #ecf0f1;
    text-decoration: none;
}

#showcase-page h1 a:hover {
    text-decoration: none;
    color: #222222;
}

#showcase-page .slide {
    display: table;
    table-layout: fixed;
}

#showcase-page .slide-contents {
    display: table-cell;
    vertical-align: middle;
    padding: 0 10%;
}

#showcase-page .fp-slidesNav ul li a span {
    background: #ecf0f1;
}

#showcase-page .fp-controlArrow {
        position: absolute;
        width: 10px;
        height: 10px;
        margin-top:-5px; /* This value must always be half of the height - This does the same as above */
        z-index: 4;
        top: 50%;
        cursor: pointer;
}

#credits-page .page-wrapper {
    margin: auto;
    align: center;
}

#credits-page .page-wrapper .panel {
    margin: auto;
    text-align: center;
}

#credits-page .list-group-item, #credits-page .panel-body {
    font-size: 1.25em;
}
     </style>
    </head>
    <body>
<div id="fullpage">
    <div class="section" id="home-page">
        <div id="profile-card">
            <div id="profile-description">
                <img id="profile-photo" src="images/profile-photo.jpeg" />
                <div>
                    <h1>Salomon Thomas</h1>
                    <h4>Dept of MCA | Web Developer | Tec Writter</h4> India
                </div>
            </div>
            <hr />
        </div>
    </div>
    <div class="section" id="about-page">
        <div class="page-wrapper">
            <div class="jumbotron">
                <h1>About Me</h1>
                <p>I am currently working as a web deoveloper.</p>
            </div>
        </div>
    </div>
</div>
    </body>
</html>