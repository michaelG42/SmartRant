<?php
require_once './ProcessInfo/ProcessIndex.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

    <head>
        <title>Home</title>
        <meta charset="iso-8859-1">
        <link rel="icon" href="images/favicon.png" />
        <link rel="stylesheet" href="styles/style.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

        <link rel="stylesheet" href="styles/login_style.css"> 
        <link rel="stylesheet" href="styles/profile_style.css"> 
        <link rel="stylesheet" href="styles/article_style.css"> 
        <link rel="stylesheet" href="styles/search_form.css"> 
    </head>

    <body>

        <div class="wrapper row1">

            <!--+++++++++++++++++++++++++++++++++ BANNER +++++++++++++++++++++++++++++++++++++++++++-->
            <header id="header" class="clear" role="banner">

                <div id="hgroup">
                    <h1><a href="index.php">SmartRant.com</a></h1>
                    <h2>Simple Fun Informative Blog</h2>
                </div>

                <nav class="main-nav">
                    <ul>
                        <?php if (isset($user)) : ?>

                            <li class="move_right"><a href="Functions/LogOut.php">Sign Out</a></li>

                        <?php else : ?>
                            <li><a class="my-signup" href="#0">Sign up</a></li>
                            <li><a class="my-signin" href="#0">Sign in</a></li>

                        <?php endif; ?>
                        <li><a id="search" class="my-search" href="#0">Search</a></li>

                    </ul>
                </nav>

                <div class="clear"></div>
            </header>

        </div>

        <!--+++++++++++++++++++++++++++++++++ LOG IN +++++++++++++++++++++++++++++++++++++++++++-->
        <div class="user-login"> 
            <div class="user-login-container"> 
                <ul class="my-switcher">
                    <li><a href="#0">Sign in</a></li>
                    <li><a href="#0">New account</a></li>
                </ul>

                <div id="my-login"> 
                    <form class="user-form" action = "" method = "POST">
                        <p class="fieldset">

                            <input class="full-width has-padding has-border" id="user" name ="user" placeholder="User Name" required>
                        </p>
                        <p class="fieldset">

                            <input class="full-width has-padding has-border" id="pass" name ="pass" type="text" placeholder="Password" required >
                            <a href="#0" class="hide-password">Hide</a>
                        </p>

                        <p class="fieldset">
                            <input class="full-width" type = "submit" id="btn" value="Login" name="userLogin"/>
                        </p>
                    </form>

                    <p class="user-form-bottom-message"><a href="#0">Forgot your password?</a></p>

                </div> 

                <div id="my-signup"> 

                    <form class="user-form" action = "" method = "POST">
                        <p class="fieldset">

                            <input class="full-width has-padding has-border" type = "text" id="user" name ="user" placeholder="Username" required>
                        </p>

                        <p class="fieldset">

                            <input class="full-width has-padding has-border" id="email" name ="email" placeholder="E-mail" required>
                        </p>

                        <p class="fieldset">

                            <input class="full-width has-padding has-border" id="pass" name ="pass" type="text" placeholder="Password" required>
                            <a href="#0" class="hide-password">Hide</a>
                        </p>


                        <p class="fieldset">
                            <input class="full-width has-padding" type="submit" value="Create account" name="register">
                        </p>
                    </form>

                </div> 

                <div id="my-reset-password"> 
                    <p class="user-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                    <form class="user-form">
                        <p class="fieldset">
                            <label class="image-replace my-email" for="reset-email">E-mail</label>
                            <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                        </p>
                        <p class="fieldset">
                            <input class="full-width has-padding" type="submit" value="Reset password">
                        </p>
                    </form>

                    <p class="user-form-bottom-message"><a href="#0">Back to log-in</a></p>
                </div> 

            </div> 
        </div> 
        <!--+++++++++++++++++++++++++++++++++ SEARCH FORM +++++++++++++++++++++++++++++++++++++++++++-->
        <div class="wrapper row2">
            <div id="searchForm" class="search_form_container_hide">      
                <div class="advance-search-form">
                    <form action="" method="get">
                        <fieldset>
                            <legend>Advanced Search</legend>
                            <input type="text" name="userName" placeholder="Username">
                            <input type="text" name="keyWords" placeholder="keywords">
                            <input type="text" name="tags" placeholder="Tags">
                            <label class="fl_left" for="Categorys">Categories:</label>
                            <input type="checkbox" name="Science" checked >Science
                            <input type="checkbox" name="Health" checked >Health<br>
                            <input type="checkbox" name="Technology" checked >Technology
                            <input type="checkbox" name="Engineering" checked >Engineering
                        </fieldset>
                        <fieldset>
                            <legend>Date Range</legend>
                            Start<br>
                            <input type="date" name="dateLo"  ><br><br>
                            End<br>
                            <input type="date" name="dateHi" ><br><br>
                        </fieldset>

                        <input type="submit" value="Search" name="Search" />
                    </form>
                </div>
            </div>
            <div id="container">

                <div id="content">

                    <?php if (isset($viewOne)) : ?>
                        <?php if ($viewOne == true) : ?>
                            <!--+++++++++++++++++++++++++++++++++ VIEW ONE ARTICLE +++++++++++++++++++++++++++++++++++++++++++-->
                            <section>
                                <article>
                                    <img class="article-img" src="<?php echo $article->getImgLink() ?>" alt="">
                                    <h2><?php echo $article->getTitle(); ?></h2>
                                    <div class ="author"> Author : <?php echo $article->getUserName() ?></div>
                                    <time datetime="PhpgetTimeforPost"><?php echo $article->getDate(); ?></time>
                                    <div class ="rating"><?php echo round($article->getRating(), 1) ?> Stars</div>
                                    <p><?php echo $article->getBody(); ?></p>
                                    <br><br><br>

                                    <!--+++++++++++++ TAGS +++++++++++++++++-->
                                    <h5>Tags</h5>     
                                    <ul class="tag">

                                        <?php
                                        $tagArray = $a->getTagsArray($article);
                                        foreach ($tagArray as $tag) {
                                            echo "<li>#" . $tag . "</li>";
                                        }
                                        ?>
                                    </ul>
                                </article>
                                <br><br><br>
                                <!--+++++++++++ RATE ARTICLE +++++++++++++-->
                                <form>
                                    <div class="clear">Rate This Article</div>
                                    <input type="hidden" class="rate" id="ratingID" name="ratingID" value = "<?php echo $article->getId() ?>" />
                                    <label class="rateStar"><div class="hide"> <input type="submit" class="rate" name="1" value="1" /></div>★</label>
                                    <label class="rateStar"><div class="hide">  <input type="submit" class="rate" name="2" value="2" /></div>★</label>
                                    <label class="rateStar"><div class="hide"><input type="submit" class="rate" name="3" value="3" /></div>★</label>
                                    <label class="rateStar"><div class="hide"> <input type="submit" class="rate" name="4" value="4" /></div>★</label>
                                    <label class="rateStar"><div class="hide"> <input type="submit" class="rate" name="5" value="5" /></div>★</label>
                                </form>
                                <br><br><br>    

                                <?php if ($article->getComments() == 1) : ?>

                                    <!--+++++++++++++++ COMMENTS ++++++++++++++++-->
                                    <h3>Comments</h3>
                                    <ul>
                                        <?php foreach ($comments as $comment) : ?>
                                            <li>
                                                <h4><?php echo $comment->getUserName(); ?></h4>
                                                <time datetime="PhpgetTimeforPost"><?php echo $comment->getDate(); ?></time>
                                                <p> <?php echo $comment->getbody(); ?></p>
                                                <br><br>
                                            </li>

                                        <?php endforeach; ?>    
                                    </ul>

                                    <?php if (isset($user)) : ?><!--+++++++++++++++ ADD COMMENT FORM ++++++++++++++++-->                                          
                                        <form action="" method="get">
                                            <div class="clear">Add Comment</div>
                                            <input type="hidden" name="userName" value = "<?php echo $user->getUserName() ?>" />
                                            <input type="hidden"  name="articleId" value = "<?php echo $article->getId() ?>" />
                                            <textarea class="TextArea" name="comment" rows="1" cols="50" placeholder="Enter comment here..." required></textarea>
                                            <label><input class="hide" type="submit"  name="SubmitComment" value="Submit" />Add Comment</label>
                                        </form>  

                                    <?php endif; ?>                     

                                <?php endif; ?>     

                            </section>
                        <?php endif; ?>
                    <?php else : ?>

                        <section id="blog" class="last clear">

                            <h2 class="pageTitle"><?php echo $_SESSION['pageTitle']; ?></h2><br><br>


                            <ul>

                                <?php foreach ($articles as $article) : ?>

                                    <li>
                                        <article><img src="<?php echo $article->getImgLink() ?>" alt="">
                                            <div class ="category"><?php echo $article->getCategory() ?></div>
                                            <h2><?php echo $article->getTitle() ?></h2>


                                            <time datetime="PhpgetTimeforPost"><?php echo $article->getDate() ?></time>

                                            <div class ="rating">                                            <?php
                                                for ($x = 0; $x < round($article->getRating()); $x++) {
                                                    echo '<div class="rateStar">★</div>';
                                                }
                                                ?></div>

                                            <p><?php
                                                if (strlen($article->getBody()) > MAX_PARAGRAPH_LENGTH) {
                                                    echo substr($article->getBody(), 0, MAX_PARAGRAPH_LENGTH) . '...';
                                                } else {
                                                    echo $article->getBody();
                                                }
                                                ?></p>
                                            <p class="more"><a href='index.php?articleId=<?php echo $article->getId(); ?>'>Read More &raquo;</a></p>
                                        </article>
                                    </li>

                                <?php endforeach; ?>

                            </ul>


                        </section>
                    <?php endif; ?>
                </div>

                <!-- ++++++++ Nav Menu ++++++++ -->
                <aside id="right_column">

                    <h2 class="title">Categories</h2>

                    <nav>
                        <ul>
                            <li><a href="index.php?articleCategory=Science">Science</a></li>
                            <li><a href="index.php?articleCategory=Technology">Technology</a></li>
                            <li><a href="index.php?articleCategory=Health">Health</a></li>
                            <li><a href="index.php?articleCategory=Engineering">Engineering</a></li>
                        </ul>
                    </nav>

                    <h2 class="title">Latest Articles</h2>

                    <nav>

                        <ul>
                            <?php foreach ($newestArticles as $newArticle) : ?>
                                <li><a href="index.php?articleId=<?php echo $newArticle->getId() ?>"><?php echo $newArticle->getTitle() ?></a></li>              
                            <?php endforeach; ?>
                        </ul>
                    </nav>


                    <?php if (isset($user)) : ?>

                        <h2 class="title">
                            <?php echo $user->getUserName() ?></h2>

                        <nav class="user-nav">
                            <ul>
                                <li><a class="user-view-profile" href="#0">My Profile</a></li>
                                <li><a href='index.php?articleUserName=<?php echo $user->getUserName(); ?>'>My Posts</a></li>
                                <li><a href="#">My Comments</a></li>
                                <li class="user-add-article"><a href="#0">New Post</a></li>
                            </ul>
                        </nav>
                    <?php endif; ?> 

                </aside>
                <!-- +++++++++++++++++++++++++++++ USER PAGE +++++++++++++++++++++++++++++++++++++++ -->
                <div class="user-page"> 
                    <div class="user-page-container"> 


                        <?php
                        if (isset($user)) {

                            echo ' <img src=" ' . $user->getImgLink() . ' " alt="' . $user->getImgLink() . '">  ';
                        }
                        ?>
                        <p class="profileUserName" id="usernameParagraph">

                            <?php
                            if (isset($user)) {
                                echo $user->getUserName();
                            }
                            ?>
                            <label > <button class ="hide" id="editUserName"></button> Change</label> 
                        </p>

                        <p class="profileEmail" id="emailParagraph">

                            <?php
                            if (isset($user)) {
                                echo $user->getEmail();
                            }
                            ?>
                            <label> <button class ="hide" id="editEmail"></button>Change</label>
                        </p>

                        <p class="profileImage" >
                            <label id="profileImageParagraph"> <button class ="hide" id="editImage" ></button>Change Avatar</label>
                        </p>

                        <p class="profilePass" id="passwordParagraph">
                            <label> <button class ="hide" id="editPassword"></button>Change Password</label>
                        </p>

                        <form id = "changeNameForm" class = "changeProfileUserNameHidden" action="" method="post">          
                            <input type = "text"  name ="userName" placeholder="New Username" required/>
                            <label><input class="hide" type = "submit" value="submit" name="updateInfo" id="userNameChangeBtn"/>Update</label>

                        </form>

                        <form id = "changeEmailForm" class = "changeProfileEmailHidden" action="" method="post">          

                            <input type = "text" name ="userEmail" placeholder="New Email" required/>
                            <label><input class="hide" type = "submit"  value="submit" name="updateInfo" id="emailChangeBtn"/>Update</label>

                        </form>

                        <form id = "changePasswordForm" class = "changeProfilePassHidden" action="" method="post">
                            <input type = "text" name ="OldPass" required placeholder="Old Password"/>
                            <input type = "text" name ="NewPass" required placeholder="New Password"/>
                            <label><input class="hide" type = "submit"  value="submit" name="updateInfo" id="passwordChangeBtn"/>Update</label>

                        </form>

                        <form  class="hide" action="" method="post" enctype="multipart/form-data" id = "changeImageForm">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" /><!--  10MB  -->
                            <label class = "changeProfileBrowse"> <input type="file" name="userImg" class = "hide" accept="image/x-png" />Select File</label>
                            <label  class="ProfileImageUpload"><input type="submit" value="Upload File" name="uploadImage" id="imageChangeBtn" class="hide"/>Update</label>
                        </form>
                        <p class="confirm" >Are you sure you want to delete your account<input type="submit" class="delete" name="No" value="No" />
                        </p>
                        <input type="submit" id="delete" class="delete" name="delete" value="Delete Account" />
                    </div></div>      


                <!--                ++++++++++++++++++++++++++++++++++++++++++++++++++++++++ ADD ARTICLE FORM ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++               -->

                <div class="article-form">
                    <div class="article-form-container">
                        <h2 class="articleHead">New Article</h2>
                        <form action="" method="post" class="articleForm">
                            <input type="text" name="title" size="48" placeholder="Enter Title here..." required>/>
                            <select name="category">
                                <option value="Science">Science</option>
                                <option value="Technology">Technology</option>
                                <option value="Health">Health</option>
                                <option value="Engineering">Engineering</option>
                            </select>
                            <?php
                            if (isset($user)) {
                                echo '<input type="hidden" name="userName" value="' . $user->getUserName() . '">';

                                echo '<input type="hidden" name="image" value="' . $user->getImgLink() . '">';
                            }
                            ?>
                            <textarea name="body" rows="8" cols="80" placeholder="Enter Body here..." required=""></textarea>
                            <input type="text" name="tags" size="48" placeholder="Enter tags here..."/>
                            <input type="checkbox" name="comments" checked ><div class="checkBoxName">Enable Comments</div><br/>
                            <label>&nbsp;</label>
                            <input type="submit" value="Submit" name="submitArticle"/>

                        </form>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <!-- footer -->
        <div class="wrapper row3">
            <footer id="footer">
                <p class="fl_left">Copyright &copy; 2017 - All Rights Reserved - <a href="#">Michael and Ryan</a></p>
                <p class="fl_right">Website By <a href="index.php" title="Michael and Ryan">Michael and Ryan</a></p>
                <div class="clear"></div>
            </footer>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/main.js"></script>
        <script src="js/profile.js"></script> 
        <script src="js/article.js"></script> 
    </body>
</html>
